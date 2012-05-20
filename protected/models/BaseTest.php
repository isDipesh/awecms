<?php

/**
 * This is the model base class for the table "test".
 *
 * Columns in table "test" available as properties of the model:
 
      * @property integer $id
      * @property string $name
      * @property string $birthdate
      * @property string $birthtime
      * @property integer $enabled
      * @property string $status
      * @property string $slogan
      * @property string $content
      * @property string $created_at
      * @property string $changed_at
      * @property string $image
      * @property string $email
      * @property string $uri
 *
 */
abstract class BaseTest extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'test';
    }

    public function rules() {
        return array(
            array('name', 'unique'),
            array('name', 'identificationColumnValidator'),
            array('name, birthdate, birthtime, enabled, status, slogan, content, created_at, changed_at, image, email, uri', 'required'),
            array('enabled', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 50),
            array('status', 'length', 'max' => 9),
            array('email', 'length', 'max' => 100),
            array('uri', 'length', 'max' => 255),
            array('id, name, birthdate, birthtime, enabled, status, slogan, content, created_at, changed_at, image, email, uri', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'birthdate' => Yii::t('app', 'Birthdate'),
            'birthtime' => Yii::t('app', 'Birthtime'),
            'enabled' => Yii::t('app', 'Enabled'),
            'status' => Yii::t('app', 'Status'),
            'slogan' => Yii::t('app', 'Slogan'),
            'content' => Yii::t('app', 'Content'),
            'created_at' => Yii::t('app', 'Created At'),
            'changed_at' => Yii::t('app', 'Changed At'),
            'image' => Yii::t('app', 'Image'),
            'email' => Yii::t('app', 'Email'),
            'uri' => Yii::t('app', 'Uri'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('birthdate', $this->birthdate, true);
        $criteria->compare('birthtime', $this->birthtime, true);
        $criteria->compare('enabled', $this->enabled);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('slogan', $this->slogan, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('changed_at', $this->changed_at, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('uri', $this->uri, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
    public function get_label() {
        return '#' . $this->id;
    }

}