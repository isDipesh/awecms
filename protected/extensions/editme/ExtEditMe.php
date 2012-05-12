<?php

/**
 * editMe Widget.
 *
 * Displays a WYSIWYG editor based on CKEditor.
 *
 * @package ext.editMe
 * @author TeamTPG
 * @copyright Copyright &copy; 2011 TeamTPG
 * @license BSD 3-clause
 * @link http://code.teamtpg.ch/editme
 * @version 1.2.2
 */
class ExtEditMe extends CInputWidget {

	/**
	 * @var string Class attribute used on <body> element of editor editing area.
	 */
	public $bodyClass = '';

	/**
	 * @var string ID attribute used on <body> element of editor editing area.
	 */
	public $bodyId = '';

	/**
	 * @var array URLs to CSS files that should be applied to editing area.
	 * Example: array('path/to/style.css', 'path/to/style2.css')
	 */
	public $contentsCss = array();

	/**
	 * @var string DOCTYPE to be used for editing area.
	 */
	public $docType = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';

	/**
	 * @var string URL to the filebrowser (link dialog).
	 */
	public $filebrowserBrowseUrl = '';

	/**
	 * @var string URL to the filebrowser (flash dialog).
	 */
	public $filebrowserFlashBrowseUrl = '';

	/**
	 * @var string URL to the filebrowser (image dialog).
	 */
	public $filebrowserImageBrowseUrl = '';

	/**
	 * @var string URL to the filebrowser (link tab in image dialog).
	 */
	public $filebrowserImageBrowseLinkUrl = '';

	/**
	 * @var string URL to the fileuploader (link dialog).
	 */
	public $filebrowserUploadUrl = '';

	/**
	 * @var string URL to the fileuploader (flash dialog).
	 */
	public $filebrowserFlashUploadUrl = '';

	/**
	 * @var string URL to the fileuploader (image dialog).
	 */
	public $filebrowserImageUploadUrl = '';

	/**
	 * @var boolean Whether to leave <html> and <head> tags in place.
	 */
	public $fullPage = false;

	/**
	 * @var string Height of editor.
	 * Example: '200', '200px', '25em'
	 */
	public $height = '200';

	/**
	 * @var string Width of editor. Leave empty for automatic width.
	 * Example: '600', '600px', '75%', '25em'
	 */
	public $width = '';

	/**
	 * @var boolean Whether the editor should automatically use the Client's preferred language.
	 * If false, it will use Yii::app()->language. If the language set in Yii::app()->language
	 * isn't supported, English will be used.
	 */
	public $autoLanguage = true;

	/**
	 * @var mixed Mode to use for editor resizing.
	 * Example: 'auto', 'both', 'horizontal', 'vertical', false
	 */
	public $resizeMode = 'both';

	/**
	 * @var array Toolbar items. Leave array empty for full toolbar or define custom items.
	 * Example: array(array('Preview'), '/', array('Bold', 'Italic', '-', 'RemoveFormat'))
	 */
	public $toolbar = array();

	/**
	 * @var boolean Whether to show advanced dialog tabs.
	 */
	public $advancedTabs = true;

	/**
	 * @var string Color of the user interface.
	 * Example: '#AADC6E', 'gold'
	 */
	public $uiColor = '';

	/**
	 * @var string Base URL used to resolve relative URLs in editor.
	 */
	public $baseHref = '';

	/**
	 * @var string URL to published CKEditor root directory.
	 */
	private static $_CKEditorURL;

	/**
	 * @var array Available editor languages.
	 */
	private static $_languages = array();

	/**
	 * @var string CKEditor extension path.
	 */
	private $_CKEditorExtPath;

	/**
	 * Initializes the editMe Widget.
	 */
	public function init() {
		$this -> _CKEditorExtPath = dirname(__FILE__) . '/vendors/CKEditor';
		$this -> _publish();
	}

