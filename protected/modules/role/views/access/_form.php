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
    print_r(Yii::app()->metadata->getControllers());
    die();
    ?>

    <div class="row">
<?php echo $form->labelEx($model, 'module'); ?>
        <?php echo $form->dropDownList($model, 'module', Yii::app()->metadata->getModules(), array('prompt' => 'None')); ?>
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
    <div class="row nm_row">
        <label for="roles"><?php echo Yii::t('app', 'Roles'); ?></label>
<?php
echo \CHtml::checkBoxList('Access[roles]', array_map('Awecms::getPrimaryKey', $model->roles), CHtml::listData(Role::model()->findAll(), 'id', 'name'), array('attributeitem' => 'id', 'checkAll' => 'Select All'));
?></div>

        <?php
        echo CHtml::submitButton(Yii::t('app', 'Save'));
        echo CHtml::Button(Yii::t('app', 'Cancel'), array(
            'submit' => 'javascript:history.go(-1)'));
        $this->endWidget();
        ?>
</div> <!-- form -->