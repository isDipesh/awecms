<?php

/**
 * This is the model base class for the table "menu".
 *
 * Columns in table "menu" available as properties of the model:
 
      * @property integer $id
      * @property string $name
      * @property integer $vertical
      * @property integer $rtl
      * @property integer $upward
      * @property string $theme
      * @property string $items
 *
 */
abstract class BaseMenu extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'menu';
    }

    public function rules() {
        return array(
            array('name', 'required'),
            array('vertical, rtl, upward, theme, items', 'default', 'setOnEmpty' => true, 'value' => null),
            array('vertical, rtl, upward', 'numerical', 'integerOnly' => true),
            array('name, theme', 'length', 'max' => 100),
            array('items', 'safe'),
            array('id, name, vertical, rtl, upward, theme, items', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID:'),
            'name' => Yii::t('app', 'Name:'),
            'vertical' => Yii::t('app', 'Vertical?'),
            'rtl' => Yii::t('app', 'Right to Left?'),
            'upward' => Yii::t('app', 'Upward?'),
            'theme' => Yii::t('app', 'Theme:'),
            'items' => Yii::t('app', 'Items:'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('vertical', $this->vertical);
        $criteria->compare('rtl', $this->rtl);
        $criteria->compare('upward', $this->upward);
        $criteria->compare('theme', $this->theme, true);
        $criteria->compare('items', $this->items, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}