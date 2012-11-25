<?php

class ErrorController extends Controller {

    public function actionIndex() {
//        if ($path = Slug::getPath(Yii::app()->getRequest()->pathInfo))
//            $this->forward($path);
//        else {
//            if ($error = Yii::app()->errorHandler->error) {
//                if (Yii::app()->request->isAjaxRequest)
//                    echo $error['message'];
//                else {
//                    $this->pageTitle = 'Error';
//                    $this->render('/error', $error);
//                }
//            }
//        }

        $this->layout = null;

        $error = Yii::app()->errorHandler->error;

        if (Yii::app()->request->isAjaxRequest) {
            echo $error['message'];
            die();
        } else {
            $this->pageTitle = 'Error';
        }
        $this->render('index', $error);
    }

}

?>
