<?php
$this->menu = array(
	array('label' => 'Pages', 'url' => array('index')),
	array('label' => 'Create page', 'url' => array('create')),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Create new page</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>