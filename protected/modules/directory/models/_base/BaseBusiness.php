<?php

/**
 * This is the model base class for the table "business".
 *
 * Columns in table "business" available as properties of the model:
 
      * @property integer $id
      * @property integer $page_id
      * @property string $phone
      * @property string $fax
      * @property string $email
      * @property string $website
      * @property string $address
      * @property integer $place_id
      * @property integer $district_id
      * @property string $image
 *
 * Relations of table "business" available as properties of the model:
 * @property Page $page
 * @property Place $place
 * @property District $district
 * @property BusinessCategory[] $businessCategories
 */
abstract class BaseBusiness extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'business';
    }

    public function rules() {
        return array(
            array('id, page_id', 'required'),
            array('phone, fax, email, website, address, place_id, district_id, image', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, page_id, place_id, district_id', 'numerical', 'integerOnly' => true),
            array('email', 'email'),
            array('website', 'url'),
            array('phone, fax, email, website', 'length', 'max' => 255),
            array('address, image', 'safe'),
            array('id, page_id, phone, fax, email, website, address, place_id, district_id, image', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->phone;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
            'place' => array(self::BELONGS_TO, 'Place', 'place_id'),
            'district' => array(self::BELONGS_TO, 'District', 'district_id'),
            'businessCategories' => array(self::MANY_MANY, 'BusinessCategory', 'business_nm_category(business_id, category_id)'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'page_id' => Yii::t('app', 'Page'),
            'phone' => Yii::t('app', 'Phone'),
            'fax' => Yii::t('app', 'Fax'),
            'email' => Yii::t('app', 'Email'),
            'website' => Yii::t('app', 'Website'),
            'address' => Yii::t('app', 'Address'),
            'place_id' => Yii::t('app', 'Place'),
            'district_id' => Yii::t('app', 'District'),
            'image' => Yii::t('app', 'Image'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('page_id', $this->page_id);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('fax', $this->fax, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('place_id', $this->place_id);
        $criteria->compare('district_id', $this->district_id);
        $criteria->compare('image', $this->image, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}