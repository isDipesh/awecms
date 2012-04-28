<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My CMS',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
//        'application.modules.user.models.*',
        'ext.gtc.components.*',
        'ext.giix-components.*', // giix components
    ),
    'behaviors' => array(
    // ...
    ),
    // application components
    'components' => array(
//        'user' => array(
//            'class' => 'application.modules.user.components.YumWebUser',
//            'allowAutoLogin' => true,
//            'loginUrl' => array('//user/login'),
//        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'showScriptName' => false, //hides index.php in URL
            'caseSensitive' => true,
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        /*
          'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ),
         */


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
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
//                array(
//                    'class' => 'CWebLogRoute',
//                    'levels' => 'trace,info, error, warning',
//                ),
                array(
                    'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                //'ipFilters' => array('127.0.0.1', '192.168.1.215'),
                ),
            ),
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
//        'user' => array(
//            'debug' => FALSE,
//            'usersTable' => 'user',
//            'translationTable' => 'translation',
//        ),
//        'usergroup' => array(
//            'usergroupTable' => 'user_group',
//            'usergroupMessagesTable' => 'user_group_message',
//        ),
//        'membership' => array(
//            'membershipTable' => 'membership',
//            'paymentTable' => 'payment',
//        ),
//        'friendship' => array(
//            'friendshipTable' => 'friendship',
//        ),
//        'profile' => array(
//            'privacySettingTable' => 'privacy_setting',
//            'profileFieldsGroupTable' => 'profile_field_group',
//            'profileFieldsTable' => 'profile_field',
//            'profileTable' => 'profile',
//            'profileCommentTable' => 'profile_comment',
//            'profileVisitTable' => 'profile_visit',
//        ),
//        'role' => array(
//            'rolesTable' => 'role',
//            'userHasRoleTable' => 'user_role',
//            'actionTable' => 'action',
//            'permissionTable' => 'permission',
//        ),
//        'messages' => array(
//            'messagesTable' => 'message',
//        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'password',
            'generatorPaths' => array(
                'ext.giix-core', // giix generators
                'ext.gtc', // extensions/Gii Template 
            ),
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
);