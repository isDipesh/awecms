<?php

class Aweapp extends CWebApplication {

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
            if (file_exists($configFile))
                $modulesConfig = CMap::mergeArray($modulesConfig, require ($configFile));
        }
        $this->configure(CMap::mergeArray($modulesConfig, require($this->config)));
        return parent::init();
    }

}