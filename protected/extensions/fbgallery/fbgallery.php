<?php
/**
* fbgallery class file.
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/

class fbgallery extends CWidget
{
	//integer: pid - used to identify album or collection
	public $pid=false;
	//bool: is a static page
	protected $staticPage=false;
	//integer: 0=visitor, 1=editor, 2=admin
	protected $levelAccess=0;
	//object: keep actuall settings
	protected $conf;
	//string:author of album or collection
	protected $author;
	//object: album content
	protected $album;
	//object: collection content
	protected $collection;
	//array: used paths
	protected $path = array();
	//array: used url
	protected $url = array();
	//array: order of pictures from album
	protected $imgsOrder;
	//array: information of every pictures from album
	protected $imgsInfo;
	//array: languages
	protected $lang=array();
	//string: used to prefix some ids
	protected $idPrefix = 'fbg_';
	//array: name for folders of albums
	protected $dirs = array('originalDir'=>'original', 'picturesDir'=>'pictures', 'thumbsDir'=>'thumbs', 'tempDir'=>'_tmp',);
	//it is used shop style
	protected $isShop;
	//used jquery-ui theme
	protected $juiTheme='matricks';

	public function init()
	{
		//set a pathAlias for our extension. now, we can use it anywhere, not only in extensions folder
		Yii::setPathOfAlias('fbgallery', realpath(dirname(__FILE__)));

		//if is dynamic page, use it id as pid else we have a static page
		if(isset($_GET['id'])) $this->pid = $_GET['id'];

		//isn't a pid set by user or by dynamic page
		//we have a static page
		if(!$this->pid)
			$this->staticPage = true;

		//import general libraries
		Yii::import('fbgallery.libs.general.*');

		//load settings
		$this->conf = new conf();

		//if is static page we assign it a pid if isn't manually set
		if($this->staticPage) 
			$this->setPid();

		//set if actuall page is album or collection
		$this->album = Album::model()->find(array('condition'=>"pid='$this->pid'")); 
		$this->collection = Collection::model()->find(array('condition'=>"pid='$this->pid'"));

		//set author of this page, if exists
		if($this->album || $this->collection)
			$this->author = $this->album ? $this->album->author : $this->collection->author;

		//set level access for user (0=visitor, 1=editor, 2=admin)
		//it is necessary to custom the way how users are identified in your system  
		FBAccess::setLevelAccess();

		//$this->levelAccess means we are minim an editor user.
		//if user is minimum an editor, import libraries for editor panel
		if($this->levelAccess)
			Yii::import('fbgallery.libs.editor.*');

		//if user is admin, import libraries for control panel. 
		//Control panel isn't accessible for editors and visitors
		if($this->levelAccess === 2)
			Yii::import('fbgallery.libs.admin.*');

		//set languages
		$this->lang = new lang($this->conf);

		//set paths and urls used in gallery
		$this->path = new path($this->conf->gFolder.'/'.$this->pid.'/', $this->dirs, realpath(dirname(__FILE__).'/assets'));
		$this->url = new url($this->conf->gFolder, $this->pid, $this->conf->cssTheme, realpath(dirname(__FILE__).'/assets'));

		//setsForAlbum
		if ($this->album) 
		{
			$this->imgsOrder = unserialize($this->album->imgsOrder);
			$this->imgsInfo = unserialize($this->album->imgsInfo);
		}

		//is this page using shop style?
		if($this->conf->isShopStyle)
			shop::specific();
	}

	public function run()
	{
		//publish files
		$this->publishAssets();

		//process post requests if exists
		if($this->levelAccess)
			operations::processPosts();

		//render page
		$this->renderPage();
	}

	protected function getPageTitle()
	{
		return $this->owner->pageTitle;
		// return  $this->owner->metas->title;
	}

	public function getUrlRouteStructure()
	{
		//if is static page, we need to know controller, action and VIEW. if view is null, then is index page
		if($this->staticPage)
		{
			$view = isset($_GET['view']) ? $_GET['view'] : null;
			return serialize(array(
					'controller' => Yii::app()->controller->id,
					'action'=>Yii::app()->controller->action->id,
					'view'=>$view
				));
		}

		//here is for dynamic pages.
		//MUST BE CUSTOMIZED FOR DIFFERENT URL STRUCTURE
		//in this case, the dynamic page has an unique id and a title
		if(!$this->staticPage)
			return serialize(array(
					'controller' => Yii::app()->controller->id,
					'action'=>Yii::app()->controller->action->id,
					'id'=>$_GET['id'],
					'title'=>$_GET['title'],
				));
	}

	//this function assign a pid for static page
	//if already exists an pid assigned to page, will be recognized by page's url
	protected function setPid()
	{
		//step 1:
		//create standard url using actual url
		$thisUrl = $this->getUrlRouteStructure();
	
		//chech if page is album
		//compare actual url route with routes from Album model
		$album = Album::model()->find(array('condition'=>"url='$thisUrl'"));
		if($album)
		{
			$this->pid = $album->pid;
			return;
		}

		//chech if page is collection
		$collection = Collection::model()->find(array('condition'=>"url='$thisUrl'"));
		if($collection)
		{
			$this->pid = $collection->pid;
			return;
		}

		//there isn't any album or collection for this page
		//if is visitor, there isn't necessary to generate next pid, we set it to 0;
		if(!$this->levelAccess)
		{
			$this->pid = 0;
			return;
		}
	}

	//all existing strings are in fbtranslations page;
	// tr bring it to be used
	public function tr($str)
	{
		return fbtranslations::tr($str);
	}

	//render page
	private function renderPage()
	{
		$this->displayPageTitle();

		//if is collection check if isn't shop and go to adequate rutine, which will detect level access and will render according with this
		if($this->collection)
			!$this->isShop ? Collect::renderCollection() : shop::renderCollection();
		//if is album, check level access and go to fullGallery, where will detect if shop item or album
		else
		{
			if(!$this->levelAccess)
			{
				if($this->emptyContent())
					return;

				$this->conf->itemsOnPaginate ? $this->paginateGallery() : $this->fullGallery();
			}
		}
		
		//if not simple visitor, we add cpanel for editor
		if($this->levelAccess)
		{
			count($this->imgsOrder) ? $this->fullGallery() : $this->emptyContent();
			$this->renderEditorPanel();
		}
	}

	//render the cpanel for editor
	private function renderEditorPanel()
	{
		if($this->levelAccess)
		{
			$this->render('editor/cpanelEditor');
			$this->render('editor/pluploader');
		}
	}


	//display page title
	private function displayPageTitle()
	{
		if($this->levelAccess)
		{
			//avoid to display if page hasn't set an album or a collection
			if($this->album || $this->collection)
				$this->render( 'editor/albumInfo', array(
					'infoAlbum'=>$this->getInfoAlbumOrCollection(),
					'class'=>$this->conf->useWysiwyg ? ' class="inform area wysiwyg"' : ' class="inform area"',
					)
			);
		}
		else
		{
			if($this->album)
				if($this->conf->showAlbumTitle || $this->conf->showAlbumTitleDescription)
					$this->render('_albumInfo', array(
						'showTitle'=>$this->conf->showAlbumTitle,
						'showDescription'=>$this->conf->showAlbumTitleDescription,
						'infoAlbum'=>$this->getInfoAlbumOrCollection()
						)
					);

			if($this->collection)
				if($this->conf->showCollectionTitle || $this->conf->showCollectionDescription)
					$this->render('_albumInfo', array(
						'showTitle'=>$this->conf->showCollectionTitle,
						'showDescription'=>$this->conf->showCollectionDescription,
						'infoAlbum'=>$this->getInfoAlbumOrCollection()
						)
					);
		}
	}

	//return the name and description of an album or a collection
	public function getInfoAlbumOrCollection()
	{
		$model = $this->album ? $this->album : $this->collection;
		$translations = unserialize($model->translations);

		//take name from active language
		$name = $translations['name'][$this->lang->active];
		$description = $translations['description'][$this->lang->active];

		//isn't set in active language, because new language is added to site, we take from default
		if(!isset($name))
			$name = $translations['name'][$this->lang->default];
		if(!isset($description))
			$description = $translations['description'][$this->lang->default];

		//weird! neither default isn't set! if is administration mode we put a default string to be clear that field need to be edited
		if((!isset($name) || !isset($description)) && $this->levelAccess)
		{
			if(!isset($name))
				$name = $this->tr('needEdit');
			if(!isset($description)) 
				$description = $this->tr('needEdit');
		}
		
		return $infoAlbum = array(
				'name'=>$name,
				'description'=>$description
			);
	}

	//publish assets
	private function publishAssets()
	{
		$this->publishForVisitor();
		if($this->levelAccess)
			$this->publishForLevel();

		if($this->levelAccess === 2 )
			FBAdmin::publishAdmin();
	}

	//publish assets diferentiate to avoid unnecessary bloating of page. here for visitors
	private function publishForVisitor()
	{
		$baseUrl = Yii::app()->assetManager->publish($this->path->assets);
		$hideTooltips = (bool)$this->conf->hideTooltips;
		$jqcfg = CJavaScript::encode(unserialize(GalleryConfig::model()->find(array('condition'=>"type='fancybox'"))->config));

		if(is_dir($this->path->assets))
		{
			Yii::app()->clientScript->registerCssFile($baseUrl .'/themes/'.$this->conf->cssTheme.'/standard.css');
			Yii::app()->clientScript->registerCssFile($baseUrl .'/fancybox/jquery.fancybox-1.3.4.min.css');
			Yii::app()->clientScript->registerCssFile($baseUrl .'/themes/'.$this->conf->cssTheme.'/custom.css');

			//will place jquery and jquery-ui to end of page not in the head
			if($this->conf->coreScriptPosEnd)
				Yii::app()->clientScript->coreScriptPosition=CClientScript::POS_END;

			Yii::app()->clientScript->registerCoreScript('jquery');

			Yii::app()->clientScript->registerScriptFile($baseUrl .'/jquery.bttooltip.min.js', CClientScript::POS_END);

			if(!$this->isShop)
			{
				Yii::app()->clientScript->registerScriptFile($baseUrl .'/setThumbs.min.js', CClientScript::POS_END);
				Yii::app()->clientScript->registerScript('setThumbs',"setThumbsWidht('".$this->conf->thumbWidth."', '".$this->conf->thumbStyle."', '".$this->conf->ratioThumb."')",CClientScript::POS_READY);
			}
			else
			{
				Yii::app()->clientScript->registerScriptFile($baseUrl .'/setThumbsShop.min.js', CClientScript::POS_END);
				Yii::app()->clientScript->registerScript('setThumbs',"setThumbsWidht('".$this->conf->thumbWidth."', '".$this->conf->thumbStyle."', '".$this->conf->ratioThumb."', '".(bool)$this->collection."')",CClientScript::POS_READY);
			}

			Yii::app()->clientScript->registerScript('setGallery', "$('.gImg').fancybox($jqcfg); $('.ttp').bttooltip({design:'fbtooltip', hide :'$hideTooltips'});");

			if ($this->conf->mouseEnabled)
				Yii::app()->clientScript->registerScriptFile($baseUrl .'/fancybox/jquery.mousewheel-3.0.4.pack.min.js', CClientScript::POS_END);
			if ($this->conf->easingEnabled)
				Yii::app()->clientScript->registerScriptFile($baseUrl .'/fancybox/jquery.easing-1.3.pack.min.js', CClientScript::POS_END);
			Yii::app()->clientScript->registerScriptFile($baseUrl .'/fancybox/jquery.fancybox-1.3.4.min.js', CClientScript::POS_END);
		}
		else 
			throw new Exception($this->tr('errFolder'));
	}


	//publish assets for logged users
	private function publishForLevel()
	{	
		$baseUrl = Yii::app()->assetManager->publish($this->path->assets);

		//to register lang for pluploader
		$lang = $this->conf->pluploadLanguage === 'auto'? Yii::app()->language : $this->conf->pluploadLanguage;

		$runtimes = $this->conf->runtimes;
		//maxim Mb size of file
		$max_file_size =  $this->conf->max_file_size;
		//generate unique name for uploaded files
		$unique_names =  $this->conf->unique_names;
		//accepted extensions in file selector from uploader
		$extensions = str_replace('|', ',', $this->conf->accept);

		//if unlimited set to 9999
		$maxUploadable = $this->conf->max != -1 ? $this->conf->max : 9999;
		Yii::app()->request->cookies['maxUploadable'] = new CHttpCookie('maxUploadable', $maxUploadable);

		if(is_dir($this->path->assets))
		{
			// ------------------ uploader
			Yii::app()->clientScript->registerCoreScript('cookie');
			Yii::app()->clientScript->registerCssFile($baseUrl .'/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css');
			Yii::app()->clientScript->registerCssFile($baseUrl .'/themes/'.$this->conf->cssTheme.'/cpEditor.css');
			if(strpos($runtimes, 'browserplus'))
				Yii::app()->clientScript->registerScriptFile($baseUrl . '/plupload/browserplus-min.js', CClientScript::POS_END);

			Yii::app()->clientScript->registerScriptFile($baseUrl .'/plupload/plupload.full.js', CClientScript::POS_END);
			if(file_exists($this->path->assets .'/plupload/i18n/'.$lang.'.js'))
				Yii::app()->clientScript->registerScriptFile($baseUrl .'/plupload/i18n/'.$lang.'.js', CClientScript::POS_END);
			Yii::app()->clientScript->registerScriptFile($baseUrl .'/plupload/jquery.plupload.queue/jquery.plupload.queue.js', CClientScript::POS_END);
			// ----------------- end uploader

			if($this->conf->useWysiwyg)
			{
				Yii::app()->clientScript->registerCssFile($baseUrl .'/cleditor/jquery.cleditor.css');
				Yii::app()->clientScript->registerScriptFile($baseUrl .'/cleditor/jquery.cleditor.min.js', CClientScript::POS_END);
				Yii::app()->clientScript->registerScriptFile($baseUrl .'/cleditor/jquery.cleditor.xhtml.min.js', CClientScript::POS_END);
			}

			Yii::app()->clientScript->registerScriptFile($baseUrl .'/jquery.checkbox.min.js', CClientScript::POS_END);
			Yii::app()->clientScript->registerScriptFile($baseUrl .'/jquery.bteditinplace.min.js', CClientScript::POS_END);
			Yii::app()->clientScript->registerScriptFile($baseUrl .'/fbgallery.min.js', CClientScript::POS_END);
			
			$activeThemeFolder = $this->url->activeThemeFolder;

			Yii::app()->clientScript->registerScript('startGallery',"startGallery('$activeThemeFolder'),putUploader('$baseUrl','$max_file_size','$unique_names','$extensions','$runtimes')",CClientScript::POS_READY);
		}
		else 
			throw new Exception($this->tr('errFolder'));

		$lang = $this->conf->isMultilingual ? operations::flag($this->lang->active):false;

		Yii::app()->clientScript->registerScript('editor', "editThumbnailInfo('$lang'); removeImages( '".$this->tr('removeImage')."', '".$this->tr('deleteImage')."', '".$this->tr('deleteImages')."', '".$this->tr('deleteAllImages')."', '".$this->tr('ok')."', '".$this->tr('cancel')."', '".Yii::app()->request->requestUri."');");
		
		if($this->levelAccess === 2)
			Yii::app()->clientScript->registerCssFile($baseUrl .'/themes/'.$this->conf->cssTheme.'/cpanel.css');
	}


	//return a message when a page hasn't content
	private function emptyContent()
	{
		if(!$this->album && !$this->collection)
			return $this->render('_emptyAlbum', array('create'=>$this->tr('noAlbum')));

		if($this->album  && !count($this->imgsOrder))
			return $this->render('_emptyAlbum', array('empty'=>$this->tr('noPictures')));

		return false;
	}

	//return a text to be used as rel tag for pictures
	protected function getRelTag()
	{
		return preg_replace('!\-+!', '-', preg_replace("/[^a-z0-9-_.]/", "-", strtolower($this->getPageTitle())));
	}

	//render a paginate album. FOR SHOP will not be used pagination! 
	private function paginateGallery()
	{
		if($this->imgsOrder)
		{
			$pages=new CPagination(count($this->imgsOrder));
			$pages->setPageSize($this->conf->itemsOnPaginate);
			$this->render('_pager',array(
				'data'=>$this->setItems(),
				'pages'=>$pages,
				)
			);
		}
	}

	//render album page
	private function fullGallery()
	{
		//if there aren't images, we don't render anything
		if(!$this->imgsOrder)
			return false;

		//if is shop, go to its page to render
		if($this->isShop)
			shop::itemPageForShop();
		else
			$this->render( $this->levelAccess ? 'editor/viewSortable' : '_view', array('arrItems'=>$this->setItems()));
	}

	//return an array with information for every picture from album
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
				'imgSrc' => $this->url->galleryFolder.'/'.$this->dirs['thumbsDir'].'/'.$filename,
				'fileName' => $filename,
				'title' => $info,
				'cover'=>$isCover,
				'tags'=>$this->album->tags,
				'showThumbTools' => Yii::app()->user->isGuest ? false : true,
			);
			//show cover album as first image
			$filename === $this->album->cover ? array_unshift($arrItems, $item) : $arrItems[] = $item;
		}
		return $arrItems;
	}


	/** only for debugging */
	public function pre($var)
	{
		echo '<pre>';
		CVarDumper::dump($var);
		echo '</pre>';
	}

	/** only for debugging */
	public function dump($var)
	{
		echo '<pre>';
		CVarDumper::dump($var);die();
		echo '</pre>';
	}


}