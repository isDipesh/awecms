<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'page-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            ));
    echo $form->errorSummary($page);
    ?>

    <?php
    $this->widget('PageForm', array(
        'model' => $page,
        'form' => $form,
        'fields' => array('title', 'slug', 'content', 'user', 'status', 'parent', 'categories')
    ));
    ?>
    
    <div class="row">
        <?php 
        $page->addTags('a','b')->save();
        $page->addTags('c','d')->save();
        print_r($page->getTags());
        $this->widget('TagWidget', array(
            'url'=> Yii::app()->request->baseUrl.'/tags/json/',
            'tags' => $page->getTags()
        ));
        ?>
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