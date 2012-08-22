<?php

class AccessController extends Controller {

    public function actionCreate() {
        $assetsUrl = Yii::app()->getAssetManager()->publish(dirname(__FILE__) . '/../assets/');
        Yii::app()->getClientScript()->registerScriptFile($assetsUrl . '/accessForm.js?' . time());
        $model = new Access;
        if (isset($_POST['Access'])) {
            $model->setAttributes($_POST['Access']);

            if (isset($_POST['Access']['roles']))
                $model->roles = $_POST['Access']['roles'];

            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('/role/access'));
                    }
                }
            } catch (Exception $e) {
                $model->addError('', $e->getMessage());
            }
        } elseif (isset($_GET['Access'])) {
            $model->attributes = $_GET['Access'];
        }
        $model->module = (isset($_GET['module'])) ? $_GET['module'] : '';

        //if controller is selected from dropdown set it to model
        if (isset($_GET['controller'])) {
            $model->controller = $_GET['controller'];
        } else {
            //find the first one
            $controllers = Awecms::getControllers($model->module);
            if (count($controllers))
                $model->controller = reset($controllers);
        }
        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $assetsUrl = Yii::app()->getAssetManager()->publish(dirname(__FILE__) . '/../assets/');
        Yii::app()->getClientScript()->registerScriptFile($assetsUrl . '/accessForm.js?' . time());
        $model = new Access;

        $model = $this->loadModel($id);

        if (isset($_POST['Access'])) {
            $model->setAttributes($_POST['Access']);
            if (isset($_POST['Access']['roles']))
                $model->roles = $_POST['Access']['roles'];
            else
                $model->roles = array();
            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('/role/access'));
                    }
                }
            } catch (Exception $e) {
                $model->addError('', $e->getMessage());
            }
        }

        //if module is selected from drop down, set it to model and nullify controller from old module
        if (isset($_GET['module'])) {
            $model->module = $_GET['module'];
            $controllers = Awecms::getControllers($model->module);
            $model->controller = reset($controllers);
        }
        //if controller is selected from dropdown set it to model
        if (isset($_GET['controller'])) {
            $model->controller = $_GET['controller'];
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
                    Yii::t('app', 'Invalid request.'));
    }

    public function actionIndex() {
        $model = new Access('search');
        $model->unsetAttributes();

        if (isset($_GET['Access']))
            $model->setAttributes($_GET['Access']);

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Access::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        return $model;
    }

}