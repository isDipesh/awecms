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
                <?php echo $form->label($model,'category'); ?>
                <?php echo $form->textField($model,'category',array('size'=>60,'maxlength'=>64)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'key'); ?>
                <?php echo $form->textField($model,'key',array('size'=>60,'maxlength'=>255)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'value'); ?>
                <?php echo $form->textArea($model,'value',array('rows'=>6, 'cols'=>50)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'type'); ?>
                <?php echo $form->textField($model,'type',array('size'=>20,'maxlength'=>20)); ?>
        </div>
    
        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
