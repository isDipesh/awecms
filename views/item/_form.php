<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'menu-item-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'link'); ?>
        <?php echo $form->textField($model, 'link', array('size' => 60)); ?>
        <?php echo $form->error($model, 'link'); ?>
        /item points to base_url/item, //item points to root_of_server/item, item creates relative to dynamic user location
        URLs are not touched
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'enabled'); ?>
        <?php echo $form->checkBox($model, 'enabled'); ?>
        <?php echo $form->error($model, 'enabled'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'visible'); ?>
        <?php echo $form->textArea($model, 'visible', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'visible'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'content_id'); ?>
        <?php echo $form->textField($model, 'content_id'); ?>
        <?php echo $form->error($model, 'content_id'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'parent_id'); ?>
        <?php
        //show all menu items but current one
        $allModels = MenuItem::model()->findAll();
        foreach ($allModels as $key => $aModel) {
            if ($aModel->id == $model->id)
                unset($allModels[$key]);
        }
        echo $form->dropDownList($model, 'parent', CHtml::listData($allModels, 'id', 'name'), array('prompt' => 'None'));
        ?>
<?php echo $form->error($model, 'parent_id'); ?>
    </div><!-- row -->

    <?php
    //menu selection available only for edit
    if (isset($menuId))
        echo $form->hiddenField($model, 'menu', array('value' => $menuId));
    else {
        ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'menu_id'); ?>
            <?php echo $form->dropDownList($model, 'menu', CHtml::listData(Menu::model()->findAll(), 'id', 'name')); ?>
        <?php echo $form->error($model, 'menu_id'); ?>
        </div>
        <?php
    }
    echo CHtml::submitButton(Yii::t('app', 'Save'));
    echo CHtml::Button(Yii::t('app', 'Cancel'), array(
        'submit' => 'javascript:history.go(-1)'));
    $this->endWidget();
    ?>
</div> <!-- form -->