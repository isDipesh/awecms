<?php

/**
 * This is the model base class for the table "comment_setting".
 *
 * Columns in table "comment_setting" available as properties of the model:

 * @property integer $id
 * @property string $model
 * @property integer $registeredOnly
 * @property integer $useCaptcha
 * @property integer $allowSubcommenting
 * @property integer $premoderate
 * @property string $isSuperuser
 * @property string $orderComments
 * @property integer $useGravatar
 *
 * There are no model relations.
 */
class CommentSetting extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }

    public function tableName() {
        return 'comment_setting';
    }

    public function rules() {
        return array(
            array('model', 'required'),
            array('registeredOnly, useCaptcha, allowSubcommenting, premoderate, isSuperuser, orderComments, useGravatar', 'default', 'setOnEmpty' => true, 'value' => null),
            array('registeredOnly, useCaptcha, allowSubcommenting, premoderate, useGravatar', 'numerical', 'integerOnly' => true),
            array('model', 'length', 'max' => 50),
            array('orderComments', 'length', 'max' => 4),
            array('isSuperuser', 'safe'),
            array('id, model, registeredOnly, useCaptcha, allowSubcommenting, premoderate, isSuperuser, orderComments, useGravatar', 'safe', 'on' => 'search'),
        );
    }

    public function __toString() {
        return (string) $this->model;
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'model' => Yii::t('app', 'Model'),
            'registeredOnly' => Yii::t('app', 'Registered Users Only'),
            'useCaptcha' => Yii::t('app', 'Use Captcha'),
            'allowSubcommenting' => Yii::t('app', 'Allow Nesting'),
            'premoderate' => Yii::t('app', 'Require Premoderation'),
            'isSuperuser' => Yii::t('app', 'PHP Expression for Superuser evaluation'),
            'orderComments' => Yii::t('app', 'Order of Comments'),
            'useGravatar' => Yii::t('app', 'Use Gravatar'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('model', $this->model, true);
        $criteria->compare('registeredOnly', $this->registeredOnly);
        $criteria->compare('useCaptcha', $this->useCaptcha);
        $criteria->compare('allowSubcommenting', $this->allowSubcommenting);
        $criteria->compare('premoderate', $this->premoderate);
        $criteria->compare('isSuperuser', $this->isSuperuser, true);
        $criteria->compare('orderComments', $this->orderComments, true);
        $criteria->compare('useGravatar', $this->useGravatar);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}