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
        $userId = Yii::app()->user->id;
        if (!$userId)
            return false;
        $allowedRoles = Access::model()->findByAttributes(array(
                    'module' => Yii::app()->getController()->getModule(),
                    //'controller' => Yii::app()->getController()->id,
                    'controller' => 'SiteController',
                    'action' => Yii::app()->getController()->getAction()->id,
                ))->roles;
        $userRoles = User::model()->findByPk($userId)->roles;
        if (array_intersect($allowedRoles, $userRoles))
            return true;
        return false;
    }

}