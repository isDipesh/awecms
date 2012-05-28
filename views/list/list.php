<?php
$this->breadcrumbs=array(
	'Menu'=>array('/menu'),
	'List',
);?>

<a href="/menu/new"><?php echo MenuModule::t("New",array(),"actions");?></a>
<br/><br/>
<?php 
$dataProvider=new CActiveDataProvider('MMenu');

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
	'id'=>'menu-list',
	'itemsTagName'=>'table',
    'itemView'=>'_list',
	'viewData'=>array('id'=>$id),  
    'sortableAttributes'=>array(
        'title'=>'Title',
		'description'=>'Description',
    ),
));
