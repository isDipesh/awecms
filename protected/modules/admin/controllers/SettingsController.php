<?php

class SettingsController extends Controller {

    public function actionIndex() {
        $dataProvider = array(
            'settings' => Settings::get('system'),
        );
        $this->render('index', $dataProvider);
    }

}