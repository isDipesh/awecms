<?php

class RoleModule extends CWebModule {

    public function init() {
// this method is called when the module is being created
// you may place code here to customize the module or the application
// import the module-level models and components
        $this->setImport(array(
            'role.models.*',
            'role.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {
// this method is called before any module controller action is performed
        if (!Yii::app()->getModule('user')->isAdmin()) {
            throw new CHttpException(403, 'Action is forbidden.');
        }
        return true;
    }

}
