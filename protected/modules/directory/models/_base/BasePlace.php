<?php

/**
 * This is the model base class for the table "place".
 *
 * Columns in table "place" available as properties of the model:
 
      * @property integer $id
      * @property string $other_names
      * @property double $longitude
      * @property double $latitude
      * @property string $airport_code
      * @property string $short_name
      * @property string $weather_code
      * @property integer $district_id
      * @property string $type
 *
 * Relations of table "place" available as properties of the model:
 * @property Business[] $businesses
 * @property District $district
 */
abstract class BasePlace extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'place';
    }

    public function rules() {
        return array(
            array('other_names, longitude, latitude, airport_code, short_name, weather_code, district_id, type', 'default', 'setOnEmpty' => true, 'value' => null),
            array('district_id', 'numerical', 'integerOnly' => true),
            array('longitude, latitude', 'numerical'),
            array('other_names', 'length', 'max' => 255),
            array('airport_code, weather_code, type', 'length', 'max' => 50),
            array('short_name', 'length', 'max' => 10),
            array('id, other_names, longitude, latitude, airport_code, short_name, weather_code, district_id, type', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->other_names;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'businesses' => array(self::HAS_MANY, 'Business', 'place_id'),
            'district' => array(self::BELONGS_TO, 'District', 'district_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'other_names' => Yii::t('app', 'Other Names'),
            'longitude' => Yii::t('app', 'Longitude'),
            'latitude' => Yii::t('app', 'Latitude'),
            'airport_code' => Yii::t('app', 'Airport Code'),
            'short_name' => Yii::t('app', 'Short Name'),
            'weather_code' => Yii::t('app', 'Weather Code'),
            'district_id' => Yii::t('app', 'District'),
            'type' => Yii::t('app', 'Type'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('other_names', $this->other_names, true);
        $criteria->compare('longitude', $this->longitude);
        $criteria->compare('latitude', $this->latitude);
        $criteria->compare('airport_code', $this->airport_code, true);
        $criteria->compare('short_name', $this->short_name, true);
        $criteria->compare('weather_code', $this->weather_code, true);
        $criteria->compare('district_id', $this->district_id);
        $criteria->compare('type', $this->type, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}