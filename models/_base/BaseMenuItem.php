<?php

/**
 * This is the model base class for the table "menu_item".
 *
 * Columns in table "menu_item" available as properties of the model:
 
      * @property integer $id
      * @property integer $menu_id
      * @property integer $parent_id
      * @property integer $depth
      * @property integer $left
      * @property integer $right
      * @property string $name
      * @property integer $enabled
      * @property integer $content_id
      * @property string $description
 *
 * Relations of table "menu_item" available as properties of the model:
 * @property MenuItem $parent
 * @property MenuItem $menuItem
 * @property Menu $menu
 */
abstract class BaseMenuItem extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'menu_item';
    }

    public function rules() {
        return array(
            array('name, description', 'required'),
            array('menu_id, parent_id, depth, left, right, enabled, content_id', 'default', 'setOnEmpty' => true, 'value' => null),
            array('menu_id, parent_id, depth, left, right, enabled, content_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 128),
            array('id, menu_id, parent_id, depth, left, right, name, enabled, content_id, description', 'safe', 'on' => 'search'),
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
            'parent' => array(self::BELONGS_TO, 'MenuItem', 'parent_id'),
            'menuItem' => array(self::HAS_ONE, 'MenuItem', 'parent_id'),
            'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'menu_id' => Yii::t('app', 'Menu'),
            'parent_id' => Yii::t('app', 'Parent'),
            'depth' => Yii::t('app', 'Depth'),
            'left' => Yii::t('app', 'Left'),
            'right' => Yii::t('app', 'Right'),
            'name' => Yii::t('app', 'Name'),
            'enabled' => Yii::t('app', 'Enabled'),
            'content_id' => Yii::t('app', 'Content'),
            'description' => Yii::t('app', 'Description'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('menu_id', $this->menu_id);
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('depth', $this->depth);
        $criteria->compare('left', $this->left);
        $criteria->compare('right', $this->right);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('enabled', $this->enabled);
        $criteria->compare('content_id', $this->content_id);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}