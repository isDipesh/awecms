<?php

class OCHtml extends CHtml {

    public static function checkBoxList($name, $select, $data, $htmlOptions = array()) {
    
        $selections_id = array();
        foreach ($select as $item){
            $selections_id[] = $item->primaryKey;
        }
        return parent::checkBoxList($name, $selections_id, $data, $htmlOptions);
    }

}

