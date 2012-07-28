<?php
$this->breadcrumbs = array(
   $this->module->id,
);
?>

<!-- Event dialog -->
<?php
$calendarOptions = Yii::app()->controller->module->calendarOptions;


$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'dlg_EventCal',
    'options' => array(
        'title' => Yii::t('CalendarModule.fullCal', 'Event detail'),
        'modal' => true,
        'autoOpen' => false,
        'hide' => 'slide',
        'show' => 'slide',
        'buttons' => array(
            array(
                'text' => Yii::t('CalendarModule.fullCal', 'OK'),
                'click' => "js:function() { eventDialogOK(); }"
            ),
            array(
                'text' => Yii::t('CalendarModule.fullCal', 'Cancel'),
                'click' => 'js:function() { $(this).dialog("close"); }',
            ),
    ))));
?>

<div class="form">
    <?php echo CHtml::beginForm(); ?>
    <div class="row">
        <?php
        echo CHtml::hiddenField("EventCal_id", 0);
        echo CHtml::label(Yii::t('CalendarModule.fullCal', 'Message'), "EventCal_title");
        echo CHtml::textField("EventCal_title");
        ?>
    </div>
    <div class="row">
        <?php
        echo CHtml::label(Yii::t('CalendarModule.fullCal', 'Start'), "EventCal_start");
        echo CHtml::dropDownList("EventCal_start", 0, array());
        ?>
    </div>
    <div class="row">
        <?php
        echo CHtml::label(Yii::t('CalendarModule.fullCal', 'End'), "EventCal_end");
        echo CHtml::dropDownList("EventCal_end", 0, array());
        ?>
    </div>
    <div class="row">
        <?php
        echo CHtml::label(Yii::t('CalendarModule.fullCal', 'All day'), "EventCal_allDay");
        echo CHtml::checkBox("EventCal_allDay", true);
        ?>
    </div>
    <div class="row">
        <?php
        echo CHtml::label(Yii::t('CalendarModule.fullCal', 'Editable'), "EventCal_editable");
        echo CHtml::checkBox("EventCal_editable", true);
        ?>
    </div>

    <?php echo CHtml::endForm(); ?>
    </div>

<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
        <!-- end Event dialog -->

        <!-- change user form  -->
    <div id='changeUser' style='display:none;'>
      <br>
         <?php $this->widget('ChangeUser', array('userId' => $userId)); ?>
      <br>
    </div>
    <!-- end form -->

    <!-- User preference dialog -->
<?php
if($calendarOptions['cronPeriod'])
{
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'dlg_Userpreference',
            'options' => array(
                'title' => Yii::t('CalendarModule.fullCal', Yii::t('CalendarModule.fullCal', 'preference')),
                //'modal' => false,
                'autoOpen' => false,
                'buttons' => array(
                    array(
                        'text' => Yii::t('CalendarModule.fullCal', 'OK'),
                        'click' => 'js:function() { userpreferenceOK(); }'
                    ),
                    array(
                        'text' => Yii::t('CalendarModule.fullCal', 'Cancel'),
                        'click' => 'js:function() { $(this).dialog("close"); }'
                    ),)
                )));
        $this->widget('UserPreference', array('userId' => $userId));
        $this->endWidget('zii.widgets.jui.CJuiDialog');
} ?>
        <!-- end user preference dialog -->

        <div id='loading' style='display:none'>loading...</div>

        <div id="EventCal"></div>
<?php $this->widget('CalWidget'); ?>
