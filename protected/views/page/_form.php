<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'page-form',
	'enableAjaxValidation' => false,
	'focus' => array($model, 'author'),
	'htmlOptions' => array(
		'class' => 'form',
	),
)); ?>
		
	<div class="group">
		<?php if($model->hasErrors('author')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'author', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('author')): ?>
				<span class="error"><?php echo $model->getError('author'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'author', array('class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('title')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'title', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('title')): ?>
				<span class="error"><?php echo $model->getError('title'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textArea($model, 'title', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('content')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'content', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('content')): ?>
				<span class="error"><?php echo $model->getError('content'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textArea($model, 'content', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('excerpt')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'excerpt', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('excerpt')): ?>
				<span class="error"><?php echo $model->getError('excerpt'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textArea($model, 'excerpt', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('status')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'status', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('status')): ?>
				<span class="error"><?php echo $model->getError('status'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'status', array('size' => 20, 'maxlength' => 20, 'class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('created_at')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'created_at', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('created_at')): ?>
				<span class="error"><?php echo $model->getError('created_at'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'created_at', array('class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('modified_at')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'modified_at', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('modified_at')): ?>
				<span class="error"><?php echo $model->getError('modified_at'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'modified_at', array('class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('parent')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'parent', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('parent')): ?>
				<span class="error"><?php echo $model->getError('parent'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'parent', array('class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('order')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'order', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('order')): ?>
				<span class="error"><?php echo $model->getError('order'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'order', array('class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('type')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'type', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('type')): ?>
				<span class="error"><?php echo $model->getError('type'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'type', array('size' => 20, 'maxlength' => 20, 'class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('comment_status')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'comment_status', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('comment_status')): ?>
				<span class="error"><?php echo $model->getError('comment_status'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'comment_status', array('size' => 20, 'maxlength' => 20, 'class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('permission')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'permission', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('permission')): ?>
				<span class="error"><?php echo $model->getError('permission'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'permission', array('size' => 20, 'maxlength' => 20, 'class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('password')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'password', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('password')): ?>
				<span class="error"><?php echo $model->getError('password'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->passwordField($model, 'password', array('size' => 20, 'maxlength' => 20, 'class' => 'text_field')); ?>
	</div>
	
	<div class="group navform wat-cf">
		<button class="button" type="submit">
			<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/save.png', $model->isNewRecord ? 'Create' : 'Save'); ?> <?php echo $model->isNewRecord ? 'Create' : 'Save'; ?>
		</button>
		<span class="text_button_padding">or</span>
		<?php echo CHtml::link('Cancel', array('index'), array('class' => 'text_button_padding link_button')); ?>
	</div>
<?php $this->endWidget(); ?>