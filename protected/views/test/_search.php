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
                <?php echo $form->label($model,'name'); ?>
                <?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'birthdate'); ?>
                <?php echo $form->textField($model,'birthdate'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'birthtime'); ?>
                <?php echo $form->textField($model,'birthtime'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'enabled'); ?>
                <?php echo $form->textField($model,'enabled'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'status'); ?>
                <?php echo $form->textField($model,'status',array('size'=>9,'maxlength'=>9)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'slogan'); ?>
                <?php echo $form->textArea($model,'slogan',array('rows'=>6, 'cols'=>50)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'content'); ?>
                <?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
        </div>
    
        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
