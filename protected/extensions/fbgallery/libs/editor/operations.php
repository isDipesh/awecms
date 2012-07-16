<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/

class operations extends fbgallery
{
	public function processPosts()
	{
		//only for admins
		if($this->levelAccess === 2)
		{
			if(isset($_POST['setStandardShop']))
				return shop::setStandardShop();

			if(isset($_POST['loadDefaultConfig']))
				return FBAdmin::loadDefaultConfig();

			if(isset($_POST['Cfg']))
				return FBAdmin::updateGalleryConfig();
		}
		
		//for users with access
		if($this->levelAccess)
		{
			if(isset($_POST['function']))
				return self::switchToFunction();

			if(isset($_SERVER["HTTP_CONTENT_TYPE"]) || isset($_SERVER["CONTENT_TYPE"]) )
				return Uploader::uploadFiles();
		}
	}

	//identify the requested function throw $_POST and switch to it
	private function switchToFunction()
	{
		$function = $_POST['function'];
		return self::$function();
	}

	//set a new order to albums from collection
	private function newAlbumsOrder()
	{
		$this->collection->albums = $_POST['order'];
		$this->collection->save();
	}

	//populate collection with albums
	private function populateCollection()
	{
		$arrAlbums = array();
		foreach($_POST as $key => $value)
			if($key !== 'function')
				$arrAlbums[] = substr($key, strlen($this->idPrefix));
		$this->collection->albums = implode(',', $arrAlbums);
		return $this->collection->save();
	}

	//set the cover for an album when it is clicked on setcover icon
	private function setAlbumCover()
	{
		$this->album->cover = substr($_POST['cover'], strlen($this->idPrefix));
		if(!$this->album->save())
			throw new Exception('fbgallery - Set album cover');
	}
	
	//return an image with a flag for requested language
	public function flag($language)
	{
		return CHtml::image($this->url->flags.$language.'.gif', $language, array ('class'=>'flag'));
	}

	//set the new order of images from album, after sorting
	public function newImgOrder()
	{
		$newOrder = array();
		foreach(explode(",", $_POST['order']) as $fName)
			$newOrder[] = $fName;
		self::updateImgsOrder($newOrder);
	}

	//remove an album
	private function removeAlbum()
	{
		//remove album from database
		if($this->album->delete())
		{
			$directory = $this->path->base.$this->conf->gFolder.'/'.$this->pid.'/';
			MyFiles::rrmdir($directory);
			self::removeAlbumFromAllCollections($this->pid);
		}
		else
			throw new Exception('fbgallery - Remove album - '.$this->tr('cantRemoveAlbum'));
	}

	//remove a collection
	private function removeCollection()
	{
		if(!$this->collection->delete())
			throw new Exception('fbgallery - Remove collection');
	}

	//remove an album from all collections before to be removed from database
	private function removeAlbumFromAllCollections($pid)
	{
		foreach(Collection::model()->findAll() as $collection)
		{
			$newAlbums = array();
			$albumsInCollection = explode(',', $collection->albums);
			if(in_array($pid, $albumsInCollection))
			{
				foreach($albumsInCollection as $album => $albumPid)
					if((int)$pid !== (int)$albumPid)
						$newAlbums[] = $albumPid;
				$collection->albums = implode(',', $newAlbums);
				$collection->save();
			}
		}
	}

	//create a new album or a new collection
	private function newAlbum()
	{
		//check if this is an album or collection
		//will also check if is a legall request, and if isn't, will throw an exception and stop
		$isCollection = self::isCollection();
		$models = $isCollection ? Collection::model()->findAll() : Album::model()->findAll();
		//if we haven't set a pid manually, we will set first free pid
		if(!$this->pid)
		{
			$max = 0;
			for($i=0;$i<2;$i++)
			{
				$testmodel = $i === 0 ? new Album : new Collection;
				$criteria = new CDbCriteria;
				$criteria->select = 'max(pid) AS pid';
				$row = $testmodel->model()->find($criteria);
				$max = $max < $row['pid'] ? $row['pid'] : $max;
			}
			//if is first created albums or collections, we set $this->pid to 1;
			$this->pid = $max ? (int)$max + 1 : 1; $max;
		}
		$arrModelsNames = array();
		foreach($models as $m => $detail)
		{
			$trs = unserialize($detail['translations']);
			$name =  $trs['name'][ $this->lang->default];
			$arrModelsNames[] = $name;
		}
		$modelNameTranslations=array();
		$modelDescriptionTranslations=array();
		$albumName = '';
		foreach($this->lang->all as $key => $language)
		{
			$name = self::purifiedTtext($_POST['newAlbumName_'.$language]);
			$name = $name ? $name : $this->tr('noName');
			$description = self::purifiedTtext($_POST['newAlbumDescription_'.$language]);
			$description = $description ? $description : $this->tr('noDescription');
			if(count($arrModelsNames))
			{
				$p = explode(' ', $name);
				$last = $p[count($p)-1];
				$name = is_numeric($last) ? self::firstFreeNameIndex($arrModelsNames, $name, $last) : $name = self::firstFreeNameIndex($arrModelsNames, $name);
			}
			$modelNameTranslations[$language]=$name;
			$modelDescriptionTranslations[$language] = $description;
			$albumName .= ' '.strtolower($name);
		}
		$translationsArr = array(
			'name'=>$modelNameTranslations,
			'description'=>$modelDescriptionTranslations
		);
		$model = $isCollection ? new Collection : new Album;
		$model->pid = $this->pid;
		$model->url = $this->getUrlRouteStructure();
		$model->translations = serialize($translationsArr);
		$model->author = Yii::app()->user->name;
		$model->tags = self::tags($albumName);
		if(!$model->save())
			throw new Exception('fbgallery - newAlbum - '.$this->tr('cantSave'));
		else
			if(!isset($_POST['isCollection']))
				self::createFoldersStructure();
	}

