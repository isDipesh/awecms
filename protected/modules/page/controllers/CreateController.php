<?php

class CreateController extends GxController {

    public function actionIndex() {
        $model = new Page;

        $this->performAjaxValidation($model, 'page-form');

        if (isset($_POST['Page'])) {
            $model->setAttributes($_POST['Page']);

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('/create', array('model' => $model));
    }

}
