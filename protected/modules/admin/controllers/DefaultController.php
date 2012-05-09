<?php

class DefaultController extends Controller {

    public function actionIndex() {

//        //if the user isn't logged in, redirect to login page
//        if (Yii::app()->user->isGuest) {
//            $this->redirect(array('/user/login'));
//            //should be redirected back here after the login
//        } elseif (!Yii::app()->getModule('user')->isAdmin()) {
//            //redirect non-admin users to profile(the only thing they can administrate)
//            $this->redirect(array('/user/profile'));
//        }
        
        //Yii::app()->clientScript->registerCssFile(Yii::app()->clientScript->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');
        Yii::app()->getClientScript()->registerCoreScript('jquery.ui');
        
        $this->render('index');
    }

}