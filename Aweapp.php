<?php

class Aweapp extends CWebApplication {

    public $config;
    public $forgiven = 0;

    public function __construct($config = null) {
        $this->config = $config;
        parent::__construct($config);
//        register_shutdown_function(array($this, 'shutdown'));
    }

    public function shutdown() {
        if (YII_ENABLE_ERROR_HANDLER && ($error = error_get_last())) {
            $this->handleError($error['type'], $error['message'], $error['file'], $error['line']);
            die();
        }
    }

    protected function init() {
        $modulesConfig = array();
        //dynamically loading modules and their config
        foreach (glob(dirname(__FILE__) . '/protected/modules/*', GLOB_ONLYDIR) as $moduleDirectory) {
            $this->setModules(array(basename($moduleDirectory)));
            $configFile = $moduleDirectory . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'main.php';
            if (file_exists($configFile))
                $modulesConfig = CMap::mergeArray($modulesConfig, require ($configFile));
        }

        $finalConfig = CMap::mergeArray($modulesConfig, require (dirname(__FILE__) . '/protected/config/db.php'));
        $this->configure(CMap::mergeArray($finalConfig, require($this->config)));
        return parent::init();
    }

    public function runController($route) {
        if (($ca = $this->createController($route)) !== null) {
            list($controller, $actionID) = $ca;
            $oldController = $this->controller;
            $this->controller = $controller;
            $controller->init();
            $controller->run($actionID);
            $this->controller = $oldController;
        } else {
            //we only forgive once
            if ($this->forgiven) {
                Yii::app()->getErrorHandler()->showError(new CHttpException(404, Yii::t('yii', 'Unable to resolve the request "{route}".', array('{route}' => $route === '' ? $this->defaultController : $route))));
            }
            $this->forgiven++;
            throw new CHttpException(404, Yii::t('yii', 'Unable to resolve the request "{route}".', array('{route}' => $route === '' ? $this->defaultController : $route)));
        }
    }

}