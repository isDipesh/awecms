<?php

class AtNestedSortable extends CWidget {

    public function init() {

        $basePath = Yii::getPathOfAlias('application.modules.user.views.asset');
        $baseUrl = Yii::app()->getAssetManager()->publish($basePath);
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl . '/css/redmond/jquery-ui.css');
        $cs->registerScriptFile($baseUrl . '/js/jquery-ui.min.js');

        Yii::app()->clientScript->registerCoreScript('jquery');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->getModule('menu')->assetsDirectory . '/libs/nestedsortable/jquery.ui.nestedSortable.js');
        //Yii::app()->clientScript->registerScriptFile("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js");
        //Yii::app()->clientScript->registerCssFile('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css');
        //Yii::app()->clientScript->registerScriptFile('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js');
        //Yii::app()->clientScript->registerCoreScript('jquery-ui');
        //Yii::app()->clientScript->registerCssFile(Yii::app()->getModule('menu')->assetsDirectory.'/libs/nestedsortable/nestedSortable.css');
    }

    public function run() {
        
    }

}