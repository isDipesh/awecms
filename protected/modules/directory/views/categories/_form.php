<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'business-category-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            ));

    echo $form->errorSummary($model);

    $this->widget('PageForm', array(
        'model' => $model,
        'form' => $form,
        'fields' => array('title', 'slug', 'parent')
    ));
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'Description'); ?>
        <?php
        $page = isset($model->page) ? $model->page : new Page;
//        $this->widget('ext.ckeditor.CKEditorWidget', array(
//            "model" => $page,
//            "attribute" => "content",
//            "defaultValue" => $page->content,
//            "config" => array(
//                "height" => "50px",
//                'toolbar' => 'Basic',
//            ),
//        ));
        echo CHtml::textArea('Page[content]', $page->content);
        ?>
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