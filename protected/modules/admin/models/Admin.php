<?php

class Admin {

    public static function getSettings($action = '') {
        //url isn't created for $action
        $settings = array();
        foreach (Settings::getCategories() as $settingsCategory) {
            $item = array();
            $item['label'] = Awecms::generateFriendlyName($settingsCategory) . ' Settings';
            if ($action != $settingsCategory)
                $item['url'] = Yii::app()->createUrl('/settings/' . $settingsCategory);
            $settings[] = $item;
        }
        return $settings;
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

    public static function getModules() {
        $modules = scandir(Yii::app()->modulePath);
        // $modules=array_filter($modules,function($a) {return true;});
        $modules = array_filter($modules, 'self::isModule');
        return $modules;
    }

    public static function getLinkForModules() {
        //modules to ignore
        $ignoreToList = array('admin');
        $ignoreToLink = array('mail', 'eauth');
        $r = array();
        foreach (self::getModules() as $module) {
            $item = array();
            if (in_array($module, $ignoreToList))
                continue;
            $item['label'] = Awecms::generateFriendlyName($module);
            if (!in_array($module, $ignoreToLink))
                $item['url'] = '/admin/' . $module;
            $r[] = $item;
        }
        return $r;
    }

    /**
     * Used in getModules() to filter array of files & directories
     * @param mixed $a
     */
    private static function isModule($a) {
        return $a != '.' and $a != '..' and is_dir(Yii::app()->modulePath . DIRECTORY_SEPARATOR . $a);
    }

}

?>
