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

    public static function getMenuConfig() {
        $specialModules = array('admin', 'user', 'gii');
        $adminModule = Yii::app()->getModule('admin');

        //specify menu items here
        $menuItems['Users'] = array(
            array('Manage Users', array('/admin/user/')),
            array('Add User', array('/admin/user/create')),
            array('Manage Profile Fields', array('/admin/profileField/')),
            array('Add Profile Fields', array('/admin/profileField/create')),
        );

//        $menuItems['Settings'] = array(
//            array('Basic Site Settings', array('/admin/settings/')),
//            array('Server Settings', array('/admin/settings/server')),
//        );


        //for settings
        foreach (Settings::getCategories() as $settingsCategory) {
            $menuItems['Settings'][] = array(Awecms::generateFriendlyName($settingsCategory), array('/admin/settings/' . $settingsCategory));
        }

        //$menuItems['Settings'] = $a;

        //reading the menu items into an array
        $menuConfig = array();
        foreach ($menuItems as $menuName => $menuItem) {
            $menuConfig[$menuName] = '';
            foreach ($menuItem as $menuLink) {
                $menuConfig[$menuName].=CHtml::link(AdminModule::t($menuLink[0]), $menuLink[1]) . "<br/>";
            }
        }
        return $menuConfig;
    }

}
