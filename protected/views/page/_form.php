<div class="form">
<p class="note">
<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
</p>

<?php
$form=$this->beginWidget('CActiveForm', array(
'id'=>'page-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	)); 

echo $form->errorSummary($model);
?>

	<div class="row">
<?php echo $form->labelEx($model,'title'); ?>
<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
<?php echo $form->error($model,'title'); ?>
<div class='hint'><?php if('hint.Page.title' != $hint = Yii::t('app', 'title')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'content'); ?>
<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'content'); ?>
<div class='hint'><?php if('hint.Page.content' != $hint = Yii::t('app', 'content')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'status'); ?>
<?php echo $form->textField($model,'status',array('size'=>9,'maxlength'=>9)); ?>
<?php echo $form->error($model,'status'); ?>
<div class='hint'><?php if('hint.Page.status' != $hint = Yii::t('app', 'status')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'created_at'); ?>
<?php echo $form->textField($model,'created_at'); ?>
<?php echo $form->error($model,'created_at'); ?>
<div class='hint'><?php if('hint.Page.created_at' != $hint = Yii::t('app', 'created_at')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'modified_at'); ?>
<?php echo $form->textField($model,'modified_at'); ?>
<?php echo $form->error($model,'modified_at'); ?>
<div class='hint'><?php if('hint.Page.modified_at' != $hint = Yii::t('app', 'modified_at')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'order'); ?>
<?php echo $form->textField($model,'order'); ?>
<?php echo $form->error($model,'order'); ?>
<div class='hint'><?php if('hint.Page.order' != $hint = Yii::t('app', 'order')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'type'); ?>
<?php echo $form->textField($model,'type',array('size'=>20,'maxlength'=>20)); ?>
<?php echo $form->error($model,'type'); ?>
<div class='hint'><?php if('hint.Page.type' != $hint = Yii::t('app', 'type')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'comment_status'); ?>
<?php echo $form->textField($model,'comment_status',array('size'=>20,'maxlength'=>20)); ?>
<?php echo $form->error($model,'comment_status'); ?>
<div class='hint'><?php if('hint.Page.comment_status' != $hint = Yii::t('app', 'comment_status')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'tags_enabled'); ?>
<?php echo $form->textField($model,'tags_enabled'); ?>
<?php echo $form->error($model,'tags_enabled'); ?>
<div class='hint'><?php if('hint.Page.tags_enabled' != $hint = Yii::t('app', 'tags_enabled')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'permission'); ?>
<?php echo $form->textField($model,'permission',array('size'=>20,'maxlength'=>20)); ?>
<?php echo $form->error($model,'permission'); ?>
<div class='hint'><?php if('hint.Page.permission' != $hint = Yii::t('app', 'permission')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'password'); ?>
<?php echo $form->passwordField($model,'password',array('size'=>20,'maxlength'=>20)); ?>
<?php echo $form->error($model,'password'); ?>
<div class='hint'><?php if('hint.Page.password' != $hint = Yii::t('app', 'password')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'views'); ?>
<?php echo $form->textField($model,'views'); ?>
<?php echo $form->error($model,'views'); ?>
<div class='hint'><?php if('hint.Page.views' != $hint = Yii::t('app', 'views')) echo $hint; ?></div>
</div>

<div class="row">
<label for="user"><?php echo Yii::t('app', 'User'); ?></label>
<?php $this->widget(
                    'Relation',
                    array(
                            'model' => $model,
                            'relation' => 'user',
                            'fields' => 'username',
                            'allowEmpty' => true,
                            'style' => 'dropdownlist',
                            'htmlOptions' => array(
                                'checkAll' => Yii::t('app', 'Choose all'),
                                ),)
                        ); ?><br />
</div>

<div class="row">
<label for="parent0"><?php echo Yii::t('app', 'Parent0'); ?></label>
<?php $this->widget(
                    'Relation',
                    array(
                            'model' => $model,
                            'relation' => 'parent0',
                            'fields' => 'title',
                            'allowEmpty' => true,
                            'style' => 'dropdownlist',
                            'htmlOptions' => array(
                                'checkAll' => Yii::t('app', 'Choose all'),
                                ),)
                        ); ?><br />
</div>

<div class="row">
<label for="page"><?php echo Yii::t('app', 'Page'); ?></label>
<?php if ($model->page !== null) echo $model->page->_label;; ?><br />
</div>

<div class="row">
<label for="zeros"><?php echo Yii::t('app', 'Zeros'); ?></label>
<?php $this->widget(
                    'Relation',
                    array(
                            'model' => $model,
                            'relation' => 'zeros',
                            'fields' => 'name',
                            'allowEmpty' => false,
                            'style' => 'checkbox',
                            'htmlOptions' => array(
                                'checkAll' => Yii::t('app', 'Choose all'),
                                ),)
                        ); ?><br />
</div>


<?php
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => array('page/admin'))); 
echo CHtml::submitButton(Yii::t('app', 'Save')); 
$this->endWidget(); ?>
</div> <!-- form -->
