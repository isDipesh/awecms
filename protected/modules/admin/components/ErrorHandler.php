<?php

class ErrorHandler extends CController {

    public $errorAction;

    public function __construct() {
        //NOP
    }

    public function init() {
        //NOP
    }

    public function handle() {
        //cut off the admin part from requested path and forward to it
        $route = preg_replace('{admin/}', '/', Yii::app()->getRequest()->pathInfo, 1);
//        print_r($route);
//        die();
        $this->forward($route);
    }

}