<?php

class Admin {

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

    /**
     * Used in getModules() to filter array of files & directories
     * @param mixed $a
     */
}

?>
