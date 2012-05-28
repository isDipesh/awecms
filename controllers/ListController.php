<?php

class ListController extends Controller
{
	public $defaultAction = "list";	
	
	public function actionList($id="")
	{
		$this->render('list',array('id'=>$id));
	}

}