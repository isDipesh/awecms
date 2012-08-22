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

    public function getHierarchy() {
        $page = $this;
        $hierarchy = array();
        //we record pages parsed already so that we don't go through them to lock ourselves inside infinite loop
        $parsed = array();
        do {
            if (in_array($page->id, $parsed))
                break;
            $parsed[] = $page->id;
            array_unshift($hierarchy, $page);
            $page = $page->parent;
        } while ($page);
        return $hierarchy;
    }

    public function getHierarchyLinks() {
        $links = array();
        foreach ($this->getHierarchy() as $page) {
            if ($page === $this)
                $links[] = $page->title;
            else
                $links[$page->title] = Yii::app()->createUrl('page/page/view', array('id' => $page->id));
        }
        return $links;
    }

    public static function findByType($type = 'Page') {
        return self::model()->findAllByAttributes(array('type' => $type));
    }

    public function getPath() {
        if ($this->slug)
            return '/' . $this->slug->slug;
        $type = ($this->type);
        $model = $type::model()->findByAttributes(array('page_id'=>$this->id));
        if ($model){
            return '/' . lcfirst($type) . '/view?id=' . $model->id;
        }
        return ;
    }

}