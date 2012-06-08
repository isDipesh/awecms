
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
        'ext.gtc.components.*',
        'ext.giix-components.*', // giix components
    ),
    'behaviors' => array(
    // ...
    ),
    'aliases' => array(
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
            'urlFormat' => 'path',
            'rules' => array(
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
            'errorAction' => 'site/error',
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

$modules_dir = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR;
$handle = opendir($modules_dir);
while (false !== ($file = readdir($handle))) {
    if ($file != "." && $file != ".." && is_dir($modules_dir . $file)) {
        $configFile = $modules_dir . $file . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'main.php';
        if (file_exists($configFile))
            $config = CMap::mergeArray($config, require ($configFile));
    }
}
closedir($handle);

return $config;