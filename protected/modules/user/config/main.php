<?php

return array(
    'import' => array(
        'application.modules.user.models.*',
        'application.modules.user.components.*',
    ),
    'modules' => array(
        'user'
    ),
    'components' => array(
        'urlManager' => array(
            'rules' => array(
                '<_a:(login|registration|profile.*|logout)>' => 'user/<_a>',
            ),
        ),
        'user' => array(
            'allowAutoLogin' => true,
            'loginUrl' => array('/login'),
        ),
    ),
);