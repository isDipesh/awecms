<?php

/**
 * This is the model base class for the table "menu_item".
 *
 * Columns in table "menu_item" available as properties of the model:

 * @property integer $id
 * @property integer $menu_id
 * @property integer $parent_id
 * @property string $name
 * @property integer $enabled
 * @property integer $content_id
 * @property string $description
 * @property string $link
 * @property string $role
 *
 * Relations of table "menu_item" available as properties of the model:
 * @property Menu $menu
 * @property MenuItem $parent
 * @property MenuItem $children
 */
class MenuItem extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public function tableName() {
        return 'menu_item';
    }

    public function rules() {
        return array(
            array('name', 'required'),
            array('menu_id, parent_id, enabled, content_id, link', 'default', 'setOnEmpty' => true, 'value' => null),
            array('menu_id, enabled, content_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 128),
            array('link', 'safe'),
            array('id, menu_id, parent_id, name, enabled, content_id, description, link, role', 'safe', 'on' => 'search'),
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
            'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
            'parent' => array(self::BELONGS_TO, 'MenuItem', 'parent_id'),
            'children' => array(self::HAS_MANY, 'MenuItem', 'parent_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'menu_id' => Yii::t('app', 'Menu'),
            'parent_id' => Yii::t('app', 'Parent'),
            'name' => Yii::t('app', 'Name'),
            'enabled' => Yii::t('app', 'Enabled'),
            'content_id' => Yii::t('app', 'Content'),
            'description' => Yii::t('app', 'Description'),
            'link' => Yii::t('app', 'Link/Path'),
            'role' => Yii::t('app', 'Visible to:'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('menu_id', $this->menu_id);
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('enabled', $this->enabled);
        $criteria->compare('content_id', $this->content_id);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('link', $this->link, true);
        $criteria->compare('role', $this->role, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

    public function getMaxRight() {
        return Yii::app()->db->createCommand()
                        ->select('MAX(`rgt`)')
                        ->from($this->tableName())
                        ->queryScalar();
    }

    public function getRoles() {
        $roles = array(
            'all' => 'All',
            'guest' => 'Guest',
            'loggedIn' => 'Logged In',
        );
        if (Yii::app()->hasModule('role')) {
            //return array_merge($roles, array('Roles'=>CHtml::listData(Role::model()->findAll(), 'name', 'name')));
            return array_merge($roles, CHtml::listData(Role::model()->findAll(), 'name', 'name'));
        }
        return $roles;
    }

}
