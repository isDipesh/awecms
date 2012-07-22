<?php

/**
 * This is the model base class for the table "news".
 *
 * Columns in table "news" available as properties of the model:

 * @property integer $id
 * @property integer $page_id
 * @property string $source
 *
 * Relations of table "news" available as properties of the model:
 * @property Page $page
 */
abstract class BaseNews extends Page {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'news';
    }

    public function rules() {
        return array(
            array('page_id, source', 'required'),
            array('page_id', 'numerical', 'integerOnly' => true),
            array('source', 'length', 'max' => 255),
            array('id, page_id, source', 'safe', 'on' => 'search'),
        );
    }

    public function __toString() {
        return (string) $this->source;
    }

    public function behaviors() {
        return array(
            'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior'),
            'page-behavior' => array('class' => 'PageBehavior')
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
            'page_id' => Yii::t('app', 'Page'),
            'source' => Yii::t('app', 'Source'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('page_id', $this->page_id);
        $criteria->compare('source', $this->source, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}