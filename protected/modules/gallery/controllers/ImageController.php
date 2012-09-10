<?php

class ImageController extends Controller {

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Image');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['Image'])) {
            $model->setAttributes($_POST['Image']);
            if (isset($_POST['Image']['album']))
                $model->album = $_POST['Image']['album'];
            else
                $model->album = array();
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
        ));
    }

    public function actionDelete($id) {
        $model = $this->loadModel($id);
        if (Yii::app()->request->isPostRequest) {
            try {
                $model->delete();
            } catch (Exception $e) {
                throw new CHttpException(500, $e->getMessage());
            }

            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                $this->redirect(array('/gallery/album/view', 'id' => $model->album->id));
            }
        }
        else
            throw new CHttpException(400,
                    Yii::t('app', 'Invalid request.'));
    }

    public function actionAdmin() {
        $model = new Image('search');
        $model->unsetAttributes();

        if (isset($_GET['Image']))
            $model->setAttributes($_GET['Image']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Image::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        return $model;
    }

}