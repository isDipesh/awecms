<?php

/**
 * This is the model base class for the table "role".
 *
 * Columns in table "role" available as properties of the model:

 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $active
 *
 * Relations of table "role" available as properties of the model:
 * @property User[] $users
 */
class Role extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'role';
    }

    public function rules() {
        return array(
            array('name', 'required'),
            array('description, active', 'default', 'setOnEmpty' => true, 'value' => null),
            array('active', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 64),
            array('description', 'safe'),
            array('id, name, description, active', 'safe', 'on' => 'search'),
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
            'users' => array(self::MANY_MANY, 'User', 'user_rel_role(role_id, user_id)'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'active' => Yii::t('app', 'Active'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('active', $this->active);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

    public static function is($role) {
        return in_array($role, User::model()->findByPk(Yii::app()->user->id)->roles);
    }

}