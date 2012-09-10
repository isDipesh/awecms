<?php

$data = new CActiveDataProvider('Image');
$this->widget('Galleria', array(
    'dataProvider' => $data,
    
));
?>