<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'business-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));

    echo $form->errorSummary($model);

    $this->widget('PageForm', array(
        'model' => $model,
        'form' => $form,
        'fields' => array('title', 'slug', 'content'),
    ));
    ?>


    <div class="row">
        <?php echo $form->labelEx($model, 'phone'); ?>
        <?php echo $form->textField($model, 'phone', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'phone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fax'); ?>
        <?php echo $form->textField($model, 'fax', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'fax'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'website'); ?>
        <?php echo $form->textField($model, 'website', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'website'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'address'); ?>
        <?php echo $form->textArea($model, 'address', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'address'); ?>
    </div>

    <!--    <div class="row">
    <?php echo $form->labelEx($model, 'place_id'); ?>
    <?php echo $form->dropDownList($model, 'place', CHtml::listData(Place::model()->findAll(), 'id', 'other_names'), array('prompt' => 'None')); ?>
    <?php echo $form->error($model, 'place_id'); ?>
        </div>-->

    <div class="row">
        <?php echo $form->labelEx($model, 'district_id'); ?>
        <?php echo $form->dropDownList($model, 'district', CHtml::listData(District::model()->findAll(), 'id', 'name'), array('prompt' => 'None')); ?>
        <?php echo $form->error($model, 'district_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'image'); ?>
        <?php
//        echo $form->textField($model, 'image', array('size' => 60, 'maxlength' => 60));
        echo CHtml::activeFileField($model, 'image');

        echo $form->error($model, 'image');
        ?>
    </div>

    <div class="row nm_row">
        <label for="businessCategories"><?php echo Yii::t('app', 'BusinessCategories'); ?></label>
        <?php
        echo CHtml::checkBoxList('Business[businessCategories]', array_map('Awecms::getPrimaryKey', $model->businessCategories), CHtml::listData(BusinessCategory::model()->findAll(), 'id', 'title'), array('attributeitem' => 'id', 'checkAll' => 'Select All'));
        ?>
    </div>

    <div class="row buttons">
        <?php
        echo CHtml::submitButton(Yii::t('app', 'Save'));
        echo CHtml::Button(Yii::t('app', 'Cancel'), array(
            'submit' => 'javascript:history.go(-1)'));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div> <!-- form -->