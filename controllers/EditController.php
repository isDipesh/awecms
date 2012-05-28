<?php

class EditController extends Controller
{
	public $defaultAction = "edit";
	
	public function actionEdit($id)
	{
		$model=MMenu::model()->findByPk($id);

	    if(isset($_POST['MMenu']))
	    {
	        $model->attributes=$_POST['MMenu'];
	        if($model->validate())
	        {
	        	if($model->save()){
	            	$this->redirect(array('/menu/list/list','id'=>$model->id));
	            }
	        }
	    }
	    $this->render('edit',array('model'=>$model));
	}

}