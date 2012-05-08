<?php

class SettingsController extends Controller {

    public $defaultAction = 'site';

    public function actionSite() {

        $this->missingAction('site');
    }

    public function missingAction($actionID) {
        
        $this->layout = 'main';
        $dataProvider = array(
            'settings' => Settings::get($actionID),
        );
        $this->render('index', $dataProvider);
        return true;
    }

}