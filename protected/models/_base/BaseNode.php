<?php

/**
 * This is the model base class for the table "node".
 *
 * Columns in table "node" available as properties of the model:
 
      * @property integer $id
      * @property string $title
      * @property integer $id_parent
      * @property string $description
      * @property integer $position
 *
 * There are no model relations.
 */
abstract class BaseNode extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'node';
    }

    public function rules() {
        return array(
            array('title, id_parent, description, position', 'required'),
            array('id_parent, position', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 255),
            array('id, title, id_parent, description, position', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->title;
    }

    public function behaviors() {
        return array();
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'id_parent' => Yii::t('app', 'Id Parent'),
            'description' => Yii::t('app', 'Description'),
            'position' => Yii::t('app', 'Position'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('id_parent', $this->id_parent);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('position', $this->position);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}