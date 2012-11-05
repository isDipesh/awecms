<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Categories') => array('/category'),
    Yii::t('app', $model->name),
);
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'View Category')),
        array('label' => Yii::t('app', 'Update This Category'), 'url' => array('update', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Delete This Category'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'All Categories'), 'url' => array('/category')),
        array('label' => Yii::t('app', 'Create New Category'), 'url' => array('/category/category/create')),
        array('label' => Yii::t('app', 'Manage All Categories'), 'url' => array('/category/category/manage')),
    );
}
?>

<h1><?php echo $model->name; ?></h1>
<?php echo $model->description; ?>

<?php if (count($model->pages)) { ?>
    <ul>
        <?php
        if (is_array($model->pages))
            foreach ($model->pages as $foreignobj) {
                echo '<li>';
                echo CHtml::link($foreignobj->title, $foreignobj->getPath());
                echo '</li>';
            }
        ?></ul>
<?php } ?>