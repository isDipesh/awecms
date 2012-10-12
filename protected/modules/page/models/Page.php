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

    public function getPath() {
        if ($this->slug)
            return '/' . $this->slug->slug;
        $type = ($this->type);
        if ($type == 'Page')
            return '/' . lcfirst($type) . '/view?id=' . $this->id;
        $model = '';
        if (class_exists($type, false)) {
            $model = $type::model()->findByAttributes(array('page_id' => $this->id));
        }
        if ($model) {
            return '/' . lcfirst($type) . '/view?id=' . $model->id;
        }
//        echo class_exists('News');
//        die();
        return;
    }

}