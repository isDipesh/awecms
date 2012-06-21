<?php

/**
 * This is the model base class for the table "access".
 *
 * Columns in table "access" available as properties of the model:
 
      * @property integer $id
      * @property integer $role_id
      * @property string $module
      * @property string $controller
      * @property string $action
 *
 * Relations of table "access" available as properties of the model:
 * @property Role $role
 */
abstract class BaseAccess extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'access';
    }

    public function rules() {
        return array(
            array('role_id, controller, action', 'required'),
            array('module', 'default', 'setOnEmpty' => true, 'value' => null),
            array('role_id', 'numerical', 'integerOnly' => true),
            array('module, controller, action', 'length', 'max' => 50),
            array('id, role_id, module, controller, action', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->module;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'role' => array(self::BELONGS_TO, 'Role', 'role_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'role_id' => Yii::t('app', 'Role'),
            'module' => Yii::t('app', 'Module'),
            'controller' => Yii::t('app', 'Controller'),
            'action' => Yii::t('app', 'Action'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('role_id', $this->role_id);
        $criteria->compare('module', $this->module, true);
        $criteria->compare('controller', $this->controller, true);
        $criteria->compare('action', $this->action, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}