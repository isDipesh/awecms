<?php

class PageController extends Controller
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
			$model=Page::model()->find('id = :id', array(
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
		$model = new Page;

				$this->performAjaxValidation($model, 'page-form');
    
		if(isset($_POST['Page'])) {
			$model->attributes = $_POST['Page'];

			if(isset($_POST['Page']['Zero']))
				$model->setRelationRecords('zeros', $_POST['Page']['Zero']);
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
		} elseif(isset($_GET['Page'])) {
				$model->attributes = $_GET['Page'];
		}

		$this->render('create',array( 'model'=>$model));
	}


	public function actionUpdate($id) {
		$model = $this->loadModel($id);

				$this->performAjaxValidation($model, 'page-form');
		
		if(isset($_POST['Page']))
		{
			$model->attributes = $_POST['Page'];

			if(isset($_POST['Page']['Zero']))
				$model->setRelationRecords('zeros', $_POST['Page']['Zero']);
else
$model->setRelationRecords('zeros',array());

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
		$dataProvider=new CActiveDataProvider('Page');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin() {
		$model=new Page('search');
		$model->unsetAttributes();

		if(isset($_GET['Page']))
			$model->attributes = $_GET['Page'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id) {
		$model=Page::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,Yii::t('app', 'The requested page does not exist.'));
		return $model;
	}

}
