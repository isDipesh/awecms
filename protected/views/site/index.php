<?php

$data = new CActiveDataProvider('Image', array(
            'criteria' => array(
                'condition' => 'album_id=6',
            )
        ));
$this->widget('Galleria', array(
    'dataProvider' => $data,
    'themeName' => 'classic',
));
?>