<?php
class AtNestedSortable extends CWidget
{
	public function init()
    {
        Yii::app()->clientScript->registerScriptFile("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js");
    	Yii::app()->clientScript->registerCssFile('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css');
    	Yii::app()->clientScript->registerScriptFile('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js');
    //	Yii::app()->clientScript->registerCssFile(Yii::app()->getModule('menu')->assetsDirectory.'/libs/nestedsortable/nestedSortable.css');
    	Yii::app()->clientScript->registerScriptFile(Yii::app()->getModule('menu')->assetsDirectory.'/libs/nestedsortable/jquery.ui.nestedSortable.js');
    }
    
    public function run()
    {
    
    }
}