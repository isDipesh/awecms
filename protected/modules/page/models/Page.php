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
        $stripped = strip_tags($this->content);
        $str = substr($stripped, 0, 500);
        if (strlen($stripped) > 525)
            $str .= "...";
        else
            $str .= substr($stripped, 500);
        return $str;
    }

    public static function findByType($type = 'Page') {
        return self::model()->findAllByAttributes(array('type' => $type));
    }

    public function getPath() {
        if ($this->slug)
            return '/' . $this->slug->slug;
        $type = ($this->type);
        if ($type=='Page') return '/' . lcfirst($type) . '/view?id=' . $this->id;
        $model = $type::model()->findByAttributes(array('page_id' => $this->id));
        if ($model) {
            return '/' . lcfirst($type) . '/view?id=' . $model->id;
        }
        return;
    }

}