	/**
	 * Publish CKEditor in assets folder.
	 */
	private function _publish() {
		if(empty(self::$_CKEditorURL)) {
			$CKEditorExtPath = $this -> _CKEditorExtPath;
			$origExcludeFiles = Yii::app() -> assetManager -> excludeFiles;
			array_push(Yii::app() -> assetManager -> excludeFiles, '_source.7z', 'INSTALL.html', 'CHANGES.html', 'ckeditor_basic_source.js', 'ckeditor_basic.js', 'ckeditor_php4.php', 'ckeditor_php5.php', 'ckeditor_source.js', 'ckeditor.asp', 'ckeditor.pack', 'ckeditor.php', 'adapters', '_samples', '_source');
			self::$_CKEditorURL = Yii::app() -> assetManager -> publish($CKEditorExtPath);
			Yii::app() -> assetManager -> excludeFiles = $origExcludeFiles;
		}
	}

	/**
	 * Run the editMe Widget.
	 */
	public function run() {
		$this -> _generateHtml();
		$generateCkUi = $this -> _generateCkUi();
		$resize = $this -> _generateCkResize();
		$id = $this -> htmlOptions['id'];
		$jsId = CJavaScript::encode($id);
		//CKEditor settings
		$baseHref = CJavaScript::encode($this -> baseHref);
		$language = $this -> _generateCkLang();
		$bodyClass = CJavaScript::encode($this -> bodyClass);
		$bodyId = CJavaScript::encode($this -> bodyId);
		$contentsCss = $this -> _generateCkContentsCss();
		$docType = CJavaScript::encode($this -> docType);
		$filebrowserBrowseUrl = CJavaScript::encode($this -> filebrowserBrowseUrl);
		$filebrowserFlashBrowseUrl = CJavaScript::encode($this -> filebrowserFlashBrowseUrl);
		$filebrowserImageBrowseUrl = CJavaScript::encode($this -> filebrowserImageBrowseUrl);
		$filebrowserFlashUploadUrl = CJavaScript::encode($this -> filebrowserFlashUploadUrl);
		$filebrowserUploadUrl = CJavaScript::encode($this -> filebrowserUploadUrl);
		$filebrowserImageBrowseLinkUrl = CJavaScript::encode($this -> filebrowserImageBrowseLinkUrl);
		$filebrowserImageUploadUrl = CJavaScript::encode($this -> filebrowserImageUploadUrl);
		$fullPage = CJavaScript::encode($this -> fullPage);
		$height = CJavaScript::encode($this -> height);
		$width = CJavaScript::encode($this -> width);
		$resize_enabled = $resize['resize_enabled'];
		$resize_dir = $resize['resize_dir'];
		$autoGrow_onStartup = $resize['autoGrow_onStartup'];
		$uiColor = CJavaScript::encode($this -> uiColor);
		$toolbar = $generateCkUi['toolbar'];
		$removeDialogTabs = $this -> _generateCkRemoveDialogTabs();
		$removePlugins = $generateCkUi['removePlugins'];
		$forcePasteAsPlainText = $generateCkUi['forcePasteAsPlainText'];
		$disableNativeSpellChecker = CJavaScript::encode(false);
		$extraPlugins = $generateCkUi['extraPlugins'];
		//Load CKEditor
		$editorScript = "CKEDITOR.replace($jsId,{baseHref:$baseHref,language:$language,bodyClass:$bodyClass,bodyId:$bodyId,contentsCss:$contentsCss,docType:$docType,filebrowserBrowseUrl:$filebrowserBrowseUrl,filebrowserFlashBrowseUrl:$filebrowserFlashBrowseUrl,filebrowserImageBrowseUrl:$filebrowserImageBrowseUrl,filebrowserFlashUploadUrl:$filebrowserFlashUploadUrl,filebrowserUploadUrl:$filebrowserUploadUrl,filebrowserImageBrowseLinkUrl:$filebrowserImageBrowseLinkUrl,filebrowserImageUploadUrl:$filebrowserImageUploadUrl,fullPage:$fullPage,height:$height,width:$width,'resize_enabled':$resize_enabled,'resize_dir':$resize_dir,'autoGrow_onStartup':$autoGrow_onStartup,uiColor:$uiColor,toolbar:$toolbar,removeDialogTabs:$removeDialogTabs,removePlugins:$removePlugins,forcePasteAsPlainText:$forcePasteAsPlainText,disableNativeSpellChecker:$disableNativeSpellChecker,extraPlugins:$extraPlugins});";
		Yii::app() -> clientScript -> registerScript('editMe_' . $id, $editorScript, 2);
	}

