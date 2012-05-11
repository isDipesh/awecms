<?php
$url = CJavaScript::quote($this->createUrl('create'), true);
Yii::app()->clientScript
	->registerCoreScript('jquery')
	->registerScript('page-grid-init', "
$('#page-grid-actions button.action-create').live('click', function(){
	document.location.href = '{$url}';
	return false;
});
	");
$this->menu = array(
	array('label' => 'Pages', 'url' => array('index')),
	array('label' => 'Create page', 'url' => array('create')),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Pages</h2>
		<?php $this->renderPartial('_grid', array(
			'model' => $model,
		)); ?>
	</div>
</div>