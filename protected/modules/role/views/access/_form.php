<div class="form">
    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'access-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            ));

    

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'role_id'); ?>
        <?php echo $form->dropDownList($model, 'role', CHtml::listData(Role::model()->findAll(), 'id', 'name')); ?>
        <?php echo $form->error($model, 'role_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'module'); ?>
        <?php echo $form->dropDownList($model, 'module', $model->modulesList, array('prompt'=>'None')); ?>
        <?php echo $form->error($model, 'module'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'controller'); ?>
        <?php echo $form->textField($model, 'controller', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'controller'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'action'); ?>
        <?php echo $form->textField($model, 'action', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'action'); ?>
    </div>
    <?php
    echo CHtml::submitButton(Yii::t('app', 'Save'));
    echo CHtml::Button(Yii::t('app', 'Cancel'), array(
        'submit' => 'javascript:history.go(-1)'));
    $this->endWidget();
    ?>
</div> <!-- form -->