	//return if request of create new album or collection must be a collection or an album
	private function isCollection()
	{
		//admin have all rights
		if($this->levelAccess === 2) return isset($_POST['isCollection']);

		//if editor can create anything. will create collection if isCollection is set in request
		if($this->conf->editorOperateCollection && $this->conf->editorCreateAlbum) return isset($_POST['isCollection']);

		//if this is an illegal request to create album or collection when editor haven't this rights. Will throw new Exception without create anything.
		if(!$this->conf->editorCreateAlbum && !$this->conf->editorOperateCollection)
			throw new Exception('fbgallery - Illegal attempt to create album or collection');

		//editor can't create collection but is trying. This request will be an album
		if(!$this->conf->editorOperateCollection) return false;
		
		//if editor can create collection but can't create albums.
		//even if is not checked to be collection, this will be a collection anyway 
		return isset($_POST['isCollection']) || !$this->conf->editorCreateAlbum;
	}

	//prepare tags before to be added in database
	private function tags($albumName)
	{
		$arrTags = explode(' ', preg_replace("/[^a-zA-Z0-9\s]+/", "", trim(preg_replace('/\s+/', ' ',$albumName))));
		if(isset($_POST['newAlbumTags']))
			$tags = explode(' ', preg_replace("/[^a-zA-Z0-9\s]+/", "", self::purifiedTtext(strtolower(preg_replace('/\s+/', ' ', $_POST['newAlbumTags'])))));
		return implode(', ', array_unique(array_merge($arrTags, $tags)));
	}

	//return first free index in database which can be used as pid for a new album or collection
	private function firstFreeNameIndex($arr, $string, $index=1)
	{
		foreach($arr as $estring)
			if(strtolower($estring) === strtolower($string))
			{
				$p = explode(' ', $estring);
				$isNumeric =  is_numeric($p[count($p)-1]);
				if($isNumeric)
				{
					array_pop($p);
					$index++;
					$p[] = $index;
					$string = implode(' ', $p);
					self::firstFreeNameIndex($arr, $string, $index);
				}
				else
				{
					$string=$string.' '.$index;
					self::firstFreeNameIndex($arr, $string, $index);
				}
			}
		return $string;
	}

	//delete one ore more images from album
	//also this method is used to clear album, in $_POST['gImg'] we receive a list with all images filename which will be removed
	public function deleteImage()
	{
		if(!$this->levelAccess || !isset($_POST['gImg'])) return;
		$folds = array($this->path->original, $this->path->images, $this->path->thumbnails);
		$allDeletedSuccessfully = true;
		$imgs=explode(',', $_POST['gImg']);
		foreach($imgs as $filename)
		{
			$newOrder = array();
			$newInfo = array();

			foreach($this->imgsOrder as $fName)
			{
				if($fName !== $filename)
				{ 
					$newOrder[] = $fName;
					$newInfo[$fName] = $this->imgsInfo[$fName];
				}
			}

			foreach($folds as $folder)
				if(!MyFiles::deleteFile($folder, $filename)) 
					$allDeletedSuccessfully = false;

			if($allDeletedSuccessfully)
			{
				self::updateImgsOrder($newOrder);
				self::updateImgsInfo($newInfo);
			
			}
			//remove cover image if original has been deletes
			if(in_array($this->album->cover, $imgs))
			{
				$album = $this->album;
				$album->cover = '';
				$album->save();
			}
		}
	}

	//create structure of folders where will be keept album images
	public function createFoldersStructure()
	{
		$dirs = array(
			$this->path->original, 
			$this->path->images, 
			$this->path->thumbnails,
			$this->path->tmp
		);
		foreach($dirs as $dir)
			MyFiles::NewFolder($dir);
	}

