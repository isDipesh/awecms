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
        $module = Yii::app()->getController()->getModule();
        if (!empty($module)) {
            $module = Yii::app()->getController()->getModule()->getId();
        }
        $access = Access::model()->findByAttributes(
                array(
                    'module' => $module,
                    'controller' => Yii::app()->getController()->id,
                    'action' => Yii::app()->getController()->getAction()->id,
                )
        );
        //if there's no rule, allow everyone
        if (!$access)
            return true;
        $userRoles = User::model()->findByPk($userId)->roles;
        if (array_intersect($access->roles, $userRoles))
            return true;
        return false;
    }

}