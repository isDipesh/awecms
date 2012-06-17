<?php

Yii::import('application.modules.role.models._base.BaseRole');

class Role extends BaseRole{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }
}