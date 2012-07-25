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

    echo CHtml::errorSummary(array($page, $model));
    ?>

    <?php
    if ($model->page) {
        $pageTitle = $model->page->title;
    } else {
        $pageTitle = '';
    }
    ?>

    <div class="row">
        <?php echo $form->labelEx($page, 'title'); ?>
        <?php echo $form->textField($page, 'title', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($page, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content'); ?>
        <?php
//        $this->widget('EMarkitupWidget', array(
//            'model' => $model,
//            'attribute' => 'content',
//        ));

        $this->widget('ext.ckeditor.CKEditorWidget', array(
            "model" => $page,
            "attribute" => "content",
            "defaultValue" => $page->content,
            # Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
            "config" => array(
                "height" => "400px",
                "width" => "100%",
                "filebrowserBrowseUrl" => $this->createUrl("/file/uploader"),
            ),
        ));
        ?>
        <?php echo $form->error($model, 'content'); ?>
    </div>

    <?php if (Yii::app()->getModule('user')->isAdmin()) { ?>
        <div class="row">
            <?php echo $form->labelEx($page, 'user_id'); ?>
            <?php echo $form->dropDownList($page, 'user', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('prompt' => 'None')); ?>
            <?php echo $form->error($page, 'user_id'); ?>
        </div>
    <?php } ?>

    <div class="row">
        <?php echo $form->labelEx($page, 'status'); ?>
        <?php
        echo CHtml::activeDropDownList($page, 'status', array(
            'published' => Yii::t('app', 'Published'),
            'trashed' => Yii::t('app', 'Trashed'),
            'draft' => Yii::t('app', 'Draft'),
        ));
        ?>
        <?php echo $form->error($page, 'status'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($page, 'parent_id'); ?>
        <?php
        $allModels = Page::findByType('news');
        foreach ($allModels as $key => $aModel) {
            if ($aModel->id == $page->id)
                unset($allModels[$key]);
        }
        echo $form->dropDownList($page, 'parent', CHtml::listData($allModels, 'id', 'title'), array('prompt' => 'None'));
        ?>
        <?php echo $form->error($page, 'parent_id'); ?>
    </div>


    <?php
    echo CHtml::submitButton(Yii::t('app', 'Save'));
    echo CHtml::Button(Yii::t('app', 'Cancel'), array(
        'submit' => 'javascript:history.go(-1)'));
    $this->endWidget();
    ?>
</div> <!-- form -->