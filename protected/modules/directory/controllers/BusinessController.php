<?php

class BusinessController extends Controller {

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'view', 'create'),
                'users' => array('*'),
            ),
            //only logged in users can update
            array('allow',
                'actions' => array('update'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('manage', 'delete'),
                'users' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public $imageUploadFolder = '/../uploads/directory/';

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Business');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionView($id) {
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
        $model = new Business;
        if (isset($_POST['Business']) || isset($_POST['Page'])) {
            $model->setAttributes($_POST['Business']);
            if ($image = CUploadedFile::getInstance($model, 'image')) {
                $model->image = time() . $image;
            }

            if (isset($_POST['Business']['page']))
                $model->page = $_POST['Business']['page'];
            if (isset($_POST['Business']['place']))
                $model->place = $_POST['Business']['place'];
            if (isset($_POST['Business']['district']))
                $model->district = $_POST['Business']['district'];
            if (isset($_POST['Business']['businessCategories']))
                $model->businessCategories = $_POST['Business']['businessCategories'];

            try {
                if ($model->save()) {
                    if ($image) {
                        $dir = Yii::app()->basePath . $this->imageUploadFolder;
                        if (!is_dir($dir)) {
                            mkdir($dir, 0777, true);
                            chmod($dir, 0777);
                        }
                        $image->saveAs($dir . $model->image);
                    }
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('', $e->getMessage());
            }
        } elseif (isset($_GET['Business'])) {
            $model->attributes = $_GET['Business'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        if ($model->page->user_id != Yii::app()->user->id)
            throw new AweException(403);
        if (isset($_POST['Business']) || isset($_POST['Page'])) {
            $model->setAttributes($_POST['Business']);
            if ($image = CUploadedFile::getInstance($model, 'image')) {
                $model->image = time() . $image;
            }

            if (isset($_POST['Business']['page']))
                $model->page = $_POST['Business']['page'];
            else
                $model->page = array();
            if (isset($_POST['Business']['place']))
                $model->place = $_POST['Business']['place'];
            else
                $model->place = array();
            if (isset($_POST['Business']['district']))
                $model->district = $_POST['Business']['district'];
            else
                $model->district = array();
            if (isset($_POST['Business']['businessCategories']))
                $model->businessCategories = $_POST['Business']['businessCategories'];
            else
                $model->businessCategories = array();
            try {
                if ($model->save()) {
                    if ($image) {
                        $dir = Yii::app()->basePath . $this->imageUploadFolder;
                        if (!is_dir($dir)) {
                            mkdir($dir, 0777, true);
                            chmod($dir, 0777);
                        }
                        $image->saveAs($dir . $model->image);
                    }
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('', $e->getMessage());
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
                $this->redirect(array('index'));
            }
        }
        else
            throw new CHttpException(400,
                    Yii::t('app', 'Invalid request.'));
    }

    public function actionManage() {
        $model = new Business('search');
        $model->unsetAttributes();

        if (isset($_GET['Business']))
            $model->setAttributes($_GET['Business']);

        $this->render('manage', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Business::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        return $model;
    }

}