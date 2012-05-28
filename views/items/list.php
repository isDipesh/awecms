<?php
$this->breadcrumbs=array(
	'Items'=>array('/menu/items'),
	'List',
);?>

<a href="<?php echo $this->createUrl('/menu/items/new',array('id'=>$id));?>"><?php echo MenuModule::t("New",array(),"actions");?></a>
<br/><br/>

<!--<div class="wrapsover">
<div class="wraps" style=""> width:528px;height:340px;overflow: auto -->
<?php // Yii::app()->clientScript->registerScriptFile("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js");?>
<?php Yii::app()->clientScript->registerScriptFile($this->module->assetsDirectory."/libs/json/json2.min.js");?>
<?php $this->widget('mext.AtNestedSortable')?>	
<?php 
$this->widget('mext.AtHerList',array('model'=>$model,'actid'=>$actid));

 
?>
	 
<!--  </div>
</div>-->


<script type="text/javascript">

$('ol.sortable').nestedSortable({
//	disableNesting: 'no-nest',
	forcePlaceholderSize: true,
	handle: 'div',
	items: 'li',
	opacity: .6,
	placeholder: 'placeholder',
	tabSize: 10,
//	tolerance: 'pointer',
//	toleranceElement: '> div'
	
});
</script>








<?php 

/*
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
	'id'=>'menu-items-list',
	'itemsTagName'=>'table',
    'itemView'=>'_list',  
    'sortableAttributes'=>array(
        'title'=>'Title',
		'description'=>'Description',
    ),
));

*/
