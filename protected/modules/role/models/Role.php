<?php

Yii::import('application.modules.role.models._base.BaseRole');

class Role extends BaseRole {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public static function is($role) {
        $userId = Yii::app()->user->id;
        if (!$userId)
            return false;
        $isRole = in_array($role, User::model()->findByPk($userId)->roles);
        $roleObj = Role::model()->findByAttributes(array('name' => $role));
        if (!$roleObj) {
//            throw new CHttpException(500, 'No role named ' . $role . ' exists!');
            return false;
        }
        $isActive = $roleObj->active;
        return $isRole && $isActive;
    }

    public static function checkAccess() {
        //find module and controller
        $module = Yii::app()->getController()->getModule();
        if (!empty($module)) {
            $module = Yii::app()->getController()->getModule()->getId();
        }
        $controller = Yii::app()->getController()->id;

        //if the user is trying to login, allow
        if ($module == 'user' && $controller == 'login')
            return true;

        $access = Access::model()->findByAttributes(
                array(
                    'module' => $module,
                    'controller' => $controller,
                    'action' => Yii::app()->getController()->getAction()->id,
                    'enabled' => 1
                )
        );

        //if there's no rule, allow everyone
        if (!$access)
            return true;

        if ($access->all)
            return true;

        if ($access->loggedIn && Yii::app()->user->id)
            return true;

        if ($access->guest && Yii::app()->user->isGuest)
            return true;

        //find the user
        $userId = Yii::app()->user->id;
        //if the user isn't logged in, and we already know guests aren't allowed here
        if (!$userId)
            return false;

        //find the user roles and allowed roles
        $userRoles = User::model()->findByPk($userId)->roles;
        if (array_intersect($access->roles, $userRoles))
            return true;

        return false;
    }

}