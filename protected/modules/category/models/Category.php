<?php

Yii::import('application.modules.category.models._base.BaseCategory');

class Category extends BaseCategory{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }
}