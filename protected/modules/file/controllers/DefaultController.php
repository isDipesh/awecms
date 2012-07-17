<?php

class DefaultController extends Controller {

    public function actions() {
        return array(
            'fileUploaderConnector' => "ext.elfinder.ElFinderConnectorAction",
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionUploader() {
        $this->layout = false;
        $this->render('index');
    }

}