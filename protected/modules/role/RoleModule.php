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
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }

    public static function getInPair($array) {
        $arrayPair = array();
        foreach ($array as $a) {
            $arrayPair[$a] = ucfirst($a);
        }
        return $arrayPair;
    }

    public static function getModulesInPair() {
        return self::getInPair(Yii::app()->metadata->getModules());
    }

    public static function getControllerId($path) {
        return lcfirst(str_replace('Controller', '', basename($path, '.php')));
    }

    public static function getControllers($module) {
        return array_map('self::getControllerId', Yii::app()->metadata->getControllers($module));
    }

    public static function getControllersInPair($module) {
        $controllers = array_map('self::getControllerId', Yii::app()->metadata->getControllers($module));
        $newControllers = array();
        foreach ($controllers as $controller) {
            if (Yii::app()->getModule($module) && strtolower(Yii::app()->getModule($module)->defaultController) == strtolower($controller)) {
                $default = ucfirst($controller) . ' (Default)';
                $newControllers = array_merge(array($controller => $default), $newControllers);
            } else {
                $newControllers[$controller] = ucfirst($controller);
            }
        }
        return $newControllers;
    }

}
