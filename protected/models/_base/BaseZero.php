<?php

/**
 * This is the model base class for the table "zero".
 *
 * Columns in table "zero" available as properties of the model:
 
      * @property integer $id
      * @property string $name
 *
 * Relations of table "zero" available as properties of the model:
 * @property Page[] $pages
 */
abstract class BaseZero extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'zero';
    }

    public function rules() {
        return array(
            array('name', 'required'),
            array('id, name', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->name;
    }

    public function behaviors() {
        return array(                );
    }

    public function relations() {
        return array(
            'pages' => array(self::MANY_MANY, 'Page', 'page_nm_zero(zero_id, page_id)'),
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

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}