	//purify titles before to validate them
	public function purifiedTtext($string, $encode=false)
	{
		$p = new CHtmlPurifier();
		$p->options = array('URI.AllowedSchemes'=>array(
			'http' => true,
			'https' => true,
		));
		return $encode ? CHtml::encode($p->purify($string)): $p->purify($string);
	}

	//return an array with name of folders existing in theme folder
	public function existingThemes()
	{
		return MyFiles::oneLevelDirsName($this->path->cssTheme);
	}


	//return the configuration settings for an existing type in database (gallery, album, collection, fancybox, uploader);
	public function cfgModel($type)
	{
		$attributes = unserialize(GalleryConfig::model()->find(array('condition'=>"type='$type'"))->config);
		$model = new Cfg($type);
		foreach($model as $attr => $value)
			if(array_key_exists($attr, $attributes))
				$model->$attr = $attributes[$attr];
			else
				unset($model->$attr);
		return $model;
	}

	//after thumbnailize we get an array with the names of uploaded files
	public function addImagesToDB($arrFiles)
	{
		$arrImgs = array();
		$arrInfo = array();
		foreach($arrFiles as $filename)
		{
			$arrImgs[] = $filename;
			if(!$this->isShop)
				$arrInfo[$filename] = array($this->lang->default => self::getPictureInfo($filename));
			else
				//to add info for each item loaded we use page item description
				if($this->conf->isMultilingual)
				{
					$arrLangs = array();
					foreach($this->lang->all as $lang)
						$arrLangs[$lang] = shop::getDescriptionItemShop($lang);
					$arrInfo[$filename] = $arrLangs;
				}
				else
					$arrInfo[$filename] = array($this->lang->default => shop::getDescriptionItemShop($this->lang->default));
		}
		if($this->imgsOrder)
			$arrImgs = array_merge($this->imgsOrder, $arrImgs);

		if($this->imgsInfo)
			$arrInfo = array_merge($this->imgsInfo, $arrInfo);
		self::updateImgsOrder($arrImgs);
		self::updateImgsInfo($arrInfo);
	}

	//update information about page (album or collection)
	public function updatePageInfo()
	{
		$field = explode("_", $_POST['arg1']);
		$newVal = self::purifiedTtext($_POST['arg2']);
		$model = $this->album ? $this->album : $this->collection;
		$trs = unserialize($model->translations);
		$trs[$field[0]][$this->lang->active] = $newVal;
		$translations = serialize($trs);
		$model->translations = $translations;
		$model->save();
	}

	//update tags for an album or a collection
	public function updateTagsInfo()
	{
		$field = explode("_", $_POST['arg1']);
		$newVal = self::purifiedTtext($_POST['arg2']);
		$model = $this->album ? $this->album : $this->collection;
		$model->tags = $newVal;
		$model->save();
	}

	//update in db the information for an image
	public function updateImgsInfo($arrInfo)
	{
		//$arrInfo contain array with all translations ready
		//here we just update in db
		$attributes = array("imgsInfo"=> serialize($arrInfo));
		$this->album->saveAttributes($attributes);
		$this->imgsInfo = $arrInfo;
	}

	//update in db the new order of pictures from an album after sorting
	public function updateImgsOrder($newOrder)
	{
		//$newOrder contain all images (old and new if after upload)
		$order = serialize($newOrder);
		$record = $this->album;

		if($record === null)
		{
			$record = new Album;
			$record->pid = $this->pid;
			$record->imgsOrder = $order;
	
			if(!$record->save())
				throw new Exception('fbgallery - updateImgsOrder - '.$this->tr('cantSave'));
		}
		else
		{
			$attributes = array("imgsOrder"=> $order);
			$record->saveAttributes($attributes);
		}
		//reload image's order
		$this->imgsOrder = $newOrder;
	}

	//set initial picture's title after upload
	public function getPictureInfo($fName)
	{
		switch($this->conf->usedTitle)
		{
			case 'filename':
				return MyFiles::class2name(MyFiles::RemoveExtension($fName),false,true);
			break;
			case 'pagetitle':
				return $this->getPageTitle();
			break;
			case 'predefined':
				return CHtml::encode(Yii::t('fbgallery', $this->conf->predefinedTitle));
			break;
		}
	}

	//This method is used to rename pictures 
	public function updatePictureInfo()
	{
		$filename = MyFiles::cleanFileName(substr($_POST['arg1'], strlen($this->idPrefix)));
		$newInfo = self::purifiedTtext($_POST['arg2'], true);
		$lang = $this->lang->active;
		$this->imgsInfo[$filename][$lang] = $newInfo;

		self::updateImgsInfo($this->imgsInfo);
	}



}