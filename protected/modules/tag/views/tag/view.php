<?php
$this->pageTitle = $model->name . Awecms::getTitlePrefix();
$this->breadcrumbs = array(
    Yii::t('app', 'All Tags') => array('/tag'),
    Yii::t('app', $model->name),
);
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'View')),
        array('label' => Yii::t('app', 'All Tags'), 'url' => array('/tag')),
        array('label' => Yii::t('app', 'Delete This Tag'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    );
}
?>

<h1><?php echo $model->name; ?></h1>

<?php if (count($model->pages)) { ?>
    <ul>
        <?php
        if (is_array($model->pages))
            foreach ($model->pages as $foreignobj) {

                echo '<li>';
                echo CHtml::link($foreignobj->title, array('/page/page/view', 'id' => $foreignobj->id));
            }
        ?></ul>
<?php } ?>