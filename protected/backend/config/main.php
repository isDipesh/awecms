<?php

$backend = dirname(dirname(__FILE__));
$frontend = dirname($backend);
Yii::setPathOfAlias('backend', $backend);

return array(
    'basePath' => $frontend,
    'name' => 'My CMS Backend',
    'controllerPath' => $backend . '/controllers',
    'viewPath' => $backend . '/views',
    'runtimePath' => $backend . '/runtime',
    'import' => array(
        'backend.models.*',
        'backend.components.*',
        'application.models.*',
        'application.components.*',
    ),
    'components' => array(
        'user' => array(
            'allowAutoLogin' => true,
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                array(
                    'class' => 'CWebLogRoute',
                    'levels' => 'trace,info, error, warning',
                ),
            ),
        ),
    ),
);
