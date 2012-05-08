<?php

$this->breadcrumbs = array(
    'Settings',
);
?>

<?php

$this->widget('EDynamicForm', array('id' => 'id', 'class' => 'settings', 'model' => $settings, 'selector' => true));
//Yii::app()->catchall
?>
