<?php

Yii::import('system.gii.generators.crud.CrudCode');



class AweCrudCode extends CrudCode {

	public $authtype = 'auth_none';

	public $enable_ajax_validation = 0;

	public $baseControllerClass = 'GxController';


}