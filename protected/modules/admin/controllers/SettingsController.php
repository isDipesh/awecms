<?php

class SettingsController extends Controller {

    public $defaultAction = 'site';

    public function actionSite() {
        $this->showSettings('site');
    }

    public function missingAction($actionID) {
        $categories = Settings::getCategories();
        if (in_array($actionID, $categories))
            $this->showSettings($actionID);
        else
            throw new CHttpException(404, 'No such category exists for settings!');
    }

    public function showSettings($actionID) {
        if (!empty($_POST)) {
            Awecms::getSelections($_POST);
            Settings::set($actionID, Awecms::removeMetaFromPost($_POST));
        }
        $this->layout = 'main';
        $dataProvider = array(
            'settings' => Settings::get($actionID),
        );
        $this->render('index', $dataProvider);
        return true;
    }

}