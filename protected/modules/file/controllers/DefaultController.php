<?php

class DefaultController extends Controller {

    public function actions() {
        return array(
            'fileUploaderConnector' => "ext.ezzeelfinder.ElFinderConnectorAction",
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

}