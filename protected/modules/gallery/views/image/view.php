<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Images') => array('index'),
    Yii::t('app', $model->path),
);if(!isset($this->menu) || $this->menu === array()) {
$this->menu=array(
array('label'=>Yii::t('app', 'Update') , 'url'=>array('update', 'id'=>$model->id)),
array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
/*array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),*/
);
}
?>

<h1><?php echo $model->path; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
'data' => $model,
'attributes' => array(
array(
                        'name'=>'id',
                        'visible'=>Yii::app()->getModule('user')->isAdmin()
                    ),		array(
			'name'=>'page_id',
			'value'=>($model->page !== null)?CHtml::link($model->page->title, array('/page/page/view','id'=>$model->page->id)).' ':'n/a',
			'type'=>'html',
		),
'path',)));?>
        <?php if (count($model->albums)) { ?>
                            <h2><?php echo CHtml::link(Yii::t('app', Awecms::pluralize('Sub-Page', 'Albums', count($model->albums))), array('/gallery/album'));?></h2>
<ul>
			<?php if (is_array($model->albums)) foreach($model->albums as $foreignobj) { 

					echo '<li>';
					echo CHtml::link($foreignobj->id, array('/gallery/album/view','id'=>$foreignobj->id));
							
					}
						?></ul>
            <?php } ?>