<?php

class SettingsController extends Controller {

    public $defaultAction = 'site';

    public function actionSite() {

        $dataProvider = array(
            'settings' => Settings::get('site'),
        );
        $this->render('index', $dataProvider);
    }

    public function beforeAction($action) {
        //Yii::app()->catchAllRequest = "hey" ;

        return true;
    }

}