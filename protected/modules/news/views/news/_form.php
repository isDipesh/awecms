<div class="form">
    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'news-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            ));

    echo $form->errorSummary($model);
    ?>

    <?php
    if ($model->page) {
        $pageTitle = $model->page->title;
    } else {
        $pageTitle = '';
    }
    ?>

    <div class="row">
        <?php echo CHtml::label('Title', 'Page[title]'); ?>

        <?php echo CHtml::textField('Page[title]', $pageTitle, array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo CHtml::error($model, 'Page'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'source'); ?>
        <?php echo $form->textField($model, 'source', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'source'); ?>
    </div>
    <?php
    echo CHtml::submitButton(Yii::t('app', 'Save'));
    echo CHtml::Button(Yii::t('app', 'Cancel'), array(
        'submit' => 'javascript:history.go(-1)'));
    $this->endWidget();
    ?>
</div> <!-- form -->