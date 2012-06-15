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
            'sendActivationMail' => true,
            # allow access for non-activated users
            'loginNotActiv' => false,
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,
            # automatically login from registration
            'autoLogin' => true,
            # registration path
            'registrationUrl' => array('/user/registration'),
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
            # login form path
            'loginUrl' => array('/slogin'),
            # page after login
            'returnUrl' => array('/user/profile'),
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        )
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