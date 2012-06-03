<?php

Yii::import('application.modules.menu.controllers.*');
Yii::import('application.modules.menu.models.*');

class MenusController extends MenuController {

    public function getViewFile($viewName) {
        return Yii::app()->getModule('menu')->getViewPath() . '/' . 'menu' . '/' . $viewName . '.php';
    }

}