<?php

return array(
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=awecms',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'password',
            'charset' => 'utf8',
            'tablePrefix' => '',
            'enableProfiling' => true,
            'enableParamLogging' => true,
        )
    )
);
