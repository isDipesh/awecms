<?php

class Awecms {



    public static function getSiteName() {
        if (Awecms::get('system', 'site_name'))
            return Awecms::get('system', 'site_name');
        else
            return Yii::app()->name;
    }

    public static function array_to_object($array) {
        $obj = new stdClass;
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                $obj->{$k} = Awecms::array_to_object($v); //RECURSION
            } else {
                $obj->{$k} = $v;
            }
        }
        return $obj;
    }

}

?>
