<?php

class SlugController extends GxController {


	public function actionCreate() {
		$model = new Slug;


		if (isset($_POST['Slug'])) {
			$model->setAttributes($_POST['Slug']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('.'));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Slug');


		if (isset($_POST['Slug'])) {
			$model->setAttributes($_POST['Slug']);

			if ($model->save()) {
				$this->redirect(array('.'));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Slug')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new Slug('search');
		$model->unsetAttributes();

		if (isset($_GET['Slug']))
			$model->setAttributes($_GET['Slug']);

		$this->render('index', array(
			'model' => $model,
		));
	}

}