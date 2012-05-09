<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('category')); ?>:
	<?php echo GxHtml::encode($data->category); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('path')); ?>:
	<?php echo GxHtml::encode($data->path); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('enabled')); ?>:
	<?php echo GxHtml::encode($data->enabled); ?>
	<br />

</div>