<?php

/**
 * This is the model base class for the table "business_category".
 *
 * Columns in table "business_category" available as properties of the model:

 * @property integer $id
 * @property integer $page_id
 *
 * Relations of table "business_category" available as properties of the model:
 * @property Page $page
 * @property Business[] $businesses
 */
abstract class BaseBusinessCategory extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'business_category';
    }

    public function rules() {
        return array(
            array('page_id', 'required'),
            array('page_id', 'numerical', 'integerOnly' => true),
            array('id, page_id', 'safe', 'on' => 'search'),
        );
    }

    public function __toString() {
        return (string) $this->id;
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
            'businesses' => array(self::MANY_MANY, 'Business', 'business_nm_category(category_id, business_id)'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'page_id' => Yii::t('app', 'Page'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('page_id', $this->page_id);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}