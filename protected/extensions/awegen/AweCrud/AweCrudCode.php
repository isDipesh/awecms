<?php

Yii::import('system.gii.generators.crud.CrudCode');



class AweCrudCode extends CrudCode {

	public $authtype = 'auth_none';

	public $validation = 0;

	public $baseControllerClass = 'Controller';
        
        public $identificationColumn = '';
        
        public $isJToggleColumnEnabled = true;


}