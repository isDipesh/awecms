<?php

$this->widget('LatestNews');

$this->widget('Galleria', array(
    'dataProvider' => new CActiveDataProvider('Image', array(
        'criteria' => array(
            'condition' => 'album_id=6',
        )
    )),
    'themeName' => 'classic',
));

$this->block('Introduction');