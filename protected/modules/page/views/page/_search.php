<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
            ));
    ?>

    <div class="row">
<?php echo $form->label($page, 'id'); ?>
<?php echo $form->textField($page, 'id'); ?>
    </div>

    <div class="row">
<?php echo $form->label($page, 'user_id'); ?>
<?php echo $form->dropDownList($page, 'user', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('prompt' => 'None')); ?>
    </div>

    <div class="row">
<?php echo $form->label($page, 'title'); ?>
<?php echo $form->textField($page, 'title', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($page, 'content'); ?>
        <?php
        $this->widget('EMarkitupWidget', array(
            'model' => $page,
            'attribute' => 'content',
        ));
        ;
        ?>
    </div>

    <div class="row">
        <?php echo $form->label($page, 'status'); ?>
<?php
echo CHtml::activeDropDownList($page, 'status', array(
    'published' => Yii::t('app', 'Published'),
    'trashed' => Yii::t('app', 'Trashed'),
    'draft' => Yii::t('app', 'Draft'),
));
?>
    </div>

    <div class="row">
        <?php echo $form->label($page, 'created_at'); ?>
        <?php
        $this->widget('CJuiDateTimePicker', array(
            'model' => $page,
            'name' => 'Page[created_at]',
            //'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
            'language' => 'en',
            'value' => $page->created_at,
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
        <?php echo $form->label($page, 'modified_at'); ?>
        <?php
        $this->widget('CJuiDateTimePicker', array(
            'model' => $page,
            'name' => 'Page[modified_at]',
            //'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
            'language' => 'en',
            'value' => $page->modified_at,
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
        <?php echo $form->label($page, 'parent_id'); ?>
        <?php echo $form->dropDownList($page, 'parent', CHtml::listData(Page::model()->findAll(), 'id', 'title'), array('prompt' => 'None')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($page, 'order'); ?>
        <?php echo $form->textField($page, 'order'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($page, 'type'); ?>
        <?php echo $form->textField($page, 'type', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($page, 'comment_status'); ?>
        <?php echo $form->textField($page, 'comment_status', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($page, 'tags_enabled'); ?>
        <?php echo $form->checkBox($page, 'tags_enabled'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($page, 'permission'); ?>
        <?php echo $form->textField($page, 'permission', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
<?php echo $form->label($page, 'views'); ?>
<?php echo $form->textField($page, 'views'); ?>
    </div>

    <div class="row buttons">
<?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->