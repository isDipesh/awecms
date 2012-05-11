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
		<h2 class="title">Page's details</h2>
		<div class="inner">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data' => $model,
				'attributes' => array(
					'id',
					'author',
					'title',
					'content',
					'excerpt',
					'status',
					'created_at',
					'modified_at',
					'parent',
					'order',
					'type',
					'comment_status',
					'permission',
					'password',
				),
				'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
				'htmlOptions' => array(
					'class' => 'table',
				),
			)); ?>
		</div>
	</div>
</div>