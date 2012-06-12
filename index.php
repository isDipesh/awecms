<?php

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);

date_default_timezone_set('GMT');

// change the following paths if necessary
$yii = dirname(__FILE__) . '/../../yii/framework/yii.php';
$mainConfig = dirname(__FILE__) . '/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

require_once($yii);

class Awecms extends CWebApplication {

    public $config;

    public function __construct($config = null) {
        $this->config = $config;
        return parent::__construct($config);
    }

    protected function init() {
        $modulesConfig = array();
        //dynamically loading modules and their config
        foreach (glob(dirname(__FILE__) . '/protected/modules/*', GLOB_ONLYDIR) as $moduleDirectory) {
            $this->setModules(array(basename($moduleDirectory)));
            $configFile = $moduleDirectory . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'main.php';
            //if (file_exists($configFile))
                $modulesConfig = CMap::mergeArray($modulesConfig, require ($configFile));
        }
        $this->configure(CMap::mergeArray($modulesConfig, require($this->config)));
        return parent::init();
    }

}

$awecms = new Awecms($mainConfig);
$awecms->run();