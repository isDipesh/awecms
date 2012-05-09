<?php

class DashboardController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Dashboard'),
		));
	}

	public function actionCreate() {
		$model = new Dashboard;

		$this->performAjaxValidation($model, 'dashboard-form');

		if (isset($_POST['Dashboard'])) {
			$model->setAttributes($_POST['Dashboard']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Dashboard');

		$this->performAjaxValidation($model, 'dashboard-form');

		if (isset($_POST['Dashboard'])) {
			$model->setAttributes($_POST['Dashboard']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Dashboard')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Dashboard');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Dashboard('search');
		$model->unsetAttributes();

		if (isset($_GET['Dashboard']))
			$model->setAttributes($_GET['Dashboard']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}