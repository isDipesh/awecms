<?php

class AdminModule extends CWebModule {

    public $name = "Admin";
    public $menuItems = array();

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
        // this method is called before any module controller action is performed
        if (!Yii::app()->getModule('user')->isAdmin()) {
            throw new CHttpException(403, 'Action is forbidden.');
        }
        $controller->layout = 'main';
        return true;
    }

    public static function t($a) {
        return $a;
    }

    public function getMainMenu() {
        $menuItems = array();
        $menuItems = CMap::mergeArray($menuItems, $this->menuItems);
        foreach (array_keys($this->getModules()) as $name) {
            $module = $this->getModule($name);
            if (!isset($module->menuItems)) {
                continue;
            }
            $menuItems = CMap::mergeArray($menuItems, $module->menuItems);
        }
        return $menuItems;
    }

}