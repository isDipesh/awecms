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
        $this->owner->haha = '1';
        echo "afterFind on " . $this->owner->scenario . "<br/>";
        $this->owner->setAttributes(array('a'=>'b'));
    }

}