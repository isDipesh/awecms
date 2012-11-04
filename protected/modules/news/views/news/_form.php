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

    echo CHtml::errorSummary($model);
    ?>

    <?php
    $this->widget('PageForm', array(
        'model' => $model,
        'form' => $form,
        'fields' => array('title', 'slug', 'content', 'user', 'status', 'parent', 'tags')
    ));
    ?>

    <div class="row buttons">
        <?php
        echo CHtml::submitButton(Yii::t('app', 'Save'));
        echo CHtml::Button(Yii::t('app', 'Cancel'), array(
            'submit' => 'javascript:history.go(-1)'));
        ?>
    </div>
    <?php
    $this->endWidget();
    ?>
</div>