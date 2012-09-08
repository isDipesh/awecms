<?php

Yii::import('application.modules.block.models._base.BaseBlock');

class Block extends BaseBlock {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public static function run($name) {
        $block = new self;
        $b = $block->findByAttributes(array('title' => $name));
        if ($b->is_widget) {
            Yii::app()->getController()->widget('BlockW', array(
                'block' => $b,
            ));
        } else {
            echo nl2br($b->content);
        }
    }

}