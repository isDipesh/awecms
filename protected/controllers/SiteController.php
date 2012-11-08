<?php

class SiteController extends Controller {

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
        );
    }

    public function filters() {
        
    }

    public function actionIndex() {

        if (Settings::get('SEO', 'enable_meta_description_for_homepage')) {
            $meta_description = Settings::get('SEO', 'meta_description');
            if (!empty($meta_description))
                Yii::app()->clientScript->registerMetaTag($meta_description, 'description');
        }


        $this->render('index');
    }

//    public function actionError() {
//        if ($path = Slug::getPath(Yii::app()->getRequest()->pathInfo))
//            $this->forward($path);
//        else {
//            if ($error = Yii::app()->errorHandler->error) {
//                if (Yii::app()->request->isAjaxRequest)
//                    echo $error['message'];
//                else {
//                    $this->pageTitle = 'Error';
//                    $this->render('/error', $error);
//                }
//            }
//        }
//    }

    public function actionContact() {
        $this->webpageType = 'ContactPage';
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