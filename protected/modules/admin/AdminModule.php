<?php

class AdminModule extends CWebModule {

    public $menuItems = array();
    public $defaultController = 'admin';

    public function init() {
        $this->setImport(array(
            'admin.models.*',
            'admin.components.*',
        ));

        Yii::app()->setComponents(array(
            'errorHandler' => array(
                'errorAction' => 'admin/admin/handleRequests',
            ),
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if (!Yii::app()->getModule('user')->isAdmin()) {
            $controller->redirect('/login');
        }
        $controller->layout = 'main';
        return true;
    }

    public static function t($str = '', $params = array(), $dic = 'menu') {
        return Yii::t("AdminModule." . $dic, $str, $params);
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