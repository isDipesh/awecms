<?php

Yii::import('application.modules.event.models._base.BaseEvent');

class Event extends BaseEvent {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public function getUpcomingEvents($limit = 10) {
        $criteria = new CDbCriteria;
        $criteria->limit = $limit;
        $now = new CDbExpression("NOW()");
        $criteria->addCondition('end > ' . $now . ' ');
        return $this->findAll($criteria);
    }

}