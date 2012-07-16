<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/
class fbtranslations
{
	//translation for all strings used in fbgallery
	//for english only, isn't neccessary to create messages in your application
	//but when use multilingual site, you will add languages from fbgallery/messages in your application messages folder and using en language, will create translations for used languages
	public function tr($str, $arr=false)
	{
		$strings = array(
			'successUpdate' => Yii::t('fbgallery', 'Configuration successfully saved! Click me to close this information box!'),
			'errorUpdate'=>Yii::t('fbgallery', 'There were errors in your configuration settings. New configuration settings weren\'t saved! Click me to close this warning!'),
			'mandatoryFields' => Yii::t('fbgallery', 'Settings with a <span style="color:red;">*</span> cannot<br />be empty!'),
			'ok'=>Yii::t('fbgallery', 'OK'),
			'cancel'=>Yii::t('fbgallery', 'Cancel'),
			'errFolder'=>Yii::t('fbgallery', 'FBGallery - Error: Couldn\'t find assets folder to publish.'),
			'cantSave'=>Yii::t('fbgallery', 'Error: I can\'t save to database!'),
			'removeImage' => Yii::t('fbgallery','Remove image/images'),
			'deleteImage' => Yii::t('fbgallery','Do you want to delete xxxxx image from album?'),
			'deleteImages' => Yii::t('fbgallery','Do you want to delete xxxxx images from album?'),
			'deleteAllImages' => Yii::t('fbgallery','Do you want to delete all images from album?'),
			'emptyAlbum' => Yii::t('fbgallery', 'This album is empty'),
			'emptyGallery'=>Yii::t('fbgallery', 'This collection is empty'),
			'no' => Yii::t('fbgallery', 'No'),
			'yes' => Yii::t('fbgallery', 'Yes'),
			'save' => Yii::t('fbgallery','Save'),
			'cPanel' => Yii::t('fbgallery', 'Control Panel FBGallery'),

			'clickLoadDefault'=>Yii::t('fbgallery', 'Click to load default value'),
			'defaultGallery' => Yii::t('fbgallery', 'Load default configuration for Gallery'),
			'configureGallery' =>Yii::t('fbgallery', 'Configure Gallery'),
			'defaultFancyBox' => Yii::t('fbgallery', 'Load default configuration for Fancy Box'),
			'configureFancyBox' =>Yii::t('fbgallery', 'Configure Fancy Box'),
			'defaultUploader' => Yii::t('fbgallery', 'Load default configuration for Uploader'),
			'configureUploader' =>Yii::t('fbgallery', 'Configure Uploader'),

			'checkToDelete'=>Yii::t('fbgallery', 'Checked to be deleted'),
			'clickDelete'=>Yii::t('fbgallery', 'Click to delete now'),
			'clickEditTitle'=>Yii::t('fbgallery', 'Click to edit title'),
			'setCover'=>Yii::t('fbgallery', 'Set as cover of album'),
			'isSetAsCover'=>Yii::t('fbgallery', 'This is the cover of album'),
		
			'hideTooltips'=>Yii::t('fbgallery', 'Without tooltips'),
			'showTooltips'=>Yii::t('fbgallery', 'With tooltips'),

			'deleteChecked' => Yii::t('fbgallery', 'Delete checked'),
			'clearGallery' => Yii::t('fbgallery', 'Clear album'),
			'loadFile' => Yii::t('fbgallery', 'Load files'),
			'landscape' => Yii::t('fbgallery', 'Landscape'),
			'portrait' => Yii::t('fbgallery', 'Portrait'),
			'square' => Yii::t('fbgallery', 'Square'),

			'browserUnable' => Yii::t('fbgallery', 'You browser doesn\'t have HTML5, Flash, Silverlight, Gears, or BrowserPlus support.'),

			'canUpload' => Yii::t('fbgallery', 'You can upload another'),
			'file-s' => Yii::t('fbgallery', 'file(s)'),

			'filename'=>Yii::t('fbgallery', 'Filename'),
			'pagetitle'=>Yii::t('fbgallery', 'Page title'), 
			'predefined'=>Yii::t('fbgallery', 'Predefined'),
			'remove' => Yii::t('fbgallery', 'Remove'),
			'keep' => Yii::t('fbgallery', 'Keep'),
			'hideTitle' =>Yii::t('fbgallery', 'Hide title'),
			'showTitle'=>Yii::t('fbgallery', 'Show title'),
			'inside'=>Yii::t('fbgallery', 'Inside'),
			'outside'=>Yii::t('fbgallery', 'Outside'),
			'over'=>Yii::t('fbgallery', 'Over'),

			'withoutEffect' => Yii::t('fbgallery', 'Without effect'),
			'withEffect' => Yii::t('fbgallery', 'With effect'),
			'withMouse' => Yii::t('fbgallery', 'With mouse support'),
			'withoutMouse' => Yii::t('fbgallery', 'Without mouse support'),

			'elastic'=> Yii::t('fbgallery', 'Elastic'),
			'fade'=> Yii::t('fbgallery', 'Fade'),

			'TextArea'=>Yii::t('fbgallery', 'TextArea'),
			'WYSIWYG'=>Yii::t('fbgallery', 'WYSIWYG'),
			'thTitleShow' => Yii::t('fbgallery', 'Show title over thumbnail'),
			'hideInfo'=>Yii::t('fbgallery', 'Hide info'),
			'showInfo'=>Yii::t('fbgallery', 'Show info'),

			'newAlbumOrCollection'=>Yii::t('fbgallery', 'New album or collection'),
			'removeAlbum'=>Yii::t('fbgallery', 'Remove album'),
			'removeCollection'=>Yii::t('fbgallery', 'Remove collection'),
			'inCollection'=>Yii::t('fbgallery', 'In this collection'),

			'createAlbumOrCollection'=>Yii::t('fbgallery', 'Create Album Or Collection'),
			'create'=>Yii::t('fbgallery', 'Create'),

			'newAlbumName'=> Yii::t('fbgallery', 'Name'),
			'newAlbumDescription'=> Yii::t('fbgallery', 'Description'),
			'noName'=> Yii::t('fbgallery', 'No name'),
			'noDescription'=> Yii::t('fbgallery', 'No description'),

			'editorCreate'=>Yii::t('fbgallery', 'Editor can create album'),
			'editorNoCreate'=>Yii::t('fbgallery', 'Editor can\'t create album'),

			'isMultilingual'=>Yii::t('fbgallery', 'Multilingual'),
			'isNotMultilingual'=>Yii::t('fbgallery', 'Not Multilingual'),

			'withInformation'=>Yii::t('fbgallery', 'With information'),
			'withoutInformation'=>Yii::t('fbgallery', 'Without information'),

			'confirmRemoveAlbumOrCollection'=>Yii::t('fbgallery', 'This operation is irreversible. All content and all information about <strong>{album}</strong> {type} will be removed!<br /><br /><strong>Are you sure you want to remove {album} {type}?</strong>'),
			'cantRemoveAlbum'=>Yii::t('fbgallery', 'I can\'t remove album. Database error!'),

			'noAlbum'=>Yii::t('fbgallery', 'There isn\'t any album or collection on this page!'),
			'noPictures'=>Yii::t('fbgallery', 'There aren\'t pictures in this album!'),
			'isCollection'=>Yii::t('fbgallery', '<strong>This will be a collection not an album!</strong>'),
			'needEdit'=>Yii::t('fbgallery', 'This info is empty. Please fill it now!'),

			//cpanel
			'cpanel'=>Yii::t('fbgallery', 'Control Panel'),
			'gallery'=>Yii::t('fbgallery', 'Gallery'),
			'album'=>Yii::t('fbgallery', 'Album'),
			'collection'=>Yii::t('fbgallery', 'Collection'),
			'fancybox'=>Yii::t('fbgallery', 'FancyBox'),
			'uploader' => Yii::t('fbgallery', 'Uploader'),
			'loadDefaultConfiguration'=>Yii::t('fbgallery', 'Load default configuration for'),

			'administrator' => Yii::t('fbgallery', 'Administrator'),
			'cpAppearance'=>Yii::t('fbgallery', 'Appearance'),
			'cpImageResize'=>Yii::t('fbgallery', 'Image resize'),
			'cpStructure'=>Yii::t('fbgallery', 'Structure'),
			'cpOptions'=>Yii::t('fbgallery', 'Options'),
			'cpLanguages'=>Yii::t('fbgallery', 'Languages'),
			'cpAlbum'=>Yii::t('fbgallery', 'Album'),
			'all'=>Yii::t('fbgallery', 'All'),//all configurations
			'saveAlbum'=>Yii::t('fbgallery', 'Save Album'),
			'saveGallery'=>Yii::t('fbgallery', 'Save Gallery'),
			'saveCollection'=>Yii::t('fbgallery', 'Save Collection'),
			'saveFancyBox'=>Yii::t('fbgallery', 'Save FancyBox'),
			'saveUploader'=>Yii::t('fbgallery', 'Save Uploader'),


			'cPanelGallery' => Yii::t('fbgallery', 'Gallery Settings'),
			'cPanelAlbum'=> Yii::t('fbgallery', 'Album Settings'),
			'cPaneCollection'=> Yii::t('fbgallery', 'Collection Settings'),
			'cPanelFancyBox' => Yii::t('fbgallery', 'Fancy Box Settings'),
			'cPanelUploader' => Yii::t('fbgallery', 'Uploader Settings'),

			'loadDefault'=>Yii::t('fbgallery', 'Load default for'),
			'loadDefaultFor'=>Yii::t('fbgallery', 'Load default settings?'),
			'doYouLoadDefault'=>Yii::t('fbgallery','Actuall settings will be lost!<br />Do you want to load all default settings for <strong><span class="configType"></span></strong>?'),

			'noHelp'=>Yii::t('fbgallery', 'Sorry, but there isn\'t any help for<br />'),
			'noAlbumExists'=>Yii::t('fbgallery', 'There isn\'t any album in this collection!'),
			'noTranslation'=>Yii::t('fbgallery', 'There isn\'t any translation for'),

//new
			'tags'=>Yii::t('fbgallery', 'Tags (max.256 characters)'),
			'tagsLabel'=>Yii::t('fbgallery', 'Tags'),
			'toComplete'=>Yii::t('fbgallery', 'To add more information here, edit page:'),
			'onlyAuthor'=>Yii::t('fbgallery', 'Only author'),
			'editAllAlbums'=>Yii::t('fbgallery', 'All editors'),
			'editorOperateCollection'=>Yii::t('fbgallery', 'Editor can operate with collections'),
			'editorNoOperateCollection'=>Yii::t('fbgallery', 'Editor can\'t operate with collections'),
			'editorSelectAllAlbums'=>Yii::t('fbgallery', 'Editor select others album'),
			'editorOnlyHisAlbums'=>Yii::t('fbgallery', 'Editor select only his albums'),
			'createNewAlbum'=>Yii::t('fbgallery', 'Create new album'),
			'createNewCollection'=>Yii::t('fbgallery', 'Create new collection'),
			'pos_end'=>Yii::t('fbgallery', 'End'),
			'pos_head'=>Yii::t('fbgallery', 'Head'),
			'useShop' => Yii::t('fbgallery', 'Use shop'),
			'dontUseShop' => Yii::t('fbgallery', 'Don\'t use shop'),
			'cpShop'=>Yii::t('fbgallery', 'Shop'),
			'vertical'=>Yii::t('fbgallery', 'Vertical'),
			'horizontal'=>Yii::t('fbgallery', 'Horizontal'),
			'setStandardShop'=>Yii::t('fbgallery', 'Set standard shop'),

			'ProductID'=>Yii::t('fbgallery', 'Product ID'),
			'Availability'=>Yii::t('fbgallery', 'Availability'),
			'Name'=>Yii::t('fbgallery', 'Name'),
			'Model'=>Yii::t('fbgallery', 'Model'),
			'Price'=>Yii::t('fbgallery', 'Price'),
			'Coin'=>Yii::t('fbgallery', 'Coin'),
			'VTA'=>Yii::t('fbgallery', 'VTA'),
			'Quantity'=>Yii::t('fbgallery', 'Quantity'),
			'Url'=>Yii::t('fbgallery', 'Url'),



		);

		if($arr) return $strings;

		return !array_key_exists($str,$strings) ? $this->tr('noTranslation').' '.$str : $strings[$str];
	}


