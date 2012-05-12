<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'language' => 'en',
    // preloading 'log' component
    'preload' => array(
        'log',
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'ext.gtc.components.*',
        'ext.giix-components.*', // giix components
        'ext.editme.helpers.ExtEditMeHelper',
    ),
    'behaviors' => array(
    // ...
    ),
    'aliases' => array(
    ),
    // application components
    'components' => array(
        'errorHandler' => array(
        ),
        'assetManager' => array(
            'linkAssets' => true,
        ),
        'cache' => array(
            'class' => 'system.caching.CFileCache',
        ),
        'urlManager' => array(
            'showScriptName' => false, //hides index.php in URL
            'caseSensitive' => true,
            'urlFormat' => 'path',
            'rules' => array(
                '<_a:(login|registration|profile.*|logout)>' => 'user/<_a>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=yc',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'passweird',
            'charset' => 'utf8',
            'tablePrefix' => '',
            'enableProfiling' => true,
            'enableParamLogging' => true,
        ),
        'errorHandler' => array(
            'errorAction' => 'slug/error',
            //'class' => 'application.controllers.SlugHandler',
            //'errorAction' => 'slug/handle',
        //'class' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            //array(
            //  'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
            //'ipFilters' => array('127.0.0.1', '192.168.1.215'),
            //),
            ),
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('/login'),
        ),
    ),
    'modules' => array(
        'user',
        'admin',
        'category',
        'page',
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'password',
            'generatorPaths' => array(
                'ext.giix-core', // giix generators
                'ext.gtc', // extensions/Gii Template 
            ),
        // If removed, Gii defaults to localhost only. Edit carefully to taste.
        //'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
);