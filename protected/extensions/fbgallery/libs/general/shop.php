<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/
class shop extends fbgallery
{
	//set some values specific for shop
	protected function specific()
	{
		//will not use paginate on shop even in Control Panel is set to be used
		$this->conf->itemsOnPaginate = 0;
		//set to be shop
		$this->isShop = true;
	}

	//render album for shop. here we name it item, because is a page for a shop item
	protected function itemPageForShop()
	{
		//create array with all images of item
		$arrItems = self::setItems();
		$itemsCount = count($arrItems);

		if(!$itemsCount)
			/** @todo: a nice no photo renderer */
			//no images loaded, put an ugly message 
			echo $this->tr('noPictureForItem');
		else
		{
			$infoItemCover;
			$cover;
			$aItems=array();
			$sortableItems=array();

			//if isn't set any cover, treat first image as cover
			if(!$arrItems[0]['cover'])
				$arrItems[0]['cover']= true;

			foreach($arrItems as $id => $item)
			{
				if($item['cover'])
				{
					$cover = $item;
					$infoItemCover = $item['title'];
				}
				else
				{
					if(!$this->levelAccess) 
						$aItems[] = $item;
					else
						$sortableItems['imgS'.$id]= $this->render('editor/item', array('item'=>$item), true);
				}
			}

			unset($arrItems);

			$this->render($this->levelAccess ? 'editorShop/viewSortableShop' : 'shop/_viewShop', array('cover'=>$cover, 'aItems' => !$this->levelAccess ? $aItems : $sortableItems, 'info'=>$infoItemCover)); 
		}
	}

	//return an array with information about every picture of item
	protected function setItems()
	{
		$arrItems = array();
		foreach($this->imgsOrder as $filename)
		{
			$info = $this->imgsInfo[$filename][$this->lang->active] ? $this->imgsInfo[$filename][$this->lang->active]: $this->imgsInfo[$filename][$this->lang->default];
			$isCover = $filename === $this->album->cover;

			$item = array(
				'id'=>$this->album->id,
				'rel' => $this->getRelTag(),
				'thTitleShow'=> $this->conf->thTitleShow,
				'useInfoBox' => $this->conf->useInfoBox,
				'urlImg' => $this->url->galleryFolder.'/'.$this->dirs['picturesDir'].'/'.$filename,
				'imgSrc' => $this->url->galleryFolder.'/'.$this->dirs[$isCover ? 'picturesDir' : 'thumbsDir'].'/'.$filename,
				'fileName' => $filename,
				'title' => $info,
				'cover'=>$isCover,
				'showThumbTools' => Yii::app()->user->isGuest ? false : true,
			);
			//show cover album as first image
			$filename === $this->album->cover ? array_unshift($arrItems, $item):$arrItems[] = $item;
		}
		return $arrItems;
	}

	//render collection of items 
	protected function renderCollection()
	{
		//show items which are included in this collection
		$albumsOfCollection = Collect::albumsOfCollection();

		//if user is editor or admin, we will show all items
		//to permit to include its in collection
		if($this->levelAccess)
		{
			//get all items which aren't already in this collection
			$albumsNotInCollection = Collect::albumsNotInCollection();

			//there are some items not in collection and some in collection
			if($albumsOfCollection && $albumsNotInCollection)
				$arrAllAlbums = array_merge($albumsOfCollection, $albumsNotInCollection);

			if($albumsOfCollection && !$albumsNotInCollection)
				$arrAllAlbums = $albumsOfCollection;
			
			if(!$albumsOfCollection && $albumsNotInCollection)
				$arrAllAlbums = $albumsNotInCollection;

			if(!$albumsOfCollection && !$albumsNotInCollection)
				$arrAllAlbums = array();

			if($arrAllAlbums)
			{
				$arrItems = array();
				foreach($arrAllAlbums as $item)
					$arrItems[] = $this->render('editorShop/itemCollectionShop', array('item'=>$item), true);
				$this->render('editorShop/viewSortableCollectionShop', array('arrItems'=>$arrItems));
			}
			else
				echo $this->tr('noAlbumExists');
		}
		else
			$this->render('shop/_viewCollectionShop', array('items'=>$albumsOfCollection));
	}

	//used to automatic set a standard style for shop, from cpanel->shop
	public function setStandardShop()
	{
		//operation reserved only for admins
		if(!$this->levelAccess === 2) return;

		$arrStandardShop = array(
			'gallery'=>array(
				'isShopStyle'=>true,
				'cssTheme'=>'shop',
				'thumbStyle'=>'square',
				'imgWidth'=>700,
				'thumbWidth'=>50,
				'thWidth'=>200,
				'hCollectionShop'=>true,
				'itemWidthCollectionShop'=>140,
				'itemInfoShop'=>'ProductID'."\n".'Availability'."\n".'Name'."\n".'Model'."\n".'Price'."\n".'Coin'."\n".'VTA'."\n".'Quantity'."\n".'Url',
			),
			'album'=>array(
				'showAlbumTitleDescription'=>false,
				'itemsOnPaginate'=>0,
				'thTitleShow'=>false,
				'useInfoBox'=>false,
			),
			'uploader'=>array(
				'max'=>6,
			)
		);

		foreach($arrStandardShop as $type => $attrs)
		{
			$config = unserialize(GalleryConfig::model()->find(array('condition'=>"type='$type'"))->config);
			foreach($attrs as $attr => $val)
				$config[$attr] = $val;

			$record = GalleryConfig::model()->find(array('condition'=>"type='$type'"));
			$attributes = array("config"=> serialize($config));
			$record->saveAttributes($attributes);
		}
		return;
	}

	//to add info for each item loaded we use page item description
	public function getDescriptionItemShop($language)
	{
		$trs = unserialize($this->album->translations);
		return $trs['description'][$language];
	}

	//to fill description when create new album (item in shop)
	public function predefinedItemDescriptionShop($language)
	{
		//keep original language
		$originalLang = Yii::app()->language;
		//switch to box language to get correct translation for it 
		Yii::app()->language = $language;

		$string = '';
		foreach(array_map('trim', explode("\n", $this->conf->itemInfoShop)) as $field)
			$string .= '<strong>'.$this->tr($field).': </strong>  <br />';

		//switch back to original language
		Yii::app()->language = $originalLang;
		return $string;
	}
}

?>