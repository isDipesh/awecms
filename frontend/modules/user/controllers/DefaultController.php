<?php

class DefaultController extends Controller {

    /**
     * Lists all models.
     */
    private $_model;

    public function actionIndex() {

        if (Yii::app()->user->isGuest) {
            $model = new UserLogin;
            $this->render('/user/login', array('model' => $model));
        } elseif (UserModule::isAdmin()) {

            $dataProvider = new CActiveDataProvider('User', array(
                        'criteria' => array(
                            'condition' => 'status>' . User::STATUS_BANED,
                        ),
                        'pagination' => array(
                            'pageSize' => Yii::app()->controller->module->user_page_size,
                        ),
                    ));
            $this->render('/user/index', array(
                'dataProvider' => $dataProvider,
            ));
        } else {
            $this->_model = Yii::app()->controller->module->user();
            $this->render('/profile/profile', array(
                'model' => $this->_model,
                'profile' => $this->_model->profile,
            ));
        }
    }

}