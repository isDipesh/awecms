<?php

class MenuModule extends CWebModule {

    public $defaultController = "list";
    public $assetsDirectory;

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'menu.models.*',
            'menu.components.*',
        ));
        $this->assetsDirectory = Yii::app()->assetManager->publish(dirname(__FILE__) . '/assets');
        Yii::setPathOfAlias('mext', dirname(__FILE__) . '/extensions');
        Yii::app()->clientScript->registerCssFile($this->assetsDirectory . '/css/menu/menustyle.css');
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            if (!Yii::app()->getModule('user')->isAdmin()) {
                throw new CHttpException(403, 'Action is forbidden.');
            }
            return true;
        }
        else
            return false;
    }

    public static function t($str = '', $params = array(), $dic = 'menu') {
        return Yii::t("MenuModule." . $dic, $str, $params);
    }

}
