<?php

class PageBehavior extends CActiveRecordBehavior {

    public function __construct() {
        echo "Constructed<br/>";
    }

    public function beforeSave($event) {
        echo "beforeSave on " . $this->owner->scenario . "<br/>";
//        print_r($_POST);
//        die();
    }

    public function afterFind($event) {
        echo "afterFind on " . $this->owner->scenario . "<br/>";
    }

}