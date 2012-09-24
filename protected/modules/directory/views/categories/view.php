<?php
$this->breadcrumbs = $model->getHierarchyLinks();

if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'List All'), 'url' => array('/directory/business')),
        array('label' => Yii::t('app', 'Add New'), 'url' => array('/directory/business/create')),
        array('label' => Yii::t('app', 'Manage All'), 'url' => array('/directory/business/manage')),
        array('label' => Yii::t('app', 'All Categories'), 'url' => array('/directory/categories')),
        array('label' => Yii::t('app', 'Create New Category'), 'url' => array('/directory/categories/create')),
        array('label' => Yii::t('app', 'Manage All Categories'), 'url' => array('/directory/categories/manage')),
        array('label' => Yii::t('app', 'View Category')),
        array('label' => Yii::t('app', 'Update This Category'), 'url' => array('update', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Delete This Category'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
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
    <h2><?php echo Yii::t('app', Awecms::pluralize('Subcategory', 'Subcategories', $page->pages)); ?>:</h2>
    <ul class="sub_pages">
        <?php
        if (is_array($page->pages))
            foreach ($page->pages as $foreignobj) {
                $bizcat = BusinessCategory::model()->findByAttributes(array('page_id' => $foreignobj->id));
                echo '<li>';
                echo CHtml::link($foreignobj->title, array('/directory/categories/view', 'id' => $bizcat->id));
                echo '</li>';
            }
        ?>
    </ul>
    <?php
}
?>
<?php if (count($model->businesses)) { ?>
    <h2><?php echo Yii::t('app', Awecms::pluralize('Business', 'Businesses', $model->businesses)); ?>:</h2>
    <ul>
        <?php
        if (is_array($model->businesses))
            foreach ($model->businesses as $foreignobj) {

                echo '<li>';
                echo CHtml::link($foreignobj->title, array('/directory/business/view', 'id' => $foreignobj->id));
                echo '</li>';
            }
        ?>
    </ul>
<?php } ?>