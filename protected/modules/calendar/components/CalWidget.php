<?php

class CalWidget extends CWidget
{
    public function run()
    {
        $calendarOptions = Yii::app()->controller->module->calendarOptions;

        $cs = Yii::app()->getClientScript();
        $scriptUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.calendar.components.fullCal'));
        $cs->registerCssFile($cs->getCoreScriptUrl().'/jui/css/base/jquery-ui.css');
        if($calendarOptions['theme'])
            $cs->registerCssFile($scriptUrl . '/' . $calendarOptions['themeName'] . '/theme.css');
        $cs->registerCssFile($scriptUrl . '/fullcalendar.css');
        $cs->registerCssFile($scriptUrl . '/eventCal.css');
        $cs->registerCoreScript('jquery');
        $cs->registerScriptFile($cs->getCoreScriptUrl().'/jui/js/jquery-ui.min.js');
        $cs->registerScriptFile($scriptUrl . '/fullcalendar.min.js');
        $cs->registerScriptFile($scriptUrl . '/eventCal.js');      

        $param['baseUrl']= Yii::app()->createUrl('cal/main').'/';
        $param['newEventPromt']=Yii::t('CalendarModule.fullCal', 'New event:');
        $param['calendar'] = $this->translateArray($calendarOptions);
        $param = CJavaScript::encode($param);
        $js = "jQuery().eventCal($param);";
        $cs->registerScript(__CLASS__ . '#EventCal', $js);
    }

    function translateArray($arr)
    {
        foreach ($arr as $key => $data)
        {
            if (is_array($data))
            {
                foreach ($data as $k => $d)
                    $data[$k] = Yii::t('CalendarModule.fullCal', $d);
                $arr[$key] = $data;
            }
            else
                $arr[$key] = Yii::t('CalendarModule.fullCal', $data);
        }
        return $arr;
    }
}

?>
