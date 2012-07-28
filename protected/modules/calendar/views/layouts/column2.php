<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
    <div class="span-19">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span-5 last">
        <div id="sidebar">
            <?php
            if(Yii::app()->controller->module->calendarOptions['cronPeriod'])
            {
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => Yii::t('CalendarModule.fullCal','Operations'),
                ));
                    echo CHtml::link(Yii::t('CalendarModule.EventsUserPreference', 'Preference'), '#',
                        array('onclick' => "$('#dlg_Userpreference').dialog('open');"));
                $this->endWidget();
            }
            ?>

            <?php
            $this->widget('EventHelper', array('userId' => Yii::app()->user->getState('calUserId')));
            ?>

            <?php
            $this->widget('ChangeUser', array('userId' => Yii::app()->user->getState('calUserId')));
            ?>
        </div><!-- sidebar -->
    </div>
</div>
<?php $this->endContent(); ?>