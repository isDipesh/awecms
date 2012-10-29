<?php

$this->widget('Galleria', array(
    'dataProvider' => new CActiveDataProvider('Image', array(
        'criteria' => array(
            'condition' => 'album_id=11',
        )
    )),
    'themeName' => 'classic',
));

$this->block('Introduction');

$this->widget('NepaliPatro');
