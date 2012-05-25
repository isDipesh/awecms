<?php

Yii::import('application.models._base.BaseZero');

class Zero extends BaseZero{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }
    
}