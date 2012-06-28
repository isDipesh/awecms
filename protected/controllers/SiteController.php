<?php

class SiteController extends Controller {

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'view', 'json'),
                'expression' => 'Role::checkAccess()',
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionJson() {
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');

        $this->layout = false;
        if (isset($_GET['tag'])) {

            $criteria = new CDbCriteria(array(
                        'limit' => 10
                    ));

            $criteria->addSearchCondition('name', $_GET['tag']);

            $tags = MenuItem::model()->findAll($criteria);

            $this->render('json', array('tags' => $tags));
        }
    }

    public function actionError() {
        if ($path = Slug::getPath(Yii::app()->getRequest()->pathInfo))
            $this->forward($path);
        else {
            if ($error = Yii::app()->errorHandler->error) {
                if (Yii::app()->request->isAjaxRequest)
                    echo $error['message'];
                else {
                    $this->pageTitle = 'Error';
                    $this->render('/error', $error);
                }
            }
        }
    }

    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

}