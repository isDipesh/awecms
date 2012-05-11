<?php

class DefaultController extends GxController {

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Page');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

}
