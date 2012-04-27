<?php

class YumTranslation extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'translation';
	}

	public function rules()
	{
		return array(
			array('message, translation, language', 'required'),
			array('category', 'default', 'setOnEmpty' => true, 'value' => null),
			array('message, translation, category', 'length', 'max'=>255),
			array('language', 'length', 'max'=>5),
			array('message, translation, language, category', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'message' => Yum::t('Message'),
			'translation' => Yum::t('Translation'),
			'language' => Yum::t('Language'),
			'category' => Yum::t('Category'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('message', $this->message, true);
		$criteria->compare('translation', $this->translation, true);
		$criteria->compare('language', $this->language, true);
		$criteria->compare('category', $this->category, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function beforeValidate() {
		return parent::beforeValidate();	
	}
	public function afterValidate() {
		return parent::afterValidate();	
	}
	public function beforeSave() {
		return parent::beforeSave();	
	}
	public function afterSave() {
		return parent::afterSave();	
	}

}
