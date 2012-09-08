<?php

/**
 * This is the model base class for the table "block".
 *
 * Columns in table "block" available as properties of the model:
 
      * @property integer $id
      * @property string $title
      * @property string $content
      * @property integer $enabled
      * @property integer $is_widget
      * @property string $widget_class
      * @property string $tag_name
      * @property string $html_options
      * @property string $decoration_css_class
      * @property string $title_css_class
      * @property string $content_css_class
      * @property integer $hide_on_empty
      * @property string $skin
 *
 * There are no model relations.
 */
abstract class BaseBlock extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'block';
    }

    public function rules() {
        return array(
            array('title, content, enabled, is_widget, widget_class, tag_name, html_options, decoration_css_class, title_css_class, content_css_class, hide_on_empty, skin', 'default', 'setOnEmpty' => true, 'value' => null),
            array('enabled, is_widget, hide_on_empty', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 255),
            array('widget_class, tag_name, decoration_css_class, title_css_class, content_css_class, skin', 'length', 'max' => 100),
            array('content, html_options', 'safe'),
            array('id, title, content, enabled, is_widget, widget_class, tag_name, html_options, decoration_css_class, title_css_class, content_css_class, hide_on_empty, skin', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->title;
    }

    public function behaviors() {
        return array();
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'enabled' => Yii::t('app', 'Enabled'),
            'is_widget' => Yii::t('app', 'Is Widget'),
            'widget_class' => Yii::t('app', 'Widget Class'),
            'tag_name' => Yii::t('app', 'Tag Name'),
            'html_options' => Yii::t('app', 'Html Options'),
            'decoration_css_class' => Yii::t('app', 'Decoration Css Class'),
            'title_css_class' => Yii::t('app', 'Title Css Class'),
            'content_css_class' => Yii::t('app', 'Content Css Class'),
            'hide_on_empty' => Yii::t('app', 'Hide On Empty'),
            'skin' => Yii::t('app', 'Skin'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('enabled', $this->enabled);
        $criteria->compare('is_widget', $this->is_widget);
        $criteria->compare('widget_class', $this->widget_class, true);
        $criteria->compare('tag_name', $this->tag_name, true);
        $criteria->compare('html_options', $this->html_options, true);
        $criteria->compare('decoration_css_class', $this->decoration_css_class, true);
        $criteria->compare('title_css_class', $this->title_css_class, true);
        $criteria->compare('content_css_class', $this->content_css_class, true);
        $criteria->compare('hide_on_empty', $this->hide_on_empty);
        $criteria->compare('skin', $this->skin, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}