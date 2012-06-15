<?php

Yii::import('system.web.CUrlManager', true);

class AweUrlManager extends CUrlManager {

    public $connectionID = 'db';

    public function createUrl($route, $params = array(), $ampersand = '&') {
        //return false;
        if (substr(Yii::app()->getRequest()->pathInfo, 0, 6) == 'admin/') {
            return '/admin' . parent::createUrl($route, $params, $ampersand);
        }
        if ($route === 'car/index') {
            if (isset($params['manufacturer'], $params['model']))
                return $params['manufacturer'] . '/' . $params['model'];
            else if (isset($params['manufacturer']))
                return $params['manufacturer'];
        }
        $this->rules['login/*'] = 'resellersite/customerLogin';
        return $route;  // this rule does not apply
    }

    public function parseUrl($request) {
//        if (substr($request->pathInfo, 0, 6) == 'admin/') {
//            $finalRoute = str_replace('admin/', '', $request->pathInfo);
//            return $finalRoute;
//        }
        return $request->pathInfo;  // this rule does not apply
    }

}