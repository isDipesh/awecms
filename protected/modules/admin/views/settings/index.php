<?php

$this->breadcrumbs = array(
    'Settings',
);


//print_r($model);
//print_r($settings);

?>

<?php echo $this->renderPartial('_form', array('settings'=>$settings)); ?>