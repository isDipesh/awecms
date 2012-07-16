<?php

class AweErrorHandler extends CErrorHandler {

    public $errorAction;
    public $exception;

    public function __construct() {
        //NOP
    }

    public function init() {
        //NOP
    }

    public function parsePath($path) {
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

            //TODO parse ids and internal slugs
            //http://cms/category/1 to http://cms/category/view?id=1

            $newSegments[$c] = $segment;
        }

        $path = '/' . implode('/', $newSegments);

//        if ($p = Slug::getPath($path)) {
//            $path = $p;
//            Yii::app()->punish = 0;
//        }

        $errorController = new Controller('error');
        $urlComponents = parse_url($path);
        if (isset($urlComponents['query'])) {
            parse_str($urlComponents['query'], $output);
            $_GET = $output;

            $urlParts = explode('?', $path);
            $path = $urlParts[0];
        }
        $errorController->forward($path);
    }

    public function handle($exception) {
        //only parse path for 404 errors
        $handle = false;
        if (isset($exception->exception)) {
            if (isset($exception->exception->statusCode)) {
                if ($exception->exception->statusCode == '404') {
                    $handle = true;
                }
            }
        }

        if ($handle) {
            $path = Yii::app()->getRequest()->pathInfo;
            $this->parsePath($path);
        } else {
            parent::handle($exception);
        }
    }

    public function showError($e) {
        parent::handleException($e);
        die();
    }

}