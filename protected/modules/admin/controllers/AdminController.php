<?php

class AdminController extends Controller {

    public function actionIndex() {
        $this->render('/index');
    }

    public function actionHandleRequests() {
        //cut off the admin part from requested path and forward to it
        $this->forward(str_replace('admin/', '/', Yii::app()->getRequest()->pathInfo));
    }

}