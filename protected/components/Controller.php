<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'expression' => 'Role::checkAccess()',
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function init() {
        //if the request originates from admin module
        if (substr(Yii::app()->getRequest()->pathInfo, 0, 6) == 'admin/') {
            Yii::import('application.modules.admin.AdminModule');
            $this->layout = 'application.modules.admin.views.layouts.main';
            //if the controller has admin action, set it to be default action for admin module
//            if (method_exists($this, 'actionAdmin'))
//                $this->defaultAction = 'admin';
        }
        parent::init();
    }

    public function actionToggle($id, $attribute, $model) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $model = $this->loadModel($id, $model);
            //loadModel($id, $model) from giix
            ($model->$attribute == 1) ? $model->$attribute = 0 : $model->$attribute = 1;
            $model->save();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'page-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    protected function block($name){
        Block::run($name);
    }

    //this is a wild guess, at least try to show something
//    public function missingAction($param) {
////        $this->actionIndex($param);
//    }

}
