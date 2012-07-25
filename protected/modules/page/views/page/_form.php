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
    echo $form->errorSummary($page);
    ?>

    <div class="row">
        <?php echo $form->labelEx($page, 'title'); ?>
        <?php echo $form->textField($page, 'title', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($page, 'title'); ?>
    </div>

    <div class="row sticky">
        <?php echo $form->labelEx($page, 'slug'); ?>
        <div id="slug_holder">
            <?php
            $slug = isset($page->slug->slug) ? $page->slug->slug : '&nbsp;';
            echo $slug;
            ?>
        </div>
        <?php echo CHtml::textField("Page[slug]", $slug, array('size' => 65, 'style' => 'display:none;')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($page, 'content'); ?>
        <?php
//        $this->widget('EMarkitupWidget', array(
//            'model' => $page,
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
        <?php echo $form->error($page, 'content'); ?>
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
        $allModels = Page::model()->findAll();
        foreach ($allModels as $key => $aModel) {
            if ($aModel->id == $page->id)
                unset($allModels[$key]);
        }
        echo $form->dropDownList($page, 'parent', CHtml::listData($allModels, 'id', 'title'), array('prompt' => 'None'));
        ?>
        <?php echo $form->error($page, 'parent_id'); ?>
    </div>

    <div class="row">
        <?php // echo $form->labelEx($page, 'order');  ?>
        <?php // echo $form->textField($page, 'order');  ?>
        <?php // echo $form->error($page, 'order');  ?>
    </div>

    <div class="row">
        <?php // echo $form->labelEx($page, 'type');  ?>
        <?php // echo $form->textField($page, 'type', array('size' => 20, 'maxlength' => 20));  ?>
        <?php // echo $form->error($page, 'type');  ?>
    </div>

    <div class="row">
        <?php // echo $form->labelEx($page, 'comment_status');  ?>
        <?php // echo $form->textField($page, 'comment_status', array('size' => 20, 'maxlength' => 20));  ?>
        <?php // echo $form->error($page, 'comment_status');  ?>
    </div>

    <div class="row">
        <?php // echo $form->labelEx($page, 'tags_enabled');  ?>
        <?php // echo $form->checkBox($page, 'tags_enabled');  ?>
        <?php // echo $form->error($page, 'tags_enabled');  ?>
    </div>

    <div class="row">
        <?php // echo $form->labelEx($page, 'permission');  ?>
        <?php // echo $form->textField($page, 'permission', array('size' => 20, 'maxlength' => 20));  ?>
        <?php // echo $form->error($page, 'permission');  ?>
    </div>

    <div class="row">
        <?php // echo $form->labelEx($page, 'password');  ?>
        <?php // echo $form->passwordField($page, 'password', array('size' => 20, 'maxlength' => 20));  ?>
        <?php // echo $form->error($page, 'password');  ?>
    </div>

    <div class="row nm_row">
        <label for="categories"><?php echo Yii::t('app', 'Categories'); ?></label>
        <?php
        echo CHtml::checkBoxList('Page[categories]', array_map('Awecms::getPrimaryKey', $page->categories), CHtml::listData(Category::model()->findAll(), 'id', 'name'), array('attributeitem' => 'id', 'checkAll' => 'Select All'));
        ?></div>

    <?php
    echo CHtml::submitButton(Yii::t('app', 'Save'));
    echo CHtml::Button(Yii::t('app', 'Cancel'), array(
        'submit' => 'javascript:history.go(-1)'));
    $this->endWidget();
    ?>
</div> <!-- form -->