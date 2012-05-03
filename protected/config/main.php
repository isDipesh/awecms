<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'language' => 'en',
    'name' => 'My CMS',
    // preloading 'log' component
    'preload' => array(
        'log',
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'ext.gtc.components.*',
        'ext.giix-components.*', // giix components
        'application.extensions.nestedset.*', // import nested set extension
    ),
    'behaviors' => array(
    // ...
    ),
    'aliases' => array(
    ),
    // application components
    'components' => array(
        'metadata' => array('class' => 'Metadata'),
        'assetManager' => array(
            'linkAssets' => true,
        ),
        'cache' => array(
            'class' => 'system.caching.CFileCache',
        ),
        'settings' => array(
            'class' => 'CmsSettings',
            'cacheComponentId' => 'cache',
            'cacheId' => 'global_website_settings',
            'cacheTime' => 84000,
            'tableName' => '{{settings}}',
            'dbComponentId' => 'db',
            'createTable' => true,
            'dbEngine' => 'InnoDB',
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
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
            //'class' => 'application.modules.cms.components.CmsHandler',
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
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
    //yum submodules
    'modules' => array(
        'cms' => array(
            // this layout will be set by default if no layout set for page
            'defaultLayout' => 'cms', // this layout will be set by default if no layout set for page
        ),
        'user',
        'page',
        'admin',
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