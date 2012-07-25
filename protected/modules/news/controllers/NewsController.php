<?php

class NewsController extends Controller {

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('News');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate() {
        $model = new News;
        $page = new Page;
        if (isset($_POST['News']) || isset($_POST['Page'])) {
            if (isset($_POST['News']))
                $model->setAttributes($_POST['News']);
            // validate BOTH news and page
            $valid = $page->validate();
            if ($valid) {
                $page->save(false);
                $model->page_id = $page->id;
                try {
                    if ($model->save())
                        $this->redirect(array('view', 'id' => $model->id));
                } catch (Exception $e) {
                    $model->addError('', $e->getMessage());
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
            'page' => $page
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $page = Page::model()->findByPk($model->page->id);
        if (isset($_POST['News'])) {
            $model->setAttributes($_POST['News']);
            if (isset($_POST['Page']))
                $model->setAttributes($_POST['Pag']);
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
                $model->addError('', $e->getMessage());
            }
        }
        $this->render('update', array(
            'model' => $model,
            'page' => $page,
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
                $this->redirect(array('admin'));
            }
        }
        else
            throw new CHttpException(400,
                    Yii::t('app', 'Invalid request.'));
    }

    public function actionAdmin() {
        $model = new News('search');
        $model->unsetAttributes();
        if (isset($_GET['News']))
            $model->setAttributes($_GET['News']);
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = News::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        return $model;
    }

}