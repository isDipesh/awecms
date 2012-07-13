<?php
$this->breadcrumbs = $model->getHierarchyLinks();
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'Update'), 'url' => array('update', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
        array('label' => Yii::t('app', 'Manage'), 'url' => array('admin')),
    );
}
?>

<h1><?php echo $model->title; ?></h1>

<?php
echo nl2br($model->content);
?>

<?php if (count($model->pages)) { ?>
    <h2><?php echo CHtml::link(Yii::t('app', Awecms::pluralize('Sub-Page', 'Sub-Pages', count($model->pages))), array('/page/page')); ?></h2>
    <ul class="sub_pages">
        <?php
        if (is_array($model->pages))
            foreach ($model->pages as $foreignobj) {
                echo '<li>';
                echo CHtml::link($foreignobj->title, array('/page/page/view', 'id' => $foreignobj->id));
            }
        ?>
    </ul>
<?php } ?>

<?php if (count($model->categories)) { ?>
    <h2><?php echo CHtml::link(Yii::t('app', Awecms::pluralize('Category', 'Categories', count($model->categories))), array('/category/category')); ?></h2>
    <ul class="categories">
        <?php
        if (is_array($model->categories))
            foreach ($model->categories as $foreignobj) {
                echo '<li>';
                echo CHtml::link($foreignobj->name, array('/category/category/view', 'id' => $foreignobj->id));
            }
        ?>
    </ul>
<?php } ?>

<?php
//increase view count
$model->views++;
$model->save();