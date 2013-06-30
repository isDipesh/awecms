<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Business Directory') => array('/directory'),
    Yii::t('app', $model->title),
);
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'List All'), 'url' => array('/directory/business')),
        array('label' => Yii::t('app', 'Add New'), 'url' => array('create')),
        array('label' => Yii::t('app', 'Manage All'), 'url' => array('manage')),
        array('label' => Yii::t('app', 'All Categories'), 'url' => array('/directory/categories')),
        array('label' => Yii::t('app', 'Create New Category'), 'url' => array('/directory/categories/create')),
        array('label' => Yii::t('app', 'Manage All Categories'), 'url' => array('/directory/categories/manage')),
        array('label' => Yii::t('app', 'View')),
        array('label' => Yii::t('app', 'Update'), 'url' => array('update', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    );
}
?>

<h1><?php echo $model->title; ?></h1>
<?php
if ($model->page->user_id == Yii::app()->user->id) {
    echo CHtml::link(Yii::t('app', 'Edit this entry'), array('/directory/business/update', 'id' => $model->id));
}
?>
<hr />
<?php
if (isset($model->image)) {
    ?>
    <img class="thumb" src="<?php echo Yii::app()->baseUrl . '/uploads/directory/' . $model->image; ?>" alt="<?php echo $model->title ?>"/>
    <?php
}
?>
<br>
<?php
if (isset($model->phone))
    echo '<b>'.Yii::t('app', 'Phone') . '</b>: ' . $model->phone . '<br/>';
?>
<?php
if (isset($model->fax))
    echo '<b>'.Yii::t('app', 'Fax') . '</b>: ' . $model->fax . '<br/>';;
?>
<?php
if (isset($model->email))
    echo '<b>'.Yii::t('app', 'Email') . '</b>: ' . CHtml::mailto($model->email) . '<br/>';;
?>
<?php
if (isset($model->website))
    echo '<b>'.Yii::t('app', 'Website') . '</b>: ' . CHtml::link($model->website, $model->website, array("target" => "_blank")) . '<br/>';;
?>
<?php
if (isset($model->address))
    echo '<b>'.Yii::t('app', 'Address') . '</b>:<br/>' . nl2br($model->address) . '<br/>';;
?>
<?php
if (isset($model->district_id))
    echo '<b>'.Yii::t('app', 'District') . '</b>: ' . $model->district . '<br/>';;
?>

<div class="rte-text">
    <?php echo $model->description; ?>
</div>

<?php if (count($model->businessCategories)) { ?>
    <h3><?php echo Yii::t('app', Awecms::pluralize('Category', 'Categories', $model->businessCategories)); ?>:</h3>
    <?php
    if (is_array($model->businessCategories))
        foreach ($model->businessCategories as $foreignobj) {

            echo '<div class="left">';
            echo CHtml::link($foreignobj->title, array('/directory/categories/view', 'id' => $foreignobj->id));
            echo '</div>';
        }
    ?>
<?php } ?>