	//here are translations for cpanel settings information and help for every setting
	public function attributeLabels()
	{
		return array(
			'cssTheme'=>Yii::t('fbgallery', 'CSS theme for gallery'),
			'cssThemeHelp'=>Yii::t('fbgallery', 'Select which theme will be applied to gallery.'),

			'thumbStyle'=> Yii::t('fbgallery', 'Style of thumbnail'),
			'thumbStyleHelp'=> Yii::t('fbgallery', 'Select mode how thumbnail will be displayed.'),

			'thumbWidth'=> Yii::t('fbgallery', 'Width of thumbnail'),
			'thumbWidthHelp'=> Yii::t('fbgallery', 'According to this, thumbnail height will be set using ratio setting. This width will be also used for title and infobox.<br/><strong>Recommended: not bigger than 200.</strong>'),

			'ratioThumb'=> Yii::t('fbgallery', 'Ratio'),
			'ratioThumbHelp'=> Yii::t('fbgallery', 'Ratio is used to calculate height of thumbnail according with it width, when thumbnail\'s aspect is set to landscape or portrait.<br/>Same ratio is used to resize uploaded pictures.<br/>This setting will not affect thumbnail aspect if it is set to square, case when ratio will be considered 1. If ratio is set to 1, will also generate a square.<br/><strong>Recommended: to keep picture aspect, use 0.7.</strong>'),

			'thTitleShow' => Yii::t('fbgallery', 'Title box over thumbnail'),
			'thTitleShowHelp' => Yii::t('fbgallery', 'Set if you need to show title box over thumbnail. This is a good option only when are used very short title for image.<br/>For longer information use information box.<br/><strong>Recommended: only for very short text titles.</strong>'),

			'useInfoBox' => Yii::t('fbgallery', 'Informations box under thumbnail'),
			'useInfoBoxHelp' => Yii::t('fbgallery', 'Use it when you need to display complex information under thumbnail\'s image, this box being able to display html. It\'s content will be the same as title tag of the image, will be also displayed under pop-up image and can be easy changed using wysiwyg editor.<br/><strong>Recommended: when need complex information to be displayed under thumbnail.</strong>'),

			'imgWidth' => Yii::t('fbgallery', 'Width for pop-up images'),
			'imgWidthHelp' => Yii::t('fbgallery', 'This is used to resize uploaded image. Here we set maximum width for pop-up images.<br />Images smaller than this value, will not be resized, keeping original width.<br/>Don\'t set it value too big, because server will unnecessarily wasted space and also pop-up images will be loaded slower.<br /><strong>Recommended: between 700 and 1000.</strong>'),

			'thWidth' => Yii::t('fbgallery', 'Width for thumbnail images'),
			'thWidthHelp' => Yii::t('fbgallery', '<strong>This is most important setting, which can affect performance of your gallery page.</strong><br />This setting is used to create thumbnail\'s images, resizing uploaded image.<br />Set its value to same size as widht of thumbnail or just a little bigger than it (max +5). Don\'t set it too bigger. A large gallery, with many thumbnails will affect your page speed loading.<br />This width is for image of thumbnail not the width of thumbnail itself!<br />Images smaller than this value, will not be resized, they will keep original width.<br/><strong>Recommended: maximum +5 bigger than width of thumbnail</strong>.'),

			'quality' => Yii::t('fbgallery', 'Quality image'),
			'qualityHelp' => Yii::t('fbgallery', 'This is the compression level used when an image is resized. If it is too big compression (lower value), image will lose quality. If it is too low compression (bigger value), image weight will affect load of Gallery\'s page.<br/><strong>Recommended: between 75 and 85</strong>'),

			'sharpen' => Yii::t('fbgallery', 'Sharpen image'),
			'sharpenHelp' => Yii::t('fbgallery', 'This is applied when an image is resized.<br/>Will give a better clarity to image if isn\'t used in excess.<br/><strong>Recommended: 20 percents.</strong>'),

			'keepOriginal' => Yii::t('fbgallery', 'Keep original pictures'),
			'keepOriginalHelp' => Yii::t('fbgallery', 'You can keep original pictures after resize them. Those will be kept in \'original\' folder.<br/><strong>Warning! This will consume your server space, original pictures having bigger sizes.</strong>'),

			'itemsOnPaginate'=>Yii::t('fbgallery', 'Thumbnails on page - with pagination'),
			'itemsOnPaginateHelp'=>Yii::t('fbgallery', 'Set how many thumbnails will be displayed on every page when is used pagination.<br/><strong>If is set to 0, pagination will not be active.</strong>'),

			'itemsOnLine'=>Yii::t('fbgallery', 'Thumbnails on line - without pagination'),
			'itemsOnLineHelp'=>Yii::t('fbgallery', 'Set how many thumbnails will be displayed on every line when not using pagination. This will not affect how many thumbnails will be displayed on line when use pagination.'),

			'gFolder' => Yii::t('fbgallery', 'Container folder for galleries'),
			'gFolderHelp' => Yii::t('fbgallery', 'Here will be stored our galleries with uploaded images. If needed, use paths related to site root<br /><strong>Example: images/mygalleries</strong>'),

			'useWysiwyg'=>Yii::t('fbgallery', 'Type editor for title'),
			'useWysiwygHelp'=>Yii::t('fbgallery', 'If use title box for display information about thumbnail, or you don\'t show any information near thumbnail, select TextArea as editor. If use information box and need html to decorate your text information, select WYSIWYG as editor.'),

			'usedTitle'=>Yii::t('fbgallery', 'Used title for uploaded pictures'),
			'usedTitleHelp'=>Yii::t('fbgallery', 'Every thumbnail will have a name when is uploaded. For your convenience you can choose how will set it\'s title.<br />If will use filename, title will be converted (if possible) in text without extension.<br />If use page title, page\'s metatitle will be used.<br />If use predefined title, will use value from next setting box, which you must set before use.'),

			'predefinedTitle'=>Yii::t('fbgallery', 'Predefined text title/information'),
			'predefinedTitleHelp'=>Yii::t('fbgallery', 'Here is set the predefined title for uploaded pictures.<br/>If thumbnail use title box to display information, set a very short pure text and use TextArea as title editor.<br/>If thumbnail use information box, you can use html to display information. In this case is reccommended to use WYSIWYG editor for title.'),

			'hideTooltips'=>Yii::t('fbgallery', 'Hide tooltips'),
			'hideTooltipsHelp'=>Yii::t('fbgallery', 'Use tooltips to hide the ugly pop-up title which appear when when move mouse over thumbnail. If hide tooltips, will be anyway active in administration mode, to show neccessary inline helps from CPanel.'),


			'editorCreateAlbum'=>Yii::t('fbgallery', 'Editor create/remove albums'),
			'editorCreateAlbumHelp'=>Yii::t('fbgallery', 'Editor can create and remove albums. If not, only admin will can do this.'),

			'isMultilingual'=>Yii::t('fbgallery', 'Is multilingual'),
			'isMultilingualHelp'=>Yii::t('fbgallery', 'If your site is multilingual, you can set information for every language.'),

			'languages'=>Yii::t('fbgallery', 'Use next languages'),
			'languagesHelp'=>Yii::t('fbgallery', 'When use multilingual, here you will set all used languages. Add languages code, separate by coma. <br/>Example: en, ro, es, it'),

			'defaultLanguage'=>Yii::t('fbgallery', 'Default language'),
			'defaultLanguageHelp'=>Yii::t('fbgallery', 'Default language used for gallery. When a translation is missing in multilingual mode, default language will be shown.'),

			'showAlbumTitle'=>Yii::t('fbgallery', 'Display album title on page'),
			'showAlbumTitleHelp'=>Yii::t('fbgallery', 'Display the album title in album page. Album\'s title will be displayed on top of page.'),

			'showAlbumTitleDescription'=>Yii::t('fbgallery', 'Display album description on page'),
			'showAlbumTitleDescriptionHelp'=>Yii::t('fbgallery', 'Display album description under title in album page.'),

			'easingEnabled'=>Yii::t('fbgallery', 'Easing Efect'),
			'easingEnabledHelp'=>Yii::t('fbgallery', 'Set if use or not the Easing Efect'),

			'mouseEnabled'=>Yii::t('fbgallery', 'Use mouse'),
			'mouseEnabledHelp'=>Yii::t('fbgallery', 'If you use mouse, pop-up pictures will be changed using mouse scroll'),

			'titlePosition'=>Yii::t('fbgallery', 'Position for image title'),
			'titlePositionHelp'=>Yii::t('fbgallery', 'Select position for image title in pop-up'),

			'transitionIn'=>Yii::t('fbgallery', 'Transition in Efect'),
			'transitionInHelp'=>Yii::t('fbgallery', 'Which efect will be use when Transition in'),

			'transitionOut'=>Yii::t('fbgallery', 'Transition out Efect'),
			'transitionOutHelp'=>Yii::t('fbgallery', 'Which efect will be use when Transition out'),

			'speedIn'=>Yii::t('fbgallery', 'Speed in Efect'),
			'speedInHelp'=>Yii::t('fbgallery', 'Speed for efect in'),

			'speedOut'=>Yii::t('fbgallery', 'Speed out Efect'),
			'speedOutHelp'=>Yii::t('fbgallery', 'Speed for efect out'),

			'overlayShow'=>Yii::t('fbgallery', 'Display Overlay Efect'),
			'overlayShowHelp'=>Yii::t('fbgallery', 'Display Overlay Efect'),


			'max' => Yii::t('fbgallery', 'Maximum files(-1 unlimited)'),
			'maxHelp' => Yii::t('fbgallery', 'Maximum number of files which can be uploaded in gallery. Using this value, the uploader will limit the pictures which will upload. If this value is set to -1, it will allow to be uploaded unlimited images.'),

			'accept' => Yii::t('fbgallery', 'Accepted files type'),
			'acceptHelp' =>Yii::t('fbgallery', 'Select a set of accepted files type, which will be accepted to be uploaded.'),

			'pluploadLanguage' => Yii::t('fbgallery', 'Language used by uploader'),
			'pluploadLanguageHelp' => Yii::t('fbgallery', 'Language used by uploader. If is set to Auto, will use the language used by gallery page, if exists a translation for it. If there isn\'t, will use English as default.<br/>If a language is selected, the uploader will ignore system language and will use that language everytime.'),

			'unique_names' => Yii::t('fbgallery', 'Generate unique name for every file'),
			'unique_namesHelp' => Yii::t('fbgallery', 'If is selected to generate unique name, every file will receive an unique filename generated by system, avoiding in this way to rewrite existing pictures, else every filename will be converted to accepted style and if there already is a picture with that name, will be overwritten.'),

			'max_file_size' =>Yii::t('fbgallery', 'Maximum Mb for file'),
			'max_file_sizeHelp' =>Yii::t('fbgallery', 'Set the maximum size in Mb for files to be uploaded. The files bigger than this value will be rejected. Maximum size may be the maximum accepted by server.'),

			'runtimes' => Yii::t('fbgallery', 'Used runtimes'),
			'runtimesHelp' =>Yii::t('fbgallery', 'What runtimes will be used for uploader.'),


			'showCollectionTitle' =>Yii::t('fbgallery', 'Show collection\'s title as page title'),
			'showCollectionTitleHelp' =>Yii::t('fbgallery', 'Display in the top of collection\'s page the title of collection.'),

			'showCollectionDescription' =>Yii::t('fbgallery', 'Show collection\'s description'),
			'showCollectionDescriptionHelp' =>Yii::t('fbgallery', 'Display collection\'s description under the title.'),

			'showCoverName' =>Yii::t('fbgallery', 'Show album name under cover'),
			'showCoverNameHelp' =>Yii::t('fbgallery', 'In collection under the cover of album display the name of album.'),

			'showCoverDescription' =>Yii::t('fbgallery', 'Show album description under cover'),
			'showCoverDescriptionHelp' =>Yii::t('fbgallery', 'In collection under the cover of album display the description of album.'),

//new
			'editorOfOther' =>Yii::t('fbgallery', 'Editors can edit albums created by other'),
			'editorOfOtherHelp' =>Yii::t('fbgallery', 'If use \'All editors\', all editors can edit any album, not only created by him.<br />If use \'Only author\' , then editor will can edit only albums created by him, other editors\'s album will be seen like a visitor. Administrator will can edit any page anyway.'),

			'editorOperateCollection'=>Yii::t('fbgallery', 'Editors can operate collection'),
			'editorOperateCollectionHelp'=>Yii::t('fbgallery', 'If editor can operate collection, panel editor will be visible for editor, else only administrator will can create/remove/edit collections'),

			'editorSeeAllAlbums'=>Yii::t('fbgallery', 'Editors can select others album in collection'),
			'editorSeeAllAlbumsHelp'=>Yii::t('fbgallery', 'Select if editor can see and select albums created by all editors to include in his own collection.'),

			'coreScriptPosEnd' => Yii::t('fbgallery', 'Core script position'),
			'coreScriptPosEndHelp' => Yii::t('fbgallery', 'This option is to select where will be placed core script(jquery and jquery-ui). It is reccommended to be placed at end, but if your website need to load jquery before other scripts, you will select head or better optimize your page to load core at end'),

			'isShopStyle' => Yii::t('fbgallery', 'Use shop style'),
			'isShopStyleHelp' => Yii::t('fbgallery', 'Using shop style means to show cover as a bigger image over the rest of pictures. You will have a nice gallery for your items. In the left will be displayed pictures of your articol and in the right will have a place where you can describe the articol and place a shopping cart.<br />.Hints: Select square style for thmbnail.<br /><strong>Important</strong> - you will select the shop theme and use 50 for width of thumbnail. Or, you can customize css theme and use another values.'),

			'hCollectionShop'=>Yii::t('fbgallery', 'Horizontal rows in collection'),
			'hCollectionShopHelp'=>Yii::t('fbgallery', 'If use horizontal rows, every entry for items in collection will be displayed horizontal: in the left will be the thumbnail, in the right information about that item.<br /> If not use horizontal, every item will be displayed continuos, and information about that item will be displayed under its thumbnail.'),

			'itemWidthCollectionShop'=>Yii::t('fbgallery', 'Width of thumbnail from collection'),
			'itemWidthCollectionShopHelp'=>Yii::t('fbgallery', 'Set the width of thumbnail from collection when is using shop'),

			'itemInfoShop'=>Yii::t('fbgallery', 'Default information for shop\'s item'),
			'itemInfoShopHelp'=>Yii::t('fbgallery', 'Default information for shop\'s item, displayed in the left of pictures. This information will be easy to change using wysiwyg editor'),

			'showCoverTags'=>Yii::t('fbgallery', 'Show tags under cover'),
			'showCoverTagsHelp'=>Yii::t('fbgallery', 'Show tags under cover of album in collection page. Useful for SEO, but sometime can be ugly.'),

			'showCollectionTags'=>Yii::t('fbgallery', 'Show tags of collection'),
			'showCollectionTagsHelp'=>Yii::t('fbgallery', 'Show collection\'s tags at the bottom of collection. Useful for SEO, but sometime can be ugly.'),

			'showAlbumTags'=>Yii::t('fbgallery', 'Show tags of album'),
			'showAlbumTagsHelp'=>Yii::t('fbgallery', 'Show album\'s tags at the bottom of album. Useful for SEO, but sometime can be ugly.'),


			'combinedAlbumsTags'=>Yii::t('fbgallery', 'Combine albums tags'),
			'combinedAlbumsTagsHelp'=>Yii::t('fbgallery', 'Combine collection\'s tags with included albums tags. Useful when don\'t show album\'s tag under the cover, but display collection\'s tags. Nedded for a better SEO results.'),


		);
	}

}
?>