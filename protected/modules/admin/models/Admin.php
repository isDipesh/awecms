<?php

class Admin{
    
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
    private static 
            
            function isModule($a) {
        return $a != '.' and $a != '..' and is_dir(Yii::app()->modulePath . DIRECTORY_SEPARATOR . $a);
    }

    
}

?>
