<?php

class UpdateController extends GxController {

	public function actionIndex($id) {
		$model = $this->loadModel($id, 'Page');

		$this->performAjaxValidation($model, 'page-form');

		if (isset($_POST['Page'])) {
			$model->setAttributes($_POST['Page']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

}
