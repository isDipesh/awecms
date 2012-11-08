<?php

class AlbumController extends Controller {

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
                'actions' => array('minicreate', 'create', 'update', 'manage', 'delete', 'toggle', 'upload'),
                'users' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actions() {
        return array(
            'gulps' => array(
                'class' => 'xupload.actions.XUploadAction',
                'path' => Yii::app()->getBasePath() . "/../uploads",
                'publicPath' => Yii::app()->getBaseUrl() . "/uploads",
            ),
        );
    }

    public function actionIndex() {
        $baseUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.gallery.assets'));
        Yii::app()->getClientScript()->registerCssFile($baseUrl . '/gallery.css');
        $dataProvider = new CActiveDataProvider('Album');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionView($id) {
        $this->webpageType = 'ImageGallery';
        $baseUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.gallery.assets'));
        Yii::app()->getClientScript()->registerCssFile($baseUrl . '/gallery.css');
        $images = Image::model()->findAllByAttributes(array('album_id' => $id));
        $model = $this->loadModel($id);
        $page = $model->page;
        //set page title
        Yii::app()->getController()->pageTitle = $page->title . Awecms::getTitlePrefix();
        //increase view count
        $model->increaseViewCount();
        $this->render('view', array(
            'model' => $model,
            'images' => $images
        ));
    }

    public function actionCreate() {
        $model = new Album;
        if (isset($_POST['Album']) || isset($_POST['Page'])) {

            if (isset($_POST['Album']))
                $model->setAttributes($_POST['Album']);

            if (isset($_POST['Album']['page']))
                $model->page = $_POST['Album']['page'];

            if (isset($_POST['Album']['thumbnail']))
                $model->thumbnail = $_POST['Album']['thumbnail'];

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
        } elseif (isset($_GET['Album'])) {
            $model->attributes = $_GET['Album'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpload($id) {
        $model = $this->loadModel($id);
        $this->render('upload', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['Album']) || isset($_POST['Page'])) {

            if (isset($_POST['Album']))
                $model->setAttributes($_POST['Album']);

            if (isset($_POST['Album']['page']))
                $model->page = $_POST['Album']['page'];
            else
                $model->page = array();

            if (isset($_POST['Album']['thumbnail']))
                $model->thumbnail = $_POST['Album']['thumbnail'];

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
        } elseif (isset($_GET['Album'])) {
            $model->attributes = $_GET['Album'];
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        $model = $this->loadModel($id);
        if (Yii::app()->request->isPostRequest) {
            try {
                $images = Image::model()->findAllByAttributes(array('album_id' => $id));
                foreach ($images as $image) {
                    $image->delete();
                }
                $model->delete();
            } catch (Exception $e) {
                throw new CHttpException(500, $e->getMessage());
            }

            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                $this->redirect(array('/gallery/album'));
            }
        }
        else
            throw new CHttpException(400,
                    Yii::t('app', 'Invalid request.'));
    }

    public function actionManage() {
        $model = new Album('search');
        $model->unsetAttributes();

        if (isset($_GET['Album']))
            $model->setAttributes($_GET['Album']);

        $this->render('manage', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Album::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        return $model;
    }

}