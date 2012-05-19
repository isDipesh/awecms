<?php

Yii::import('application.models._base.BaseTest');

class Test extends BaseTest
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}