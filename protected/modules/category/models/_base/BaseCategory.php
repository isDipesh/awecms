<?php

/**
 * This is the model base class for the table "category".
 *
 * Columns in table "category" available as properties of the model:
 
      * @property integer $id
      * @property string $name
      * @property string $description
 *
 * Relations of table "category" available as properties of the model:
 * @property Page[] $pages
 */
abstract class BaseCategory extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'category';
    }

    public function rules() {
        return array(
            array('name', 'required'),
            array('description', 'default', 'setOnEmpty' => true, 'value' => null),
            array('name', 'length', 'max' => 50),
            array('description', 'length', 'max' => 255),
            array('id, name, description', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->name;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'pages' => array(self::MANY_MANY, 'Page', 'page_nm_category(category_id, page_id)'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}