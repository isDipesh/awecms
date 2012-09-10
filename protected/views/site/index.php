<?php

$data = new CActiveDataProvider('Image');
$this->widget('EGalleria', array(
    'dataProvider' => $data,
));
?>