<?php

class AdminModule extends CWebModule {

    public $menuItems = array();
    public $defaultController = 'AweAdmin';

    public function init() {
        $this->setImport(array(
            'admin.models.*',
            'admin.components.*',
        ));
        if (!Yii::app()->getModule('user')->isAdmin()) {
            if (Yii::app()->user->isGuest) {
                Yii::app()->user->returnUrl = Yii::app()->baseUrl . '/admin';
                Yii::app()->request->redirect(Yii::app()->baseUrl . '/login');
            }
//            Yii::app()->getController()->layout='haha';
            throw new AweException(404);
            
        }
    }

//    public function beforeControllerAction($controller, $action) {
////        $controller->layout = 'main';
//        return true;
//    }

    public static function t($str = '', $params = array()) {
        return Yii::t('app', $str, $params);
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

    public static function getDashboardMenu() {
        $dashboard = new Dashboard;
        $menuItems = $dashboard->getMenuItems();
        //for settings
        foreach (Settings::getCategories() as $settingsCategory) {
            $menuItems['Settings'][] = array(Awecms::generateFriendlyName($settingsCategory) . ' Settings', array('/admin/settings/' . $settingsCategory));
        }
        //reading the menu items into an array that zii.widgets.jui.CJuiAccordion can take as panels
        $menuConfig = array();
        foreach ($menuItems as $menuName => $menuItem) {
            $menuConfig[$menuName] = '';
            foreach ($menuItem as $menuLink) {
                $menuConfig[$menuName].=CHtml::link(AdminModule::t($menuLink[0]), $menuLink[1]) . "<br/>";
            }
        }
        return $menuConfig;
    }

    public static function getLinkForModules() {
        //modules to ignore
        $ignoreToList = array('admin');
        $ignoreToLink = array('mail', 'eauth');
        $r = array();
        foreach (Yii::app()->metadata->getModules() as $module) {
            $item = array();
            if (in_array($module, $ignoreToList))
                continue;
            $item['label'] = Awecms::generateFriendlyName($module);
            if (!in_array($module, $ignoreToLink))
                $item['url'] = '/' . $module;
            $r[] = $item;
        }
        return $r;
    }

}