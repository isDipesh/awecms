<?php

Yii::import('application.modules.page.controllers.*');
Yii::import('application.modules.page.models.*');

class PagesController extends Controller{

    public function init() {
    }

    public function getViewFile($viewName) {
        $parentController = Awecms::getControllerIdFromClassName(get_parent_class());
        return Yii::app()->getModule($parentController)->getViewPath() . '/' . $parentController . '/' . $viewName . '.php';
    }

}