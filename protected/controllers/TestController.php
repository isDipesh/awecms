<?php

class TestController extends Controller
{
	public function filters() {
		return array(
			'accessControl', 
		);
	}	

	public function accessRules() {
		return array(
			array('allow',  
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', 
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', 
				'actions'=>array('*'),
				'users'=>array('admin'),
			),
			array('deny',  
				'users'=>array('*'),
			),
		);
	}
	
	public function beforeAction($action) {
		parent::beforeAction($action);
		// map identifcationColumn to id
		if (!isset($_GET['id']) && isset($_GET['id'])) {
			$model=Test::model()->find('id = :id', array(
			':id' => $_GET['id']));
			if ($model !== null) {
				$_GET['id'] = $model->id;
			} else {
				throw new CHttpException(400);
			}
		}
		if ($this->module !== null) {
			$this->breadcrumbs[$this->module->Id] = array('/'.$this->module->Id);
		}
		return true;
	}
	
	public function actionView($id)	{
		$model = $this->loadModel($id);
		$this->render('view',array(
			'model' => $model,
		));
	}

	public function actionCreate() {
		$model = new Test;

				$this->performAjaxValidation($model, 'test-form');
    
		if(isset($_POST['Test'])) {
			$model->attributes = $_POST['Test'];

			try {
    			if($model->save()) {
					if (isset($_GET['returnUrl'])) {
						$this->redirect($_GET['returnUrl']);
					} else {
						$this->redirect(array('view','id'=>$model->id));
					}
				}
			} catch (Exception $e) {
				$model->addError('id', $e->getMessage());
			}
		} elseif(isset($_GET['Test'])) {
				$model->attributes = $_GET['Test'];
		}

		$this->render('create',array( 'model'=>$model));
	}


	public function actionUpdate($id) {
		$model = $this->loadModel($id);

				$this->performAjaxValidation($model, 'test-form');
		
		if(isset($_POST['Test']))
		{
			$model->attributes = $_POST['Test'];


			try {
    			if($model->save()) {
					if (isset($_GET['returnUrl'])) {
						$this->redirect($_GET['returnUrl']);
					} else {
						$this->redirect(array('view','id'=>$model->id));
					}
        		}
			} catch (Exception $e) {
				$model->addError('id', $e->getMessage());
			}	
		}

		$this->render('update',array(
					'model'=>$model,
					));
	}

	public function actionDelete($id) {
		if(Yii::app()->request->isPostRequest)
		{
			try {
				$this->loadModel($id)->delete();
			} catch (Exception $e) {
				throw new CHttpException(500,$e->getMessage());
			}

			if(!isset($_GET['ajax']))
			{
					$this->redirect(array('admin'));
			}
		}
		else
			throw new CHttpException(400,
					Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
	}

	public function actionIndex() {
		$dataProvider=new CActiveDataProvider('Test');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin() {
		$model=new Test('search');
		$model->unsetAttributes();

		if(isset($_GET['Test']))
			$model->attributes = $_GET['Test'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id) {
		$model=Test::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,Yii::t('app', 'The requested page does not exist.'));
		return $model;
	}

}
