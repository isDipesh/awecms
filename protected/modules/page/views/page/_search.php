<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

        <div class="row">
                <?php echo $form->label($model,'id'); ?>
                <?php echo $form->textField($model,'id'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'user_id'); ?>
                <?php echo $form->textField($model,'user_id'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'title'); ?>
                <?php echo $form->textArea($model,'title',array('rows'=>6, 'cols'=>50)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'content'); ?>
                <?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'status'); ?>
                <?php echo $form->textField($model,'status',array('size'=>9,'maxlength'=>9)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'created_at'); ?>
                <?php echo $form->textField($model,'created_at'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'modified_at'); ?>
                <?php echo $form->textField($model,'modified_at'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'parent'); ?>
                <?php echo $form->textField($model,'parent'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'order'); ?>
                <?php echo $form->textField($model,'order'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'type'); ?>
                <?php echo $form->textField($model,'type',array('size'=>20,'maxlength'=>20)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'comment_status'); ?>
                <?php echo $form->textField($model,'comment_status',array('size'=>20,'maxlength'=>20)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'tags_enabled'); ?>
                <?php echo $form->textField($model,'tags_enabled'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'permission'); ?>
                <?php echo $form->textField($model,'permission',array('size'=>20,'maxlength'=>20)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'views'); ?>
                <?php echo $form->textField($model,'views'); ?>
        </div>
    
        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
