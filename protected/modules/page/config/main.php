<?php

$default_controller = 'default';
$module_name = 'page';

return array(
    'import' => array(
        'application.modules.page.models.*',
    ),
    
    'components' => array(
        'urlManager' => array(
            'rules' => array(
//                $module_name . '/<action:\w+>/<id:\d+>' => $module_name . '/' . $default_controller . '/<action>',
//                $module_name . '/<action:\w+>' => $module_name . '/' . $default_controller . '/<action>',
            ),
        ),
    ),

);