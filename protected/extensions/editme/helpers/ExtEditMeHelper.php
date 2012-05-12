<?php

/**
 * editMe Helper.
 *
 * Helps with everything around the editMe extension.
 *
 * @package ext.editMe.helpers
 * @author TeamTPG
 * @copyright Copyright &copy; 2011 TeamTPG
 * @license BSD 3-clause
 * @link http://code.teamtpg.ch/editme
 * @version 1.2.2
 */
class ExtEditMeHelper {

	/**
	 * Generate script code for CKEditor basepath definition.
	 * @return string Generated script code.
	 */
	public static function generateBasepath() {
		$CKEditorExtPath = dirname(dirname(__FILE__)) . '/vendors/CKEditor';
		$CKEditorUrl = CJavaScript::encode(Yii::app() -> assetManager -> getPublishedUrl($CKEditorExtPath) . '/');
		$script = "var CKEDITOR_BASEPATH = $CKEditorUrl;";
		return CHtml::script($script);
	}

}
