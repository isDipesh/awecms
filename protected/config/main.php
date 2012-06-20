<?php

$config = array(
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
        'application.behaviors.*',
        'application.widgets.*',
        'application.extensions.*',
        'application.extensions.awegen.components.*',
        'ext.gtc.components.*',
        'ext.giix-components.*', // giix components
    ),
    // application components
    'components' => array(
        'assetManager' => array(
            'linkAssets' => true,
        ),
        'cache' => array(
            'class' => 'system.caching.CFileCache',
        ),
        'urlManager' => array(
            'showScriptName' => false, //hides index.php in URL
            'caseSensitive' => true,
            'class' => 'application.components.AweUrlManager',
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'errorHandler' => array(
        //'errorAction' => 'site/error',
            'class' => 'AweErrorHandler',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'password',
            'generatorPaths' => array(
                'ext.giix-core', // giix generators
                'ext.gtc', // extensions/Gii Template 
                'ext.awegen', // extensions/Gii Template 
            ),
        // If removed, Gii defaults to localhost only. Edit carefully to taste.
        //'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
);

return $config;