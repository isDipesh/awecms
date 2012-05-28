<?php

class MenuModule extends CWebModule
{
public $defaultController = "list";	
public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'menu.models.*',
			'menu.components.*',
		));
		Yii::setPathOfAlias('mext',dirname(__FILE__).'/extensions');
		Yii::app()->clientScript->registerCssFile('/css/menu/menustyle.css');
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
	
	public static function t($str='',$params=array(),$dic='menu') {
		return Yii::t("MenuModule.".$dic, $str, $params);
	}
}
