<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Businesses') => array('index'),
    Yii::t('app', $model->phone),
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

<h1><?php echo $model->title; ?></h1>

<?php
if (isset($model->image)) {
    ?>
    <img src="<?php echo Yii::app()->baseUrl.'/uploads/directory/'.$model->image;?>" alt="<?php echo $model->title?>"/>
    <?php
}
?>

<?php
if (isset($model->phone))
    echo Yii::t('app', 'Phone') . ': ' . $model->phone;
?>
<br/>
<?php
if (isset($model->fax))
    echo Yii::t('app', 'Fax') . ': ' . $model->fax;
?>
<br/>
<?php
if (isset($model->email))
    echo Yii::t('app', 'Email') . ': ' . CHtml::mailto($model->email);
?>
<br/>
<?php
if (isset($model->website))
    echo Yii::t('app', 'Website') . ': ' . CHtml::link($model->website, $model->website, array("target" => "_blank"));
?>
<br/>
<br/>
<?php
if (isset($model->address))
    echo Yii::t('app', 'Address') . ':<br/>' . nl2br($model->address);
?>
<br/>
<?php
if (isset($model->district_id))
    echo Yii::t('app', 'District') . ': ' . $model->district;
?>
<br/>
<br/>
<?php echo $model->description; ?>


<?php if (count($model->businessCategories)) { ?>
    <h2><?php echo Yii::t('app', Awecms::pluralize('Category', 'Categories', $model->businessCategories)); ?>:</h2>
    <ul>
        <?php
        if (is_array($model->businessCategories))
            foreach ($model->businessCategories as $foreignobj) {

                echo '<li>';
                echo CHtml::link($foreignobj->title, array('/directory/categories/view', 'id' => $foreignobj->id));
                echo '</li>';
            }
        ?>
    </ul>
<?php } ?>