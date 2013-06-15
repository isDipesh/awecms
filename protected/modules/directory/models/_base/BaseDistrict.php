<?php

/**
 * This is the model base class for the table "district".
 *
 * Columns in table "district" available as properties of the model:
 
      * @property integer $id
      * @property string $name
      * @property string $headquarter
      * @property string $zone
      * @property string $zone_id
 *
 * Relations of table "district" available as properties of the model:
 * @property Business[] $businesses
 * @property Place[] $places
 */
abstract class BaseDistrict extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'district';
    }

    public function rules() {
        return array(
            array('id', 'required'),
            array('name, headquarter, zone, zone_id', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id', 'numerical', 'integerOnly' => true),
            array('name, headquarter, zone, zone_id', 'length', 'max' => 255),
            array('id, name, headquarter, zone, zone_id', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->name;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'businesses' => array(self::HAS_MANY, 'Business', 'district_id'),
            'places' => array(self::HAS_MANY, 'Place', 'district_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'headquarter' => Yii::t('app', 'Headquarter'),
            'zone' => Yii::t('app', 'Zone'),
            'zone_id' => Yii::t('app', 'Zone'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('headquarter', $this->headquarter, true);
        $criteria->compare('zone', $this->zone, true);
        $criteria->compare('zone_id', $this->zone_id, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}