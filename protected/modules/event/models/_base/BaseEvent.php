<?php

/**
 * This is the model base class for the table "event".
 *
 * Columns in table "event" available as properties of the model:

 * @property integer $id
 * @property string $venue
 * @property string $start
 * @property string $end
 * @property string $organizer
 * @property string $type
 * @property string $url
 * @property integer $page_id
 *
 * Relations of table "event" available as properties of the model:
 * @property Page $page
 */
abstract class BaseEvent extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'event';
    }

    public function rules() {
        return array(
            array('page_id', 'required'),
            array('venue, start, end, organizer, type, url', 'default', 'setOnEmpty' => true, 'value' => null),
            array('page_id', 'numerical', 'integerOnly' => true),
            array('url', 'url'),
            array('type', 'length', 'max' => 255),
            array('venue, start, end, organizer, url', 'safe'),
            array('id, venue, start, end, organizer, type, url, page_id', 'safe', 'on' => 'search'),
        );
    }

    public function __toString() {
        return (string) $this->venue;
    }

    public function behaviors() {
        return array(
            'page-behavior' => array('class' => 'PageBehavior'),
            'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior'),
        );
    }

    public function relations() {
        return array(
            'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'venue' => Yii::t('app', 'Venue'),
            'start' => Yii::t('app', 'Start Time'),
            'end' => Yii::t('app', 'End Time'),
            'organizer' => Yii::t('app', 'Organizer'),
            'type' => Yii::t('app', 'Type'),
            'url' => Yii::t('app', 'Url'),
            'page_id' => Yii::t('app', 'Page'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('venue', $this->venue, true);
        $criteria->compare('start', $this->start, true);
        $criteria->compare('end', $this->end, true);
        $criteria->compare('organizer', $this->organizer, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('page_id', $this->page_id);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}