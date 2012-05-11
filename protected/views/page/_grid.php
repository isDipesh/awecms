<?php $provider = $model->search(); ?>
<div class="inner" id="page-grid-inner">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'page-grid',
		'summaryText' => 'Pages {start} - {end} of {count}',
		'emptyText' => 'There are no data to display',
		'updateSelector' => '#page-grid-actions .pagination a, #page-grid .table thead th a',
		'afterAjaxUpdate' => "js:function(id, data){var id = '#' + id + '-actions'; \$(id).replaceWith(\$(id, '<div>' + data + '</div>'))}",
		'selectableRows' => 0,
		'showTableOnEmpty' => false,
		'dataProvider' => $provider,
		'cssFile' => false,
		'itemsCssClass' => 'table',
		'pagerCssClass' => 'pagination',
		'template' => '{items}',
		'columns' => array(
			'id',
			'author',
			'title',
			'content',
			'excerpt',
			'status',
			/*
			'created_at',
			'modified_at',
			'parent',
			'order',
			'type',
			'comment_status',
			'permission',
			'password',
			*/
			array(
				'class' => 'EButtonColumn',
				'deleteConfirmation' => 'Do you really want to delete this page?',
			),
		),
	)); ?>
	<div class="actions-bar wat-cf" id="page-grid-actions">
		<div class="actions">
			<button class="button action-create" type="button">
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/create.png', 'Create'); ?> Create page
			</button>
		</div>
		<?php $this->widget('application.components.widgets.ELinkPager', array(
			'cssFile' => false,
			'pages' => $provider->getPagination(),
		)); ?>
	</div>
</div>