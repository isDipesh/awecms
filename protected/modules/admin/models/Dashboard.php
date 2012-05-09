<?php

Yii::import('application.modules.admin.models._base.BaseDashboard');

class Dashboard extends BaseDashboard
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}