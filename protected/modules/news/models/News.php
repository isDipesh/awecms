<?php

Yii::import('application.modules.news.models._base.BaseNews');

class News extends BaseNews{
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }
}