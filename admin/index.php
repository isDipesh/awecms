<?php

date_default_timezone_set('GMT');

// change the following paths if necessary
$yii = dirname(__FILE__) . '/../../framework/yii.php';
$backendConfig = require(dirname(__FILE__) . '/config/main.php');
$commonConfig = require(dirname(__FILE__) . '/../common/config/main.php');

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

require_once($yii);

Yii::setPathOfAlias('root', realpath('../'));

$config = CMap::mergeArray($backendConfig, $commonConfig);
Yii::createWebApplication($config)->run();