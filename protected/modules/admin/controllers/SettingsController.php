<?php

class SettingsController extends Controller {

    public $defaultAction = 'site';

    public function actionSite() {
        $this->showSettings('site');
    }
    
    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('site'),
                'users' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
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
            Settings::set($actionID, Awecms::removeMetaFromPost($_POST));
            $selections = Awecms::getSelections($_POST);
            if (count($selections))
                Settings::delete($actionID, $selections);
        }
        $this->layout = 'main';
        $dataProvider = array(
            'settings' => Settings::get($actionID),
            'action' => $actionID,
        );
        $this->render('index', $dataProvider);
    }

    public function actionAdd() {
        $action = 'site';
        if (count($_GET)) {
            foreach ($_GET as $key => $param) {
                $action = $key;
                break;
            }
        }

        if (!empty($_POST)) {
            $category = ($_POST['category'] == 'add_new') ? $_POST['category_value'] : $_POST['category'];
            Settings::set($category, $_POST['key'], $_POST['value'], $_POST['hint'], $_POST['type']);
            $this->redirect(array('/admin/settings/' . $category));
        }
        $dataProvider = array(
            'action' => $action,
        );
        Yii::app()->clientScript->registerCoreScript('jquery');
        $this->render('add', $dataProvider);
    }

}