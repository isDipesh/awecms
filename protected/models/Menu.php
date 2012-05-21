<?php

Yii::setPathOfAlias('Menu', dirname(__FILE__));
Yii::import('Menu.*');

class Menu extends BaseMenu {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}