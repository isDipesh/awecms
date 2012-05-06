<?php

class Awecms {

    public static function getSiteName() {
        if (Yii::app()->settings->get('site', 'name'))
            return Yii::app()->settings->get('site', 'name');
        else
            return Yii::app()->name;
    }

}

?>
