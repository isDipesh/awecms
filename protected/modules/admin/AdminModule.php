<?php

class AdminModule extends CWebModule {

    public $name = "Admin";

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'admin.models.*',
            'admin.components.*',
            'user.models.*',
            'user.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {


            if (Yii::app()->user->isGuest) {
                $model = new UserLogin;
                //$this->redirect('/');
                //die();
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


            // this method is called before any module controller action is performed
            $controller->layout = 'main';
            return true;
        }
        else
            return false;
    }

    public static function t($a) {
        return $a;
    }

}
