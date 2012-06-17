<?php

class AweUrlManager extends CUrlManager {

    public function createUrl($route, $params = array(), $ampersand = '&') {
        //for admin and admin/*
        $parts = explode('/', $route);
        if (Yii::app()->hasModule($parts[0]) && isset($parts[1]) && $parts[1] == 'default') {
            unset($parts[1]);
            return implode('/', $parts);
        }
        if (substr(Yii::app()->getRequest()->pathInfo, 0, 6) == 'admin/' || Yii::app()->getRequest()->pathInfo == 'admin') {
            return '/admin' . parent::createUrl($route, $params, $ampersand);
        }
        return parent::createUrl($route, $params, $ampersand);
    }

    public function parseUrl($request) {
        return parent::parseUrl($request);
    }

}