<div class="form">
    <p class="note">
        <?php echo "<?php echo Yii::t('app','Fields with');?> <span class=\"required\">*</span> <?php echo Yii::t('app','are required');?>"; ?>.
    </p>

    <?php echo '<?php'; ?>

    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'<?php echo $this->class2id($this->modelClass); ?>-form',
    'enableAjaxValidation'=><?php echo $this->validation == 1 || $this->validation == 3 ? 'true' : 'false'; ?>,
    'enableClientValidation'=><?php echo $this->validation == 2 || $this->validation == 3 ? 'true' : 'false'; ?>,
    ));

    echo $form->errorSummary($model);
    ?>
    <?php
    foreach ($this->tableSchema->columns as $column) {
        //continue if it is an auto-increment field or if it's a timestamp kinda' stuff
        if ($column->autoIncrement || in_array($column->name, array_merge($this->create_time, $this->update_time)))
            continue;
        ?>

        <div class="row">
            <?php echo "<?php echo " . $this->generateActiveLabel($this->modelClass, $column) . "; ?>\n"; ?>
            <?php echo "<?php " . $this->generateField($column, $this->modelClass) . "; ?>\n"; ?>
            <?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
        </div><!-- row -->
        <?php
    }
    ?>
    <?php echo "<?php
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => 'javascript:history.go(-1)'));
echo CHtml::submitButton(Yii::t('app', 'Save'));
\$this->endWidget(); ?>\n"; ?>
</div> <!-- form -->