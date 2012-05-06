<?php

class SettingsController extends Controller
{
	public function actionIndex()
	{
            echo "hey";
            
            
            print_r(Yii::app()->settings->get('admin', 'site_name'));
            die();
            //Yii::app()->settings->set('admin', 'site_name', 'My Site', $toDatabase=true);  
            //die();
            
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}