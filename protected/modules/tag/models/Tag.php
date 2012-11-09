<?php

Yii::import('application.modules.tag.models._base.BaseTag');

class Tag extends BaseTag {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public function getLink() {
        if (!in_array($this->name, array('tag', 'index', 'json', 'view', 'delete')))
            return '/tag/' . $this->name;
        else
            return '/tag/tag/view/id/' . $this->id;
    }

}