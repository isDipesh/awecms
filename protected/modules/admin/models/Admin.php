<?php

class Admin {

    public static function getDashboardMenu() {

        //reading controllers using reflection and adding them to dashboard menu is another solution
        //maybe ignoring actions that require GET or POST like update(), delete(0, etc.
//        $specialModules = array('admin', 'user', 'gii');
        //get items from dashboard model
        $dashboard = new Dashboard;
        $menuItems = $dashboard->getMenuItems();

        //for settings
        foreach (Settings::getCategories() as $settingsCategory) {
            $menuItems['Settings'][] = array(Awecms::generateFriendlyName($settingsCategory). ' Settings', array('/admin/settings/' . $settingsCategory));
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
        $modules = array_filter($modules, 'Admin::isModule');
        return $modules;
    }

    /**
     * Used in getModules() to filter array of files & directories
     * 
     * @param mixed $a
     */
    private static function isModule($a) {
        return $a != '.' and $a != '..' and is_dir(Yii::app()->modulePath . DIRECTORY_SEPARATOR . $a);
    }

}

?>
