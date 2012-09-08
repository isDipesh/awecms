<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Blocks') => array('index'),
    Yii::t('app', $model->title),
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

<h1><?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
'data' => $model,
'attributes' => array(
array(
                        'name'=>'id',
                        'visible'=>Yii::app()->getModule('user')->isAdmin()
                    ),'title','content',array(
                        'name'=>'enabled',
                        'type'=>'boolean'
                    ),array(
                        'name'=>'is_widget',
                        'type'=>'boolean'
                    ),'widget_class','tag_name','html_options','decoration_css_class','title_css_class','content_css_class',array(
                        'name'=>'hide_on_empty',
                        'type'=>'boolean'
                    ),'skin',)));?>