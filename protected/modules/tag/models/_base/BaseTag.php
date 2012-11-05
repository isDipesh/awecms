<?php

/**
 * This is the model base class for the table "tag".
 *
 * Columns in table "tag" available as properties of the model:
 
      * @property string $id
      * @property string $name
      * @property integer $user_id
      * @property integer $count
 *
 * Relations of table "tag" available as properties of the model:
 * @property Page[] $pages
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
            array('name, user_id, count', 'required'),
            array('user_id, count', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 255),
            array('id, name, user_id, count', 'safe', 'on' => 'search'),
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
            'pages' => array(self::MANY_MANY, 'Page', 'page_nm_tag(tag_id, page_id)'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'user_id' => Yii::t('app', 'User'),
            'count' => Yii::t('app', 'Count'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('count', $this->count);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}