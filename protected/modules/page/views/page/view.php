<?php
$this->breadcrumbs = $page->getHierarchyLinks();
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'Update'), 'url' => array('update', 'id' => $page->id)),
        array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $page->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
        array('label' => Yii::t('app', 'Manage'), 'url' => array('admin')),
    );
}
?>

<h1><?php echo $page->title; ?></h1>

<?php
echo nl2br($page->content);
?>

<?php if (count($page->pages)) { ?>
    <h2><?php echo CHtml::link(Yii::t('app', Awecms::pluralize('Sub-Page', 'Sub-Pages', count($page->pages))), array('/page/page')); ?></h2>
    <ul class="sub_pages">
        <?php
        if (is_array($page->pages))
            foreach ($page->pages as $foreignobj) {
                echo '<li>';
                echo CHtml::link($foreignobj->title, array('/page/page/view', 'id' => $foreignobj->id));
            }
        ?>
    </ul>
<?php } ?>

<?php if (count($page->categories)) { ?>
    <h2><?php echo CHtml::link(Yii::t('app', Awecms::pluralize('Category', 'Categories', count($page->categories))), array('/category/category')); ?></h2>
    <ul class="categories">
        <?php
        if (is_array($page->categories))
            foreach ($page->categories as $foreignobj) {
                echo '<li>';
                echo CHtml::link($foreignobj->name, array('/category/category/view', 'id' => $foreignobj->id));
            }
        ?>
    </ul>
<?php } ?>