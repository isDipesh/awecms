<?php
$this->breadcrumbs = array(
    Yii::t('app', 'News') => array('index'),
    Yii::t('app', $model->source) => array('view', 'id' => $model->id),
    Yii::t('app', 'Update'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    );
?>

<h1> <?php echo Yii::t('app', 'Update'); ?> <?php echo $model->source; ?> </h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model,
));
?>