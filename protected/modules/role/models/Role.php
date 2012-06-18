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
        $isRole = in_array($role, User::model()->findByPk(Yii::app()->user->id)->roles);
        $isActive = Role::model()->findByAttributes(array('name' => $role))->active;
        return $isRole && $isActive;
    }

}