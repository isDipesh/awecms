<?php

class AweErrorHandler extends CController {

    public $errorAction;

    public function __construct() {
        //NOP
    }

    public function init() {
        //NOP
    }

    public function handle() {

        $path = Yii::app()->getRequest()->pathInfo;

        //cut off the admin part from requested path
        $path = preg_replace('{admin/}', '/', $path, 1);

        $parts = explode('/', $path);

        //removing the empty item left by cutting off 'admin'
        if ($parts[0] == '') {
            array_shift($parts);
        }

        //adding default controller
        foreach ($parts as $c => $part) {

            //do not add before the first part, which is either a module or controller
            if ($c == 0)
                continue;

            //if current part is a controller, donot add defaultController before it
            if (isset($parts[$c - 1]) && Yii::app()->hasModule($parts[$c - 1]) && in_array($parts[$c], array_map('Awecms::getControllerId', glob(Yii::app()->getModule($parts[$c - 1])->controllerPath . '/*.php'))))
                continue;

            //if the previous part is a controller, continue
            if (isset($parts[$c - 2]) && Yii::app()->hasModule($parts[$c - 2]) && in_array($parts[$c - 1], array_map('Awecms::getControllerId', glob(Yii::app()->getModule($parts[$c - 2])->controllerPath . '/*.php'))))
                continue;

            if (Yii::app()->hasModule($parts[$c - 1])) {
                $parts[$c + 1] = $part;
                $parts[$c] = Yii::app()->getModule($parts[$c - 1])->defaultController;
            }
        }

        $path = '/' . implode('/', $parts);
//      print_r($path);
        $this->forward($path);
    }

}