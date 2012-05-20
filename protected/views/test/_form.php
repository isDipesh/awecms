<div class="form">
    <p class="note">
        <?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
    </p>

    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'test-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    )); 

    echo $form->errorSummary($model);
    ?>
    
        <div class="row">
            <?php echo $form->labelEx($model,'name'); ?>
            <?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
            <?php echo $form->error($model,'name'); ?>
        </div><!-- row -->
        
        <div class="row">
            <?php echo $form->labelEx($model,'birthdate'); ?>
            <?php $this->widget('CJuiDateTimePicker',
						 array(
								 'model'=>'$model',
                                                                 'name'=>'birthdate',
								 'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
								 'value'=>$model->birthdate,
								 'htmlOptions'=>array('size'=>10, 'style'=>'width:80px !important'),
                                                                 'mode' => 'date',
								 'options'=>array(
                                                                         'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
									 'showButtonPanel'=>true,
									 'changeYear'=>true,
									 'changeYear'=>true,
									 'dateFormat'=>'yy-mm-dd',
									 ),
								 )
							 );
					; ?>
            <?php echo $form->error($model,'birthdate'); ?>
        </div><!-- row -->
        
        <div class="row">
            <?php echo $form->labelEx($model,'birthtime'); ?>
            <?php $this->widget('CJuiDateTimePicker',
						 array(
								 'model'=>'$model',
                                                                 'name'=>'birthtime',
								 'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
								 'value'=>$model->birthtime,
								 'htmlOptions'=>array('size'=>10, 'style'=>'width:80px !important'),
                                                                 'mode' => 'datetime',
								 'options'=>array(
                                                                         'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
									 'showButtonPanel'=>true,
									 'changeYear'=>true,
									 'changeYear'=>true,
									 'dateFormat'=>'yy-mm-dd',
									 ),
								 )
							 );
					; ?>
            <?php echo $form->error($model,'birthtime'); ?>
        </div><!-- row -->
        
        <div class="row">
            <?php echo $form->labelEx($model,'enabled'); ?>
            <?php echo $form->checkBox($model,'enabled'); ?>
            <?php echo $form->error($model,'enabled'); ?>
        </div><!-- row -->
        
        <div class="row">
            <?php echo $form->labelEx($model,'status'); ?>
            <?php echo CHtml::activeDropDownList($model, 'status', array(
			'published' => Yii::t('app', 'Published') ,
			'deleted' => Yii::t('app', 'Deleted') ,
			'drafted' => Yii::t('app', 'Drafted') ,
			'closed' => Yii::t('app', 'Closed') ,
)); ?>
            <?php echo $form->error($model,'status'); ?>
        </div><!-- row -->
        
        <div class="row">
            <?php echo $form->labelEx($model,'slogan'); ?>
            <?php echo $form->textArea($model,'slogan',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'slogan'); ?>
        </div><!-- row -->
        
        <div class="row">
            <?php echo $form->labelEx($model,'content'); ?>
            <?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'content'); ?>
        </div><!-- row -->
        
        <div class="row">
            <?php echo $form->labelEx($model,'created_at'); ?>
            <?php $this->widget('CJuiDateTimePicker',
						 array(
								 'model'=>'$model',
                                                                 'name'=>'created_at',
								 'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
								 'value'=>$model->created_at,
								 'htmlOptions'=>array('size'=>10, 'style'=>'width:80px !important'),
                                                                 'mode' => 'datetime',
								 'options'=>array(
                                                                         'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
									 'showButtonPanel'=>true,
									 'changeYear'=>true,
									 'changeYear'=>true,
									 'dateFormat'=>'yy-mm-dd',
									 ),
								 )
							 );
					; ?>
            <?php echo $form->error($model,'created_at'); ?>
        </div><!-- row -->
        
        <div class="row">
            <?php echo $form->labelEx($model,'changed_at'); ?>
            <?php $this->widget('CJuiDateTimePicker',
						 array(
								 'model'=>'$model',
                                                                 'name'=>'changed_at',
								 'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
								 'value'=>$model->changed_at,
								 'htmlOptions'=>array('size'=>10, 'style'=>'width:80px !important'),
                                                                 'mode' => 'datetime',
								 'options'=>array(
                                                                         'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
									 'showButtonPanel'=>true,
									 'changeYear'=>true,
									 'changeYear'=>true,
									 'dateFormat'=>'yy-mm-dd',
									 ),
								 )
							 );
					; ?>
            <?php echo $form->error($model,'changed_at'); ?>
        </div><!-- row -->
        
        <div class="row">
            <?php echo $form->labelEx($model,'modified_at'); ?>
            <?php echo $form->textField($model,'modified_at'); ?>
            <?php echo $form->error($model,'modified_at'); ?>
        </div><!-- row -->
        
        <div class="row">
            <?php echo $form->labelEx($model,'image'); ?>
            <?php echo $form->textArea($model,'image',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'image'); ?>
        </div><!-- row -->
        
        <div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model,'email'); ?>
        </div><!-- row -->
        
        <div class="row">
            <?php echo $form->labelEx($model,'uri'); ?>
            <?php echo $form->textField($model,'uri',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'uri'); ?>
        </div><!-- row -->
            <?php
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => 'javascript:history.go(-1)')); 
echo CHtml::submitButton(Yii::t('app', 'Save')); 
$this->endWidget(); ?>
</div> <!-- form -->