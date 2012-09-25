<?php

class NewsController extends Controller {

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('News');
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
        $page->views++;
        $page->save();
        $this->render('view', array(
            'model' => $model,
        ));
    }

    public function actionCreate() {
        $model = new News;
        if (isset($_POST['News']) || isset($_POST['Page'])) {
            try {
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->id));
            } catch (Exception $e) {
                $model->addError('', $e->getMessage());
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        if (isset($_POST['News']) || isset($_POST['Page'])) {
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
                $this->redirect(array('/news'));
            }
        }
        else
            throw new CHttpException(400,
                    Yii::t('app', 'Invalid request.'));
    }

    public function actionManage() {
        $model = new News('search');
        $model->unsetAttributes();
        if (isset($_GET['News']))
            $model->setAttributes($_GET['News']);
        $this->render('manage', array(
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