<?php

class AweErrorHandler extends CErrorHandler {

    public $errorAction;

    public function __construct() {
        //NOP
    }

    public function init() {
        //NOP
    }

    public function handle($exception) {

        $path = Yii::app()->getRequest()->pathInfo;

        //cut off the admin part from requested path
        if (substr($path, 0, 6) == 'admin/')
            $path = preg_replace('`admin/`', '/', $path, 1);

        $segments = explode('/', $path);

        //removing the empty item left by cutting off 'admin'
        if ($segments[0] == '') {
            array_shift($segments);
        }

        $newSegments = array();

        //this will count segments for us
        $c = -1;

        //adding default controller
        foreach ($segments as $key => $segment) {

            $c++;
            //do not add before the first part, which is either a module or controller
            if ($c == 0) {
                $newSegments[$c] = $segment;
                continue;
            }

            //if current part is a controller, do not add defaultController before it
            if (isset($segments[$c - 1]) && Yii::app()->hasModule($segments[$key - 1]) && in_array($segments[$key], array_map('Awecms::getControllerId', glob(Yii::app()->getModule($segments[$key - 1])->controllerPath . '/*.php')))) {
                $newSegments[$c] = $segment;
                continue;
            }

            //if the previous part is a controller, continue
            if (isset($segments[$key - 2]) && Yii::app()->hasModule($segments[$key - 2]) && in_array($segments[$key - 1], array_map('Awecms::getControllerId', glob(Yii::app()->getModule($segments[$key - 2])->controllerPath . '/*.php')))) {
                $newSegments[$c] = $segment;
                continue;
            }

            if (Yii::app()->hasModule($segments[$key - 1])) {
                $newSegments[$c] = Yii::app()->getModule($segments[$key - 1])->defaultController;
                $newSegments[$c + 1] = $segment;
                $c++;
                continue;
            }
            $newSegments[$c] = $segment;
        }

        $path = '/' . implode('/', $newSegments);
        $errorController = new Controller('error');
        $errorController->forward($path);
    }
    
    public function showError($e){
        parent::handleException($e);
        //print_r($e);
        die();
    }

}