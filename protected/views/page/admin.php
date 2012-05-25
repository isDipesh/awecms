<?php
$this->breadcrumbs['Pages'] = array('index');
$this->breadcrumbs[] = Yii::t('app', 'Admin');

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('page-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Pages'); ?> </h1>


<ul><li>BelongsTo <a href="/yii/cms/user/user/admin">User</a> </li><li>BelongsTo <a href="/yii/cms/page/admin">Page</a> </li><li>HasOne <a href="/yii/cms/page/admin">Page</a> </li><li>ManyMany <a href="/yii/cms/zero/admin">Zero</a> </li></ul>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button')); ?><div class="search-form" style="display: none">
    <?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
'id'=>'page-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(

        'id',
        'user_id',
        'title',
        'content',
        'status',
        'created_at',
        /*
        'modified_at',
        'parent',
        'order',
        'type',
        'comment_status',
        array(
                    'name'=>'tags_enabled',
                    'value'=>'$data->tags_enabled?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
                            'filter'=>array('0'=>Yii::t('app','No'),'1'=>Yii::t('app','Yes')),
                            ),
        'permission',
        'password',
        'views',
        */

array(
'class'=>'CButtonColumn',
'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('id' => \$data->id))",
'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('id' => \$data->id))",
'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('id' => \$data->id))",
),
),
)); 

 ?>