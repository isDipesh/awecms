<?php

/**
 * This is the model base class for the table "album".
 *
 * Columns in table "album" available as properties of the model:

 * @property integer $id
 * @property integer $page_id
 * @property integer $thumbnail_id
 *
 * Relations of table "album" available as properties of the model:
 * @property Image $thumbnail
 * @property Page $page
 */
abstract class BaseAlbum extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'album';
    }

    public function rules() {
        return array(
            array('page_id', 'required'),
            array('page_id, thumbnail_id', 'numerical', 'integerOnly' => true),
            array('id, page_id, thumbnail_id', 'safe', 'on' => 'search'),
        );
    }

    public function __toString() {
        return (string) $this->page->title;
    }

    public function behaviors() {
        return array(
            'page-behavior' => array('class' => 'PageBehavior'),
            'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
        );
    }

    public function relations() {
        return array(
            'thumbnail' => array(self::BELONGS_TO, 'Image', 'thumbnail_id'),
            'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'page_id' => Yii::t('app', 'Page'),
            'thumbnail_id' => Yii::t('app', 'Thumbnail'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('page_id', $this->page_id);
        $criteria->compare('thumbnail_id', $this->thumbnail_id);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}