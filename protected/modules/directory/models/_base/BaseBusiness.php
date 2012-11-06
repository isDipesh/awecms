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
 * @property string $image
 * @property double $latitude
 * @property double $longitude
 *
 * Relations of table "business" available as properties of the model:
 * @property Page $page
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
            array('page_id', 'required'),
            array('phone, fax, email, website, address, image', 'default', 'setOnEmpty' => true, 'value' => null),
            array('page_id', 'numerical', 'integerOnly' => true),
            array('latitude, longitude', 'numerical'),
            array('email', 'email'),
            array('website', 'url', 'defaultScheme' => 'http'),
            array('phone, fax, email, website', 'length', 'max' => 255),
            array('address, image', 'safe'),
            array('image', 'file', 'types' => 'jpg, gif, png', 'allowEmpty' => true, 'maxSize' => 5 * 1024 * 1024), //5 MB max size
            array('id, page_id, phone, fax, email, website, address, image, latitude, longitude', 'safe', 'on' => 'search'),
        );
    }

    public function __toString() {
        return (string) $this->title;
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
            'image' => Yii::t('app', 'Image'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
        );
    }

}