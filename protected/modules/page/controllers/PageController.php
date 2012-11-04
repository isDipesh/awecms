<?php

class PageController extends Controller {
    
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
                'actions' => array('minicreate', 'create', 'update', 'manage', 'delete', 'toggle'),
                'users' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Page', array(
                    'criteria' => array(
                        'condition' => "type='Page' AND (status='published' OR user_id='" . Yii::app()->user->id . "')",
//                        'with' => array('author'),
                    ),
                    'pagination' => array(
                        'pageSize' => 20,
                    ),
                ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionView($id) {
        $page = $this->loadModel($id);
        //set page title
        Yii::app()->getController()->pageTitle = $page->title . Awecms::getTitlePrefix();
        //increase view count
        $page->views++;
        $page->save();
        $this->render('view', array(
            'page' => $page,
        ));
    }

    public function actionCreate() {
        $page = new Page;
        if (isset($_POST['Page'])) {
            try {
                if ($page->save()) {
                    if (Settings::get('SEO', 'slugs_enabled') && isset($_POST['Page']['slug'])) {
                        $page->slug = Slug::create($_POST['Page']['slug'], array('view', 'id' => $page->id));
                        $page->save();
                    }
                    $this->redirect(array('view', 'id' => $page->id));
                }
            } catch (Exception $e) {
                $page->addError('', $e->getMessage());
            }
        } elseif (isset($_GET['Page'])) {
            $page->attributes = $_GET['Page'];
        }
//        if (!isset($_POST['Page']['user']))
//            $page->user = Yii::app()->user->id;

        $this->render('create', array('page' => $page));
    }

    public function actionUpdate($id) {
        $page = $this->loadModel($id);

        if (isset($_POST['Page'])) {
            if (Settings::get('SEO', 'slugs_enabled')) {
                if (isset($page->slug)) {
                    if (isset($page->slug->slug) && $_POST['Page']['slug'] != $page->slug->slug) {
                        if ($_POST['Page']['slug'] == '') {
                            $page->slug->delete();
                            $page->slug = NULL;
                        } else {
                            $page->slug->change($_POST['Page']['slug']);
                        }
                    }
                } else {
                    $page->slug = Slug::create($_POST['Page']['slug'], array('view', 'id' => $id));
                    $page->save();
                }
            }
            try {
                if ($page->save()) {
                    $this->redirect(array('view', 'id' => $page->id));
                }
            } catch (Exception $e) {
                $page->addError('', $e->getMessage());
            }
        }
        $this->render('update', array(
            'page' => $page,
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
                $this->redirect(array('/page'));
            }
        }
        else
            throw new CHttpException(400,
                    Yii::t('app', 'Invalid request.'));
    }

    public function actionContent() {
        $page = new Page('search');
        $page->unsetAttributes();
        if (isset($_GET['Page']))
            $page->setAttributes($_GET['Page']);

        $this->render('content', array(
            'page' => $page,
        ));
    }

    public function actionManage() {
        $page = new Page('search');
        $page->unsetAttributes();
        $page->type = 'Page';
        if (isset($_GET['Page']))
            $page->setAttributes($_GET['Page']);
        $this->render('manage', array(
            'page' => $page,
        ));
    }

    public function actionToggle($id, $attribute, $page) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $page = $this->loadModel($id, $page);
            //loadModel($id, $page) from giix
            ($page->$attribute == 1) ? $page->$attribute = 0 : $page->$attribute = 1;
            $page->save();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function loadModel($id) {
        $page = Page::model()->findByPk($id);
        if ($page === null)
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        return $page;
    }

}