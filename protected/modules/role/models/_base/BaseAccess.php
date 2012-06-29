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
      * @property integer $all
      * @property integer $loggedIn
      * @property integer $guest
      * @property string $rule
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
            array('module, enabled, all, loggedIn, guest, rule', 'default', 'setOnEmpty' => true, 'value' => null),
            array('enabled, all, loggedIn, guest', 'numerical', 'integerOnly' => true),
            array('module, controller, action', 'length', 'max' => 50),
            array('rule', 'length', 'max' => 5),
            array('id, module, controller, action, enabled, all, loggedIn, guest, rule', 'safe', 'on' => 'search'),
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
            'all' => Yii::t('app', 'All'),
            'loggedIn' => Yii::t('app', 'Logged In'),
            'guest' => Yii::t('app', 'Guest'),
            'rule' => Yii::t('app', 'Rule'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('module', $this->module, true);
        $criteria->compare('controller', $this->controller, true);
        $criteria->compare('action', $this->action, true);
        $criteria->compare('enabled', $this->enabled);
        $criteria->compare('all', $this->all);
        $criteria->compare('loggedIn', $this->loggedIn);
        $criteria->compare('guest', $this->guest);
        $criteria->compare('rule', $this->rule, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}