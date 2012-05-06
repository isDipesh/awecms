<?php

class SettingsController extends Controller {

    public function actionIndex() {
        //print_r(Awecms::getSettingsTable());
        
        //print_r(Awecms::get('admin'));
        
        print_r(Awecms::get('admin'));
        
        //print_r (Awecms::get('system','key1'));
        
        
        die();
        
        //Yii::app()->settings->delete('admin', $itemName);
        $this->render('index');
    }

}