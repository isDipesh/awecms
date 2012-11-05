<?php

class TagController extends Controller {

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
                'actions' => array('delete'),
                'users' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Tag');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
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

    public function loadModel($id) {
        $model = Tag::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        return $model;
    }

    public function actionJson() {
        header('Content-type: application/json');
        $this->layout = false;
        if (isset($_POST['tag'])) {
            $criteria = new CDbCriteria(array(
                        'limit' => 10
                    ));
            $criteria->addSearchCondition('name', $_POST['tag']);
            $tags = Tag::model()->findAll($criteria);
            echo json_encode(array_map(create_function('$o', 'return $o->name;'), $tags));
        }
    }

    public function missingAction($name) {
        $model = Tag::model()->findByAttributes(array('name' => $name));
        if (!$model)
            parent::missingAction($name);
        $this->render('view', array(
            'model' => $model,
        ));
    }

}