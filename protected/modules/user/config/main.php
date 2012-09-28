<?php

return array(
    'import' => array(
        'application.modules.user.models.*',
        'application.modules.user.components.*',
    ),
    'modules' => array(
        'user' => array(
            # encrypting method (php hash function)
            'hash' => 'md5',
            # send activation email
            'sendActivationMail' => false,
            # allow access for non-activated users
            'loginNotActiv' => false,
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => true,
            # automatically login from registration
            'autoLogin' => true,
            # registration path
            'registrationUrl' => array('/registration'),
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
            # login form path
            'loginUrl' => array('login'),
            # page after login
            #'returnUrl' => '/index.php',
            # page after logout
            #'returnLogoutUrl' => array('/..'),
        )
    ),
    'components' => array(
        'urlManager' => array(
            'rules' => array(
                '<_a:(login|registration|logout)>' => 'user/<_a>',
            ),
        ),
        'user' => array(
            'allowAutoLogin' => true,
            'loginUrl' => array('login'),
        ),
    ),
);