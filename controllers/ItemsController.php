<?php

class ItemsController extends Controller
{
	public function actionList($id,$actid='')
	{
		$criteria = new CDbCriteria;
		$criteria->compare('menu_id',$id);

		$model = MMenuItems::model()->findAll($criteria);
		$this->render('list',array('model'=>$model,'id'=>$id,'actid'=>$actid));
	}
	
	public function actionNew($id)
	{
	    $model=new MMenuItems;
	
	    if(isset($_POST['MMenuItems']))
	    {
	        $model->attributes=$_POST['MMenuItems'];
	        if($model->validate())
	        {
	            
	            if($model->save()){
	            	$this->redirect(array('/menu/items/list','id'=>$id,'actid'=>$model->id));
	            }
	        }
	    }
	    $this->render('new',array('model'=>$model,'id'=>$id));
	}
	
	public function actionEdit($id)
	{
	    $model=MMenuItems::model()->findByPk($id);
	
	    if(isset($_POST['MMenuItems']))
	    {
	        $model->attributes=$_POST['MMenuItems'];
	        if($model->validate())
	        {
	            
	            if($model->save()){
	            	$this->redirect(array('/menu/items/list','id'=>$model->menu_id,'actid'=>$id));
	            }
	        }
	    }
	    $this->render('edit',array('model'=>$model,'id'=>$id));
	}
	public function actionControllers($term='')
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
	
	public function actionActions($term='')
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
	
	public function actionVarnames($term='')
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
}