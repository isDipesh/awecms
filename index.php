<?php

$yii = dirname(__FILE__) . '/../../yii/framework/yii.php';
date_default_timezone_set('GMT');
// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

$mainConfig = dirname(__FILE__) . '/protected/config/main.php';

require_once($yii);
require_once('Aweapp.php');

$aweapp = new Aweapp($mainConfig);
$aweapp->run();