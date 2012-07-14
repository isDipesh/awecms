<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
            ));
    ?>

    <div class="row">
<?php echo $form->label($model, 'id'); ?>
<?php echo $form->textField($model, 'id'); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'user_id'); ?>
<?php echo $form->dropDownList($model, 'user', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('prompt' => 'None')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'title'); ?>
<?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'content'); ?>
        <?php
        $this->widget('EMarkitupWidget', array(
            'model' => $model,
            'attribute' => 'content',
        ));
        ;
        ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'status'); ?>
<?php
echo CHtml::activeDropDownList($model, 'status', array(
    'published' => Yii::t('app', 'Published'),
    'trashed' => Yii::t('app', 'Trashed'),
    'draft' => Yii::t('app', 'Draft'),
));
?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'created_at'); ?>
        <?php
        $this->widget('CJuiDateTimePicker', array(
            'model' => $model,
            'name' => 'Page[created_at]',
            //'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
            'language' => 'en',
            'value' => $model->created_at,
            'mode' => 'datetime',
            'options' => array(
                'showAnim' => 'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                'showButtonPanel' => true,
                'changeYear' => true,
                'changeMonth' => true,
                'dateFormat' => 'yy-mm-dd',
            ),
                )
        );
        ;
        ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'modified_at'); ?>
        <?php
        $this->widget('CJuiDateTimePicker', array(
            'model' => $model,
            'name' => 'Page[modified_at]',
            //'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
            'language' => 'en',
            'value' => $model->modified_at,
            'mode' => 'datetime',
            'options' => array(
                'showAnim' => 'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                'showButtonPanel' => true,
                'changeYear' => true,
                'changeMonth' => true,
                'dateFormat' => 'yy-mm-dd',
            ),
                )
        );
        ;
        ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'parent_id'); ?>
        <?php echo $form->dropDownList($model, 'parent', CHtml::listData(Page::model()->findAll(), 'id', 'title'), array('prompt' => 'None')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'order'); ?>
        <?php echo $form->textField($model, 'order'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'type'); ?>
        <?php echo $form->textField($model, 'type', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'comment_status'); ?>
        <?php echo $form->textField($model, 'comment_status', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'tags_enabled'); ?>
        <?php echo $form->checkBox($model, 'tags_enabled'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'permission'); ?>
        <?php echo $form->textField($model, 'permission', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'views'); ?>
<?php echo $form->textField($model, 'views'); ?>
    </div>

    <div class="row buttons">
<?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->