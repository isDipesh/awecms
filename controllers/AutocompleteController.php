<?php

class AutocompleteController extends Controller
{


	public function actionControllers($term)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('menu_id',1);
		$criteria->compare('controller',$term,true);
		$criteria->group = 'controller';
		$model=MMenuItems::model()->findAll($criteria);
		$i=0;
		$ret=array();
		foreach($model AS $row):
			$ret[$i]=$row->controller;
		$i++;	
		endforeach;
		echo json_encode($ret);
	}
	
	public function actionActions($term)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('menu_id',1);
		$criteria->compare('action',$term,true);
		$criteria->group = 'action';
		$model=MMenuItems::model()->findAll($criteria);
		$i=0;
		$ret=array();
		foreach($model AS $row):
			$ret[$i]=$row->action;
		$i++;	
		endforeach;
		echo json_encode($ret);
	}

	public function actionVarnames($term)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('menu_id',1);
		$criteria->compare('var_name',$term,true);
		$criteria->group = 'var_name';
		$model=MMenuItems::model()->findAll($criteria);
		$i=0;
		$ret=array();
		foreach($model AS $row):
			$ret[$i]=$row->var_name;
		$i++;	
		endforeach;
		echo json_encode($ret);
	}
	
	public function actionVarids($term)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('name',$term,true);
		$model=Content::model()->findAll($criteria);
		$i=0;
		$ret=array();
		$ret[$i]="-----CONTENTS-----";
		$i++;
		
		foreach($model AS $row):
			$ret[$i]=$row->name;
		$i++;	
		endforeach;
		echo json_encode($ret);
	}
	
	public function actionConts($term)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('name',$term,true);
		$model=Content::model()->findAll($criteria);
		$i=0;
		$ret=array();
		$ret[$i]="-----CONTENTS-----";
		$i++;
		
		foreach($model AS $row):
			$ret[$i]=$row->name;
		$i++;	
		endforeach;
		
		$ret[$i]="-----ACTIONS-----";
		$i++;
		$criteria=new CDbCriteria;
		$criteria->compare('menu_id',1);
		$criteria->compare('action',"<> ");
		$criteria->compare('action',$term,true);
		$criteria->group = 'action';
		$model=MMenuItems::model()->findAll($criteria);

		foreach($model AS $row):
			$ret[$i]=$row->action;
		$i++;	
		endforeach;

		
		
		
		echo json_encode($ret);
	}
}