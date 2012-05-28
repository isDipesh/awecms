<?php

class NewController extends Controller
{
	public $defaultAction = "new";
	
	public function actionNew()
	{
		$model=new Menu;

	    if(isset($_POST['Menu']))
	    {
	        $model->attributes=$_POST['Menu'];
	        if($model->validate())
	        {
	            if($model->save()){
	            	$this->redirect(array('/menu/list/list','id'=>$model->id));
	            }
	        }
	    }
	    $this->render('new',array('model'=>$model));
	}

}