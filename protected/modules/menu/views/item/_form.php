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

        <?php echo CHtml::radioButton('MenuItem[type]', $model->type == 'module', array('value' => 'module', 'id' => 'radio_module')); ?>
        <?php echo Yii::t('app', 'Module') . ' '; ?>
        <?php echo Chtml::dropDownList('MenuItem[module]', $model->link, Awecms::getModulesWithPath(), array('onfocus' => 'js:$("#radio_module").attr("checked", "checked");'));?>
        <br/>

        <?php // echo CHtml::radioButton('MenuItem[type]', $model->type == 'action', array('value' => 'action')); ?>
        <?php
        // echo Yii::t('app', 'Action'); 
//        print_r(Awecms::getAllActions());
        ?>
        <!--<br/>-->
        <?php
        
        if (Yii::app()->hasModule('page')) {
            echo CHtml::radioButton('MenuItem[type]', $model->type == 'content', array('value' => 'content', 'id' => 'radio_content'));
            echo Yii::t('app', 'Content') . ' ';
            echo CHtml::dropDownList('MenuItem[content]', $model->link, CHtml::listData(Page::model()->findAll(), 'path', 'title'), array('onfocus' => 'js:$("#radio_content").attr("checked", "checked");'));
        }
        ?>
        <br/>
        <?php echo CHtml::radioButton('MenuItem[type]', $model->type == 'url', array('value' => 'url', 'id' => 'radio_url')); ?>
        <?php echo Yii::t('app', 'Link') . ' '; ?>
        <?php echo Chtml::textField('MenuItem[url]', $model->link, array('size' => 60, 'onfocus' => 'js:$("#radio_url").attr("checked", "checked");')); ?>
        <?php echo $form->error($model, 'link'); ?>
        <br/>
        <p class="hint">
            /item points to base_url/item, //item points to root_of_server/item, item creates link relative to dynamic user location, 
            URLs rendered as is.
        </p>
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
        <?php echo $form->labelEx($model, 'role'); ?>
        <?php
        echo CHtml::checkBoxList(get_class($model) . '[role]', explode(',', $model->role), $model->roles, array('selected' => 'all'));
        ?>
        <?php echo $form->error($model, 'role'); ?>
    </div><!-- row -->


    <div class="row">
        <?php echo $form->labelEx($model, 'Open in new tab?'); ?>
        <?php echo CHtml::checkBox('MenuItem[target]', $model->target == '_blank', array('value' => '_blank')); ?>
        <?php echo $form->error($model, 'target'); ?>
    </div>


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