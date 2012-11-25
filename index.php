<?php

$yii = '/var/www/yii/framework/yii.php';

date_default_timezone_set('GMT');

// remove the following line when in production mode
//defined('YII_DEBUG') or define('YII_DEBUG', true);

$mainConfig = dirname(__FILE__) . '/protected/config/main.php';

require_once($yii);
require_once('Aweapp.php');

$aweapp = new Aweapp($mainConfig);
$aweapp->run();