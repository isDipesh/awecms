<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Business Categories') => array('/directory'),
    Yii::t('app', $model->page->title),
);
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'View')),
        array('label' => Yii::t('app', 'Update'), 'url' => array('update', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'List'), 'url' => array('index')),
        array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
        array('label' => Yii::t('app', 'Manage'), 'url' => array('manage')),
    );
}
?>

<?php
$this->widget('PageView', array(
    'model' => $model,
    'fields' => array('title', 'content'),
));
$page = $model->page;
if (count($page->pages)) {
    ?>
    <h2><?php echo CHtml::link(Yii::t('app', Awecms::pluralize('Subcategory', 'Subcategories', $page->pages)), array('/directory/categories')); ?></h2>
    <ul class="sub_pages">
        <?php
        if (is_array($page->pages))
            foreach ($page->pages as $foreignobj) {
                echo '<li>';
                echo CHtml::link($foreignobj->title, array('/directory/categories/view', 'id' => $model->id));
            }
        ?>
    </ul>
    <?php
}
?>
<?php if (count($model->businesses)) { ?>
    <h2><?php echo CHtml::link(Yii::t('app', Awecms::pluralize('Sub-Page', 'Businesses', count($model->businesses))), array('/directory/business')); ?></h2>
    <ul>
        <?php
        if (is_array($model->businesses))
            foreach ($model->businesses as $foreignobj) {

                echo '<li>';
                echo CHtml::link($foreignobj->phone, array('/directory/business/view', 'id' => $foreignobj->id));
            }
        ?></ul>
<?php } ?>