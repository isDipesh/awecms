<?php

class SlugController extends Controller {

    public $breadcrumbs = array();

    function __construct() {
        //construct the controller with id 'slug'
        parent::__construct('slug');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('/error', $error);
        }
    }

}