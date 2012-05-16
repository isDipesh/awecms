<?php

Yii::import('zii.widgets.CPortlet');

class HTMLWidget extends CPortlet {

    public function run() {
        $content = rand(1, 3);
        $this->render('HTMLWidget', array(
            'content' => $content,
        ));
    }

}