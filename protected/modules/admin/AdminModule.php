<?php

class AdminModule extends CWebModule {

    public $name = "Admin";

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'admin.models.*',
            'admin.components.*',
            'user.models.*',
            'user.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {

        if (!Yii::app()->getModule('user')->isAdmin()) {
            throw new CHttpException(403, 'Action is forbidden.');
        }

        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            $controller->layout = 'main';
            return true;
        }
        else
            return false;
    }

    public static function t($a) {
        return $a;
    }

}
