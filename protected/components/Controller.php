<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    protected $assetPath;

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/content';

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
    public $webpageType = 'WebPage';
    public $pageRobotsIndex = true;
    public $pageKeywords;

    public function filters() {
        return array(
            'accessControl - login, logout',
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

//    public function accessRules() {
//        return array(
//            array('allow',
//                'expression' => 'Role::checkAccess()',
//            ),
//            array('deny',
//                'users' => array('*'),
//            ),
//        );
//    }

    public function init() {
        LanguagePicker::setLanguage();
        $appName = Settings::get('site', 'name');
        if ($appName)
            Yii::app()->name = $appName;
        $this->pageTitle = $this->getTitle();
        //if the request originates from admin module
        if (substr(Yii::app()->getRequest()->pathInfo, 0, 6) == 'admin/') {
            $this->layout = 'application.modules.admin.views.layouts.main';
            //if the controller has admin action, set it to be default action for admin module
//            if (method_exists($this, 'actionAdmin'))
//                $this->defaultAction = 'admin';
        }
        parent::init();
    }

    public function getTitle() {
        $separator = ' - ';
        $title = Settings::get('site', 'name');
        if ($this->module)
            $title.= $separator . ucfirst($this->module->getName());
        if ($this->module && ($this->module->getName() != $this->id))
            $title.= $separator . ucfirst($this->id);
        if ($this->action && ($this->action->id != 'index'))
            $title.= $separator . ucfirst($this->action->id);
        return $title;
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

    protected function block($name) {
        Block::run($name);
    }

//    public function getaPageTitle() {
//
//        $separator = ' >> ';
//        $title = Settings::get('site', 'name');
//        if ($this->module)
//            $title.= $separator . ucfirst($this->module->getName());
//        if ($this->module->getName() != $this->id)
//            $title.= $separator . ucfirst($this->id);
//        if ($this->action->id != 'index')
//            $title.= $separator . ucfirst($this->action->id);
//        return $title;
//        parent::getPageTitle();
//    }

    protected function publishAssets() {
        $this->assetPath = Yii::app()->getAssetManager()->publish($this->viewPath . '/assets') . '/';
        Yii::app()->clientScript->registerScript('assetpath', '
            window.assetPath = "' . $this->assetPath . '";
        ', CClientScript::POS_READY);
    }

    public function beforeRender($view) {
        //some SEO stuffs here

        if ($this->pageRobotsIndex == false) {
            Yii::app()->clientScript->registerMetaTag('noindex', 'robots');
        }

        if (Settings::get('SEO', 'enable_meta_description_for_all_pages')) {
            $meta_description = Settings::get('SEO', 'meta_description');
            if (!empty($meta_description))
                Yii::app()->clientScript->registerMetaTag($meta_description, 'description');
        }

        if (Settings::get('SEO', 'enable_meta_keywords')) {
            if (empty($this->pageKeywords))
                $this->pageKeywords = Settings::get('SEO', 'meta_keywords');
        }

        if (Settings::get('SEO', 'enable_open_graph_meta_tags')) {
            $site_name = Awecms::getSiteName();
            if (!empty($site_name))
                Yii::app()->clientScript->registerMetaTag($site_name, NULL, NULL, array('property' => 'og:site_name'));
            if (!empty($this->pageTitle))
                Yii::app()->clientScript->registerMetaTag($this->pageTitle, NULL, NULL, array('property' => 'og:title'));

            $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
            Yii::app()->clientScript->registerMetaTag($protocol . $_SERVER['HTTP_HOST'] . Yii::app()->request->requestUri, NULL, NULL, array('property' => 'og:url'));

            if (!empty($meta_description))
                Yii::app()->clientScript->registerMetaTag($meta_description, NULL, NULL, array('property' => 'og:description'));
        }

        if ($this->pageKeywords)
            Yii::app()->clientScript->registerMetaTag($this->pageKeywords, 'keywords');

        Yii::app()->clientScript->registerMetaTag('AweCMS ' . Awecms::version, 'generator');
        return parent::beforeRender($view);
    }

    //this is a wild guess, at least try to show something
    public function missingAction($param) {
        throw new AweException(404);
    }

}
