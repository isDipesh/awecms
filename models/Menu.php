<?php

Yii::import('application.modules.menu.models._base.BaseMenu');

class Menu extends BaseMenu{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }
}