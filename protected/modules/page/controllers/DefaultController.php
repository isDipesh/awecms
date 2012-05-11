<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Page');
        $this->render('/index', array(
            'dataProvider' => $dataProvider,
        ));
    }

}
