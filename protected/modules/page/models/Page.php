<?php

Yii::setPathOfAlias('Page', dirname(__FILE__));
Yii::import('Page.*');

class Page extends BasePage {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public function __toString() {
        return (string) $this->title;
    }

    public function behaviors() {
        return array_merge(parent::behaviors(), array(
                    'CTimestampBehavior' => array(
                        'class' => 'zii.behaviors.CTimestampBehavior',
                        'createAttribute' => 'created_at',
                        'updateAttribute' => 'modified_at',
                    ),
                ));
    }

    public function rules() {
        return array_merge(
                        parent::rules()
        );
    }

}