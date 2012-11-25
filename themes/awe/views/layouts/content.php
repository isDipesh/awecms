<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
    <div id="content">
        <?php echo $content; ?>
    </div><!-- content -->
</div>
<div class="span-5 last">
    <div id="sidebar">
        <?php
        if (((Settings::get('site', 'enable_operations_menu') == '') || (Settings::get('site', 'enable_operations_menu') == 1)) && isset($this->menu)) {
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => Yii::t('app', 'Operations'),
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items' => $this->menu,
                'htmlOptions' => array('class' => 'operations'),
            ));
            $this->endWidget();
        }
        ?>
    </div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>