<?php

class SettingsController extends Controller {

    public function actionIndex() {
        $this->render('index', Awecms::get('site'));
    }

}