<?php

Yii::import('application.models._base.BaseSlug');

class Slug extends BaseSlug
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}