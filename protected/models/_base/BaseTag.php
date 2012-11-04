<?php

/**
 * This is the model base class for the table "tag".
 *
 * Columns in table "tag" available as properties of the model:
 
      * @property string $id
      * @property string $name
 *
 * There are no model relations.
 */
abstract class BaseTag extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'tag';
    }

    public function rules() {
        return array(
            array('name', 'required'),
            array('name', 'length', 'max' => 255),
            array('id, name', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->name;
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
            'name' => Yii::t('app', 'Name'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}