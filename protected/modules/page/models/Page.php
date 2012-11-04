<?php

Yii::import('application.modules.page.models._base.BasePage');

class Page extends BasePage {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public function getExcerpt() {
        return Awecms::summarize($this->content);
    }

    public static function findByType($type = 'Page') {
        return self::model()->findAllByAttributes(array('type' => $type));
    }

    public function getRecentPages($limit = 10) {
        $criteria = new CDbCriteria;
        $criteria->limit = $limit;
        $criteria->compare('type','Page');
        $criteria->order = 'id DESC';
        return $this->findAll($criteria);
    }

}