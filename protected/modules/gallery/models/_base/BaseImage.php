<?php

/**
 * This is the model base class for the table "image".
 *
 * Columns in table "image" available as properties of the model:

 * @property integer $id
 * @property integer $page_id
 * @property string $file
 * @property string $mime_type
 * @property string $size
 * @property string $name
 *
 * Relations of table "image" available as properties of the model:
 * @property Album[] $albums
 * @property Page $page
 */
abstract class BaseImage extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'image';
    }

    public function rules() {
        return array(
            array('page_id, file', 'required'),
            array('mime_type, size, name', 'default', 'setOnEmpty' => true, 'value' => null),
            array('page_id', 'numerical', 'integerOnly' => true),
            array('file', 'safe'),
            array('file, mime_type, size, name', 'length', 'max' => 255),
            array('id, page_id, file, mime_type, size, name', 'safe', 'on' => 'search'),
        );
    }

    public function __toString() {
        return (string) $this->file;
    }

    public function behaviors() {
        return array(
            'page-behavior' => array('class' => 'PageBehavior'),
            'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
        );
    }

    public function relations() {
        return array(
            'albums' => array(self::HAS_MANY, 'Album', 'thumbnail_id'),
            'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'page_id' => Yii::t('app', 'Page'),
            'file' => Yii::t('app', 'File'),
            'mime_type' => Yii::t('app', 'Mime Type'),
            'size' => Yii::t('app', 'Size'),
            'name' => Yii::t('app', 'Name'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('page_id', $this->page_id);
        $criteria->compare('file', $this->file, true);
        $criteria->compare('mime_type', $this->mime_type, true);
        $criteria->compare('size', $this->size, true);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}