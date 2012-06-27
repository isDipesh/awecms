<?php

Yii::import('application.modules.page.models._base.BasePage');

class Page extends BasePage {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public function getHierarchy() {
        $page = $this;
        $hierarchy = array();
        do {
            array_unshift($hierarchy, $page);
            $page = $page->parent;
        } while ($page);
        return $hierarchy;
    }

    public function getHierarchyLinks() {
        $links = array();
        foreach ($this->getHierarchy() as $page) {
            $links[$page->title] = Yii::app()->createUrl('page/page/view', array('id' => $page->id));
        }
        return $links;
    }

}