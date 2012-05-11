<?php
$this->menu = array(
	array('label' => 'Pages', 'url' => array('index')),
	array('label' => 'Create page', 'url' => array('create')),
	array('label' => 'Update page', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete page', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this page?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Update page</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>