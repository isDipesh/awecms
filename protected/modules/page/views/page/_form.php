<div class="form">
    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'page-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            ));
    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'title'); ?>
        <?php // print_r($model); ?>
    </div>

    <div class="row sticky">
        <?php echo $form->labelEx($model, 'slug'); ?>
        <div id="slug_holder">
            <?php
            
            $slug = isset($model->slug->slug) ? $model->slug->slug : '&nbsp;';
            echo $slug;
            ?>
        </div>
        <?php echo CHtml::textField("Page[slug]", $slug, array('size' => 65, 'style' => 'display:none;')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content'); ?>
        <?php
//        $this->widget('EMarkitupWidget', array(
//            'model' => $model,
//            'attribute' => 'content',
//        ));

        $this->widget('ext.ckeditor.CKEditorWidget', array(
            "model" => $model,
            "attribute" => "content",
            "defaultValue" => $model->content,
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
            <?php echo $form->labelEx($model, 'user_id'); ?>
            <?php echo $form->dropDownList($model, 'user', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('prompt' => 'None')); ?>
            <?php echo $form->error($model, 'user_id'); ?>
        </div>
    <?php } ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php
        echo CHtml::activeDropDownList($model, 'status', array(
            'published' => Yii::t('app', 'Published'),
            'trashed' => Yii::t('app', 'Trashed'),
            'draft' => Yii::t('app', 'Draft'),
        ));
        ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'parent_id'); ?>
        <?php
        $allModels = Page::model()->findAll();
        foreach ($allModels as $key => $aModel) {
            if ($aModel->id == $model->id)
                unset($allModels[$key]);
        }
        echo $form->dropDownList($model, 'parent', CHtml::listData($allModels, 'id', 'title'), array('prompt' => 'None'));
        ?>
        <?php echo $form->error($model, 'parent_id'); ?>
    </div>

    <div class="row">
        <?php // echo $form->labelEx($model, 'order');  ?>
        <?php // echo $form->textField($model, 'order');  ?>
        <?php // echo $form->error($model, 'order');  ?>
    </div>

    <div class="row">
        <?php // echo $form->labelEx($model, 'type');  ?>
        <?php // echo $form->textField($model, 'type', array('size' => 20, 'maxlength' => 20));  ?>
        <?php // echo $form->error($model, 'type');  ?>
    </div>

    <div class="row">
        <?php // echo $form->labelEx($model, 'comment_status');  ?>
        <?php // echo $form->textField($model, 'comment_status', array('size' => 20, 'maxlength' => 20));  ?>
        <?php // echo $form->error($model, 'comment_status');  ?>
    </div>

    <div class="row">
        <?php // echo $form->labelEx($model, 'tags_enabled');  ?>
        <?php // echo $form->checkBox($model, 'tags_enabled');  ?>
        <?php // echo $form->error($model, 'tags_enabled');  ?>
    </div>

    <div class="row">
        <?php // echo $form->labelEx($model, 'permission');  ?>
        <?php // echo $form->textField($model, 'permission', array('size' => 20, 'maxlength' => 20));  ?>
        <?php // echo $form->error($model, 'permission');  ?>
    </div>

    <div class="row">
        <?php // echo $form->labelEx($model, 'password');  ?>
        <?php // echo $form->passwordField($model, 'password', array('size' => 20, 'maxlength' => 20));  ?>
        <?php // echo $form->error($model, 'password');  ?>
    </div>

    <div class="row nm_row">
        <label for="categories"><?php echo Yii::t('app', 'Categories'); ?></label>
        <?php
        echo CHtml::checkBoxList('Page[categories]', array_map('Awecms::getPrimaryKey', $model->categories), CHtml::listData(Category::model()->findAll(), 'id', 'name'), array('attributeitem' => 'id', 'checkAll' => 'Select All'));
        ?></div>

    <?php
    echo CHtml::submitButton(Yii::t('app', 'Save'));
    echo CHtml::Button(Yii::t('app', 'Cancel'), array(
        'submit' => 'javascript:history.go(-1)'));
    $this->endWidget();
    ?>
</div> <!-- form -->