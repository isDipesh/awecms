<?php

class CategoriesController extends Controller {

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
        $allCategories = BusinessCategory::model()->findAll();
        $this->render('index', array(
            'allCategories' => $allCategories,
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
        $model = new BusinessCategory;
        if (isset($_POST['BusinessCategory']) || isset($_POST['Page'])) {
            try {
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->id));
            } catch (Exception $e) {
                $model->addError('', $e->getMessage());
            }
        } elseif (isset($_GET['BusinessCategory'])) {
            $model->attributes = $_GET['BusinessCategory'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['BusinessCategory']) || isset($_POST['Page'])) {
            try {
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->id));
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
        $model = new BusinessCategory('search');
        $model->unsetAttributes();

        if (isset($_GET['BusinessCategory']))
            $model->setAttributes($_GET['BusinessCategory']);

        $this->render('manage', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = BusinessCategory::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        return $model;
    }

}