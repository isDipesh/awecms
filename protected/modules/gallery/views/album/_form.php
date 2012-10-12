<div class="form">
    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'album-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            ));

    echo $form->errorSummary($model);
    ?>

    <?php
    $this->widget('PageForm', array(
        'model' => $model,
        'form' => $form,
        'fields' => array('title', 'slug')
    ));
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'Description'); ?>
        <?php
        $page = isset($model->page) ? $model->page : new Page;
//        $this->widget('ext.redactor.ERedactorWidget', array(
//            "model" => $page,
//            "attribute" => "content",
//            'options' => array(
//                'imageUpload' => Yii::app()->createAbsoluteUrl('/file/redactorUpload'),
//            ),
//        ));
        echo CHtml::textArea('Page[content]', $page->content);
        ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'thumbnail_id'); ?>
        <?php echo $form->dropDownList($model, 'thumbnail', CHtml::listData(Image::model()->findAllByAttributes(array('album_id' => $model->id)), 'id', 'title')); ?>
        <?php echo $form->error($model, 'thumbnail_id'); ?>
    </div>

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