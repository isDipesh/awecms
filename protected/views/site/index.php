<?php

//$this->widget('HTMLWidget', array('title' => '1'));

$this->widget('application.extensions.SimpleTreeWidget', array(
    'model' => Node::model()->search(),
    
));