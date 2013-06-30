<?php

class EventController extends Controller {

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('minicreate', 'create', 'update', 'manage', 'delete', 'toggle'),
                'users' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Event');
        $baseUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.event.assets'));
        Yii::app()->getClientScript()->registerCssFile($baseUrl . '/events.css');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionView($id) {
        $baseUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.event.assets'));
        Yii::app()->getClientScript()->registerCssFile($baseUrl . '/events.css');
        $model = $this->loadModel($id);
        $page = $model->page;
        //set page title
        Yii::app()->getController()->pageTitle = $page->title . Awecms::getTitlePrefix();
        //increase view count
        $model->increaseViewCount();
        $this->render('view', array(
            'model' => $model,
        ));
    }

    public function actionCreate() {
        $model = new Event;
        if (isset($_POST['Event'])) {
            $model->setAttributes($_POST['Event']);

            if (isset($_POST['Event']['page']))
                $model->page = $_POST['Event']['page'];

            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('page->title', $e->getMessage());
            }
        } elseif (isset($_GET['Event'])) {
            $model->attributes = $_GET['Event'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['Event'])) {
            $model->setAttributes($_POST['Event']);
            if (isset($_POST['Event']['page']))
                $model->page = $_POST['Event']['page'];
            else
                $model->page = array();
            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('page->title', $e->getMessage());
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            try {
                $this->loadModel($id)->delete();
            } catch (Exception $e) {
                throw new CHttpException(500, $e->getMessage());
            }

            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                $this->redirect(array('/event'));
            }
        }
        else
            throw new CHttpException(400,
                    Yii::t('app', 'Invalid request.'));
    }

    public function actionManage() {
        $model = new Event('search');
        $model->unsetAttributes();

        if (isset($_GET['Event']))
            $model->setAttributes($_GET['Event']);

        $this->render('manage', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Event::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        return $model;
    }

}