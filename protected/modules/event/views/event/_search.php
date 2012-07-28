<div class="wide form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'venue'); ?>
		<?php echo $form->textArea($model,'venue',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'start'); ?>
		<?php $this->widget('CJuiDateTimePicker',
						 array(
							'model'=>$model,
                                                        'name'=>'Event[start]',
							//'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
                                                        'language'=> 'en',
							'value'=>$model->start,
                                                        'mode' => 'datetime',
							'options'=>array(
                                                                        'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                                                                        'showButtonPanel'=>true,
                                                                        'changeYear'=>true,
                                                                        'changeMonth'=>true,
                                                                        'dateFormat'=>'yy-mm-dd',
                                                                        ),
                                                    )
					);
					; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'end'); ?>
		<?php $this->widget('CJuiDateTimePicker',
						 array(
							'model'=>$model,
                                                        'name'=>'Event[end]',
							//'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
                                                        'language'=> 'en',
							'value'=>$model->end,
                                                        'mode' => 'datetime',
							'options'=>array(
                                                                        'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                                                                        'showButtonPanel'=>true,
                                                                        'changeYear'=>true,
                                                                        'changeMonth'=>true,
                                                                        'dateFormat'=>'yy-mm-dd',
                                                                        ),
                                                    )
					);
					; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'organizer'); ?>
		<?php echo $form->textArea($model,'organizer',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'url'); ?>
		<?php echo $form->textArea($model,'url',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'page_id'); ?>
		<?php echo $form->dropDownList($model, 'page', CHtml::listData(Page::model()->findAll(),'id', 'title')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->