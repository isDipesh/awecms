<?php

class AdminController extends GxController {

public function actionIndex() {
$model = new Page('search');
$model->unsetAttributes();

if (isset($_GET['Page']))
$model->setAttributes($_GET['Page']);

$this->render('admin', array(
'model' => $model,
));
}

}
