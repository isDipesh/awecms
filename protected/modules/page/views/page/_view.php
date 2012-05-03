<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('author')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->author0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('title')); ?>:
	<?php echo GxHtml::encode($data->title); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('content')); ?>:
	<?php echo GxHtml::encode($data->content); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('excerpt')); ?>:
	<?php echo GxHtml::encode($data->excerpt); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_at')); ?>:
	<?php echo GxHtml::encode($data->created_at); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('modified_at')); ?>:
	<?php echo GxHtml::encode($data->modified_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('parent')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->parent0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('order')); ?>:
	<?php echo GxHtml::encode($data->order); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('type')); ?>:
	<?php echo GxHtml::encode($data->type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('comment_status')); ?>:
	<?php echo GxHtml::encode($data->comment_status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('permission')); ?>:
	<?php echo GxHtml::encode($data->permission); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('password')); ?>:
	<?php echo GxHtml::encode($data->password); ?>
	<br />
	*/ ?>

</div>