<?php

Yii::import('application.modules.gallery.models._base.BaseAlbum');

class Album extends BaseAlbum{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }
}