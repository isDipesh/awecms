<?php

/**
 * This is the model base class for the table "event".
 *
 * Columns in table "event" available as properties of the model:

 * @property integer $id
 * @property string $venue
 * @property string $start
 * @property string $end
 * @property integer $whole_day_event
 * @property string $organizer
 * @property string $type
 * @property string $url
 * @property integer $page_id
 * @property integer $enabled
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
            array('venue, start, end, whole_day_event, organizer, type, url, enabled', 'default', 'setOnEmpty' => true, 'value' => null),
            array('whole_day_event, page_id, enabled', 'numerical', 'integerOnly' => true),
            array('url', 'url'),
            array('type', 'length', 'max' => 255),
            array('venue, start, end, organizer, url', 'safe'),
            array('id, venue, start, end, whole_day_event, organizer, type, url, page_id, enabled', 'safe', 'on' => 'search'),
            array(
                'end',
                'compare',
                'compareAttribute' => 'start',
                'operator' => '>',
                'allowEmpty' => true,
                'message' => Yii::t('app', 'End Time can not be earlier than Start Time!'),
            ),
        );
    }

    public function __toString() {
        return (string) $this->venue;
    }

    public function behaviors() {
        return array(
            'page-behavior' => array('class' => 'PageBehavior'),
            'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
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
            'whole_day_event' => Yii::t('app', 'Is Whole Day Event?'),
            'organizer' => Yii::t('app', 'Organizer'),
            'type' => Yii::t('app', 'Type'),
            'url' => Yii::t('app', 'Url'),
            'page_id' => Yii::t('app', 'Page'),
            'enabled' => Yii::t('app', 'Enabled'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('venue', $this->venue, true);
        $criteria->compare('start', $this->start, true);
        $criteria->compare('end', $this->end, true);
        $criteria->compare('whole_day_event', $this->whole_day_event);
        $criteria->compare('organizer', $this->organizer, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('page_id', $this->page_id);
        $criteria->compare('enabled', $this->enabled);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}