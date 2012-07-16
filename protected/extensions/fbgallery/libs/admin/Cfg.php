<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/

class Cfg extends CFormModel
{
/** Gallery settings */
	public $gFolder;
	public $imgWidth;
	public $thWidth;
	public $quality;
	public $sharpen;
	public $thTitleShow;
	public $keepOriginal;

	public $thumbWidth;
	public $itemsOnPaginate;
	public $itemsOnLine;
	public $cssTheme;
	public $thumbStyle;
	public $ratioThumb;

	public $usedTitle;
	public $useInfoBox;
	public $useWysiwyg;
	public $predefinedTitle;
	public $hideTooltips;
	public $editorCreateAlbum;
	public $editorOfOther;
	public $editorOperateCollection;
	public $editorSeeAllAlbums;
	public $coreScriptPosEnd;

	public $isMultilingual;
	public $defaultLanguage;
	public $languages;
	public $showAlbumTitle;
	public $showAlbumTitleDescription;
	public $showAlbumTags;


/** Fancy Box settings */
	public $titlePosition;
	public $easingEnabled;
	public $mouseEnabled;
	public $transitionIn;
	public $transitionOut;
	public $speedIn; 
	public $speedOut; 
	public $overlayShow;

/** Uploader settings */
	public $accept;//accepted extensions
	public $max;//number of max files in gallery
	public $unique_names;//generate unique names
	public $max_file_size;//maxim Mb of a file
	public $runtimes;
	public $pluploadLanguage;

/** Collection settings */
	public $showCollectionTitle;
	public $showCollectionDescription;
	public $showCollectionTags;
	public $combinedAlbumsTags;
	public $showCoverName;
	public $showCoverDescription;
	public $showCoverTags;

/** Shop settings */
	public $isShopStyle;
	public $hCollectionShop;
	public $itemWidthCollectionShop;
	public $itemInfoShop;




	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function rules()
	{
		return array(
			array('gFolder, predefinedTitle', 'required', 'on'=>'gallery'),
			array('gFolder, cssTheme, usedTitle, thumbStyle', 'length', 'max'=>64),
			array('imgWidth, thWidth, thumbWidth, itemsOnPaginate, itemsOnLine, itemWidthCollectionShop', 'numerical', 'integerOnly'=>true),
			array('keepOriginal, thTitleShow, useInfoBox, useWysiwyg, hideTooltips, editorCreateAlbum, editorOfOther, editorOperateCollection, editorSeeAllAlbums, coreScriptPosEnd, isMultilingual, showAlbumTitle, showAlbumTitleDescription, showAlbumTags, isShopStyle, hCollectionShop', 'boolean'),

			array('titlePosition, transitionIn, transitionOut', 'length', 'max'=>64),
			array('speedIn, speedOut', 'numerical', 'integerOnly'=>true),
			array('easingEnabled, mouseEnabled, overlayShow', 'boolean'),

			array('accept', 'length', 'max'=>128),
			array('max', 'numerical', 'integerOnly'=>true),
			array('unique_names', 'boolean'),

			array('showCollectionTitle, showCollectionDescription, showCollectionTags, combinedAlbumsTags, showCoverName, showCoverDescription, showCoverTags', 'boolean'),
		);
	}

	public function defaultGalleryConfig()
	{
		return array(
			//apperence
			'cssTheme'=>'simple',
			'thumbStyle'=>'landscape',
			'thumbWidth'=>160,
			'ratioThumb'=>0.7,
			//image resize
			'imgWidth'=>900,
			'thWidth'=>200,
			'quality'=>75, 
			'sharpen'=>20,
			//structure
			'gFolder'=>'galleries',
			'keepOriginal'=>false,
			//options
			'useWysiwyg'=>true,
			'usedTitle'=>'filename',
			'predefinedTitle'=>'<strong>Title:</strong> Product title <br/><strong>Model:</strong> Product model<br/><strong>Price:</strong> $ 100',
			'editorCreateAlbum'=>true,
			'editorOfOther'=>true,
			'editorOperateCollection'=>true,
			'editorSeeAllAlbums'=>true,
			'coreScriptPosEnd'=>false,

			//language
			'isMultilingual'=>true,
			'defaultLanguage'=>'en',
			'languages'=>'en, ro',

			//shop
			'isShopStyle'=>false,
			'hCollectionShop'=>true,
			'itemWidthCollectionShop'=>140,
			'itemInfoShop'=>'ProductID'."\n".'Availability'."\n".'Name'."\n".'Model'."\n".'Price'."\n".'Coin'."\n".'VTA'."\n".'Quantity'."\n".'Url',

		);
	}

	public function defaultAlbumConfig()
	{
		return array(
			'showAlbumTitle'=>true,
			'showAlbumTitleDescription'=>true,
			'showAlbumTags'=>true,
			'thTitleShow'=>false,
			'useInfoBox'=>true,
			'itemsOnPaginate'=>12,
			'itemsOnLine'=>4,
			'hideTooltips'=>false,
		);
	}

	public function defaultFancyBoxConfig()
	{
		return array(
			'titlePosition'=>'inside',
			'easingEnabled'=>true,
			'mouseEnabled'=>1,
			'transitionIn'=>'elastic',
			'transitionOut'=>'elastic',
			'speedIn'=>600, 
			'speedOut'=>200, 
			'overlayShow'=>true,
			'width'  => 350,
			'height' =>'auto',
		);
	}

	public function defaultUploaderConfig()
	{
		return array(
			'max' => -1,
			'accept' => 'jpg|png|gif|jpeg',
			'unique_names'=> false,
			'max_file_size'=>3,
			'pluploadLanguage'=>'auto',
			'runtimes'=>'html5, flash',
		);
	}

	public function defaultCollectionConfig()
	{
		return array(
			'showCollectionTitle' => true,
			'showCollectionDescription' => true,
			'showCollectionTags'=>true,
			'combinedAlbumsTags'=>true,
			'showCoverName' => true,
			'showCoverDescription' => true,
			'showCoverTags' => true,
		);
	}


	public function attributeLabels()
	{
		return fbtranslations::attributeLabels();
	}

}
