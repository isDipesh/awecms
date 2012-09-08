<?php

/**
 * This is the model base class for the table "image".
 *
 * Columns in table "image" available as properties of the model:
 
      * @property integer $id
      * @property integer $page_id
      * @property string $path
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
            array('page_id, path', 'required'),
            array('page_id', 'numerical', 'integerOnly' => true),
            array('path', 'length', 'max' => 255),
            array('id, page_id, path', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->path;
    }

    public function behaviors() {
        return array(
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
            'path' => Yii::t('app', 'Path'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('page_id', $this->page_id);
        $criteria->compare('path', $this->path, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}