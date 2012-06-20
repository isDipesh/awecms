<?php

class MenuModule extends CWebModule {

    public $defaultController = "menu";
    public $assetsDirectory;

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'menu.models.*',
            'menu.components.*',
        ));
        $this->assetsDirectory = Yii::app()->assetManager->publish(dirname(__FILE__) . '/assets/backend');
        Yii::setPathOfAlias('mext', dirname(__FILE__) . '/extensions');
        Yii::app()->clientScript->registerCssFile($this->assetsDirectory . '/menustyle.css');
    }

    public static function t($str = '', $params = array(), $dic = 'menu') {
        return Yii::t("MenuModule." . $dic, $str, $params);
    }

}
