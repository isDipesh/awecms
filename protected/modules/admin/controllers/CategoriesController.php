<?php

Yii::import('application.modules.category.controllers.*');
Yii::import('application.modules.category.models.*');

class CategoriesController extends CategoryController {
    
    public $defaultAction = 'admin';

    public function getViewFile($viewName) {
        $parentController = Awecms::getControllerIdFromClassName(get_parent_class());
        return Yii::app()->getModule($parentController)->getViewPath() . '/' . $parentController . '/' . $viewName . '.php';
    }

}