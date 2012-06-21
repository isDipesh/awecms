<?php

Yii::import('application.modules.role.models._base.BaseAccess');

class Access extends BaseAccess {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public function getModulesList() {
        $modules = array_keys(Yii::app()->getModules());
        $modulesPair = array();
        foreach ($modules as $module) {
            $modulesPair[$module] = $module;
        }
        return $modulesPair;
    }

}