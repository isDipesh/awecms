<?php

/**
 * This is the model base class for the table "menu".
 *
 * Columns in table "menu" available as properties of the model:

 * @property integer $id
 * @property string $name
 * @property integer $enabled
 * @property integer $vertical
 * @property integer $rtl
 * @property integer $upward
 * @property string $theme
 * @property string $description
 *
 * Relations of table "menu" available as properties of the model:
 * @property MenuItem $menuItem
 */
class Menu extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public function tableName() {
        return 'menu';
    }

    public function getThemes() {
        $themeDirs = array_map('basename', glob(Yii::getPathOfAlias('menu.assets.frontend.themes') . '/*', GLOB_ONLYDIR));
        $return = array();
        foreach ($themeDirs as $item) {
            $return[$item] = Awecms::generateFriendlyName($item);
        }
        return $return;
    }

    public function getItems() {
        $tree = array();
        if ($this->enabled) {
            $ref = array();
            $items = MenuItem::model()->findAllByAttributes(array('menu_id' => $this->id, 'enabled' => 1), array('order' => 'lft'));
            foreach ($items as $item) {
                $menuItem = array();
                $menuItem['label'] = $item->name;
                $menuItem['url'] = $item->link;
                $menuItem['role'] = $item->role;
                $menuItem['target'] = $item->target;
                $menuItem['description'] = $item->description;
                if (!$item->parent_id) {
                    $tree[$item->id] = $menuItem;
                    $ref[$item->id] = &$tree[$item->id];
                } else {
                    $ref[$item->parent_id]['items'][$item->id] = $menuItem;
                    $ref[$item->id] = &$ref[$item->parent_id]['items'][$item->id];
                }
            }
        }
        return $tree;
    }

    public function rules() {
        return array(
            array('name', 'required'),
            array('enabled, vertical, rtl, upward, theme, description', 'default', 'setOnEmpty' => true, 'value' => null),
            array('enabled, vertical, rtl, upward', 'numerical', 'integerOnly' => true),
            array('name, theme', 'length', 'max' => 100),
            array('description', 'safe'),
            array('id, name, enabled, vertical, rtl, upward, theme, description', 'safe', 'on' => 'search'),
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
            'menuItems' => array(self::HAS_MANY, 'MenuItem', 'menu_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'enabled' => Yii::t('app', 'Enabled'),
            'vertical' => Yii::t('app', 'Vertical'),
            'rtl' => Yii::t('app', 'Right to Left'),
            'upward' => Yii::t('app', 'Upward'),
            'theme' => Yii::t('app', 'Theme'),
            'description' => Yii::t('app', 'Description'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('enabled', $this->enabled);
        $criteria->compare('vertical', $this->vertical);
        $criteria->compare('rtl', $this->rtl);
        $criteria->compare('upward', $this->upward);
        $criteria->compare('theme', $this->theme, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}