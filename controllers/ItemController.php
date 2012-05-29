<?php

class ItemController extends Controller {

    public function actionIndex($id) {
        $model = MenuItem::model()->findAllByAttributes(array('menu_id' => $id));
        $this->render('index', array(
            'model' => $model,
            'id' => $id
        ));
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'MenuItem'),
        ));
    }

    public function actionCreate() {
        $model = new MenuItem;
        if (isset($_POST['MenuItem'])) {
            $model->setAttributes($_POST['MenuItem']);

            if (isset($_POST['MenuItem']['menu']))
            $model->menu = $_POST['MenuItem']['menu'];
            if (isset($_POST['MenuItem']['parent']))
                $model->parent = $_POST['MenuItem']['parent'];

            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('/'.$this->module->id.'/item/'.$model->menu_id));
                        //$this->redirect(array('view', 'id' => $model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('', $e->getMessage());
            }
        } elseif (isset($_GET['MenuItem'])) {
            $model->attributes = $_GET['MenuItem'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['MenuItem'])) {
            $model->setAttributes($_POST['MenuItem']);
            $model->menu = $_POST['MenuItem']['menu'];
            $model->parent = $_POST['MenuItem']['parent'];
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
                    Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
    }

    public function actionAdmin() {
        $model = new MenuItem('search');
        $model->unsetAttributes();

        if (isset($_GET['MenuItem']))
            $model->setAttributes($_GET['MenuItem']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = MenuItem::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        return $model;
    }

    public function beforeAction($action) {
        if ($this->module !== null) {
            $this->breadcrumbs[$this->module->Id] = array('/' . $this->module->Id);
        }
        return true;
    }

}

//End of Controller Class
