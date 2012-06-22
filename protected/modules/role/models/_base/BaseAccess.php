<?php

/**
 * This is the model base class for the table "access".
 *
 * Columns in table "access" available as properties of the model:
 
      * @property integer $id
      * @property string $module
      * @property string $controller
      * @property string $action
      * @property integer $enabled
 *
 * Relations of table "access" available as properties of the model:
 * @property Role[] $roles
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
            array('controller, action', 'required'),
            array('module, enabled', 'default', 'setOnEmpty' => true, 'value' => null),
            array('enabled', 'numerical', 'integerOnly' => true),
            array('module, controller, action', 'length', 'max' => 50),
            array('id, module, controller, action, enabled', 'safe', 'on' => 'search'),
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
            'roles' => array(self::MANY_MANY, 'Role', 'access_nm_role(access_id, role_id)'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'module' => Yii::t('app', 'Module'),
            'controller' => Yii::t('app', 'Controller'),
            'action' => Yii::t('app', 'Action'),
            'enabled' => Yii::t('app', 'Enabled'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('module', $this->module, true);
        $criteria->compare('controller', $this->controller, true);
        $criteria->compare('action', $this->action, true);
        $criteria->compare('enabled', $this->enabled);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}