	/**
	 * Generate HTML code.
	 */
	private function _generateHtml() {
		$CKEditorURL = self::$_CKEditorURL;
		$nameID = $this -> resolveNameID();
		$this -> htmlOptions['id'] = $nameID[1];
		Yii::app() -> clientScript -> registerScriptFile($CKEditorURL . '/ckeditor.js');
		if($this -> hasModel()) {
			echo CHtml::activeTextArea($this -> model, $this -> attribute, $this -> htmlOptions);
		} else {
			echo CHtml::textArea($this -> name, $this -> value, $this -> htmlOptions);
		}
	}

	/**
	 * Generate CKEditor removeDialogTabs value.
	 * @return string CKEditor removeDialogTabs value.
	 */
	private function _generateCkRemoveDialogTabs() {
		$removeDialogTabs = '';
		if($this -> advancedTabs === false) {
			$removeDialogTabs .= 'imagebutton:advanced;creatediv:advanced;editdiv:advanced;link:advanced;image:advanced;table:advanced;tableProperties:advanced;flash:advanced;iframe:advanced;';
		}
		return CJavaScript::encode($removeDialogTabs);
	}

	/**
	 * Generate CKEditor contentsCss value.
	 * @return string CKEditor contentsCss value.
	 */
	private function _generateCkContentsCss() {
		return CJavaScript::encode(array_merge(array(self::$_CKEditorURL . '/contents.css'), $this -> contentsCss));
	}
	
	/**
	 * Generate CKEditor resizing settings.
	 * @return array CKEditor resize_enabled, resize_dir and autoGrow_onStartup values.
	 */
	private function _generateCkResize() {
		$resize_enabled = true;
		$resize_dir = 'both';
		$autoGrow_onStartup = false;
		if ($this->resizeMode == 'both' || $this->resizeMode == 'vertical' || $this->resizeMode == 'horizontal') {
			$resize_dir = $this->resizeMode;
		} elseif($this->resizeMode == 'auto') {
			$resize_enabled = false;
			$autoGrow_onStartup = true;
		} elseif($this->resizeMode === false) {
			$resize_enabled = false;
		}
		return array('resize_enabled' => CJavaScript::encode($resize_enabled), 'resize_dir'=>CJavaScript::encode($resize_dir), 'autoGrow_onStartup'=>CJavaScript::encode($autoGrow_onStartup));
	}

	/**
	 * Generate CKEditor toolbar value and deactivate/activate certain plugins/settings.
	 * @return array CKEditor toolbar, removePlugins, extraPlugins and forcePasteAsPlainText values.
	 */
	private function _generateCkUi() {
		$toolbar = $this -> toolbar;
		$removePlugins = array();
		$extraPlugins = array();
		$forcePasteAsPlainText = false;
		$toolbar2plugin = array('Source' => array('sourcearea'), 'Save' => array('save'), 'NewPage' => array('newpage'), 'Preview' => array('preview'), 'Print' => array('print'), 'Templates' => array('templates'), 'PasteText' => array('pastetext'), 'PasteFromWord' => array('pastefromword'), 'SpellChecker' => array('wsc'), 'Scayt' => array('scayt'), 'Blockquote' => array('blockquote'), 'CreateDiv' => array('div'), 'Image' => array('image'), 'Flash' => array('flash'), 'Table' => array('table', 'tabletools'), 'HorizontalRule' => array('horizontalrule'), 'Smiley' => array('smiley'), 'SpecialChar' => array('specialchar'), 'PageBreak' => array('pagebreak'), 'Iframe' => array('iframe'), 'Styles' => array('stylescombo'), 'Format' => array('format'), 'Maximize' => array('maximize'), 'ShowBlocks' => array('showblocks'), 'About' => array('about'), );
		$plugin2toolbar = array('undo' => array('Undo', 'Redo', ), 'find' => array('Find', 'Replace'), 'forms' => array('Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField', ), 'justify' => array('JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', ), 'bidi' => array('BidiLtr', 'BidiRtl', ), 'link' => array('Link', 'Unlink', 'Anchor', ), 'font' => array('Font', 'FontSize', ), 'colorbutton' => array('TextColor', 'BGColor', ), 'basicstyles' => array('Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', ), );
		if(!empty($toolbar)) {
			//Put all defined toolbar items in array
			foreach($toolbar as $items) {
				if(is_array($items)) {
					foreach($items as $item) {
						$toolbarItems[$item] = '';
					}
				}
			}
			//toolbar2plugin removal
			foreach($toolbar2plugin as $item => $plugins) {
				if(!isset($toolbarItems[$item])) {
					foreach($plugins as $plugin) {
						$removePlugins[$plugin] = $plugin;
					}
				}
			}
			//plugin2toolbar removal
			foreach($plugin2toolbar as $plugin => $items) {
				$removePlugins[$plugin] = $plugin;
				foreach($items as $item) {
					if(isset($toolbarItems[$item])) {
						unset($removePlugins[$plugin]);
						break;
					}
				}
			}
			//forcePasteAsPlainText
			if(!isset($toolbarItems['Paste']) && !isset($toolbarItems['PasteFromWord'])) {
				$forcePasteAsPlainText = true;
			}
		}
		//extraPlugins
		if(empty($toolbar) || isset($toolbarItems['DocProps'])) {
			$extraPlugins['docprops'] = 'docprops';
		}
		if($this->resizeMode == 'auto') {
			$extraPlugins['autogrow'] = 'autogrow';
		}
		//Prepare values
		$removePlugins = CJavaScript::encode(implode(',', $removePlugins));
		$extraPlugins = CJavaScript::encode(implode(',', $extraPlugins));
		$forcePasteAsPlainText = CJavaScript::encode($forcePasteAsPlainText);
		if(empty($toolbar)) {
			$toolbar = 'Full';
		}
		$toolbar = CJavaScript::encode($toolbar);
		//We're done
		return array('toolbar' => $toolbar, 'removePlugins' => $removePlugins, 'extraPlugins' => $extraPlugins, 'forcePasteAsPlainText' => $forcePasteAsPlainText);
	}

	/**
	 * Generate CKEditor language value.
	 * @throws CException if CKEditor lang folder cannot be read.
	 * @return string CKEditor language value.
	 */
	private function _generateCkLang() {
		if($this -> autoLanguage === false) {
			$CKEditorExtPath = $this -> _CKEditorExtPath;
			if(empty(self::$_languages)) {
				$languages = glob($CKEditorExtPath . '/lang/*');
				if(empty($languages)) {
					throw new CException('ext.editMe: Cannot access ' . $CKEditorExtPath . '/lang');
				}
				foreach($languages as $index => $language) {
					$language = str_replace($CKEditorExtPath . '/lang/', '', $language);
					if(strpos($language, '_') === 0) {
						unset($languages[$index]);
					} else {
						$languages[$index] = substr($language, 0, -3);
					}
				}
				self::$_languages = $languages;
			} else {
				$languages = self::$_languages;
			}
			$appLanguage = str_replace('_', '-', strtolower(Yii::app() -> language));
			if(in_array($appLanguage, $languages)) {
				return CJavaScript::encode($appLanguage);
			} else if(in_array(substr($appLanguage, 0, 2), $languages)) {
				return CJavaScript::encode(substr($appLanguage, 0, 2));
			} else {
				return CJavaScript::encode('en');
			}
		} else {
			return CJavaScript::encode('');
		}
	}

}
