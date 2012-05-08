<?php

class EDynamicForm extends CWidget {

    // attribute = array('name'=>'','value'=>'',
    // 'type'=>'text|radio|textarea|select',
    // 'items'=>array()<--if select,
    // 'htmlOptions'=>array())
    public $attributes = array();
    public $id = null;
    public $enctype = null;
    public $action = null;
    public $method = 'post';
    public $model = null;
    public $class = null;

    // you put as many properties as needed
    public function init() {
        if ($this->class)
            $this->class = $this->class . " dynamicForm";
        else
            $this->class = "dynamicForm";
    }

    public function getlabel($name) {
        return CHtml::label(Awecms::generateFriendlyName($name), $name);
    }

    public function getFullTextField($item) {
        $s = $this->getlabel($item['key']);
        $s .= CHtml::textField($item['key'], $item['value'], (array('class' => 'row', 'size' => strlen($item['value']) + 5)));
        return $s;
    }

    public function run() {

        //begin form
        echo CHtml::beginForm($this->action, $this->method, array(
            'id' => $this->id,
            'enctype' => $this->enctype,
            'class' => $this->class,
        ));


        foreach ($this->model as $item) {

            $name = Awecms::generateFriendlyName($item["key"]);

            switch ($item['type']) {
                case 'textfield':
                    echo $this->getFullTextField($item);
                    echo "<br/>";
                    break;
                case 'boolean':
                    echo $this->getlabel($item['key']);
                    echo CHtml::hiddenField($item['key'],0);
                    echo CHtml::checkBox($item['key'], $item['value']);
                    echo "<br/>";
                    break;
                case 'image_url':
                    echo $this->getFullTextField($item);
                    echo "<a class=\"right\" href=\"{$item["value"]}\" target=\"_blank\"><img src=\"{$item["value"]}\" title=\"{$name}\" alt=\"{$name}\" /></a>";
                    echo "<br/>";
                    break;
                case 'email':
                    echo $this->getFullTextField($item);
                    echo "<br/>";
                    break;
                case 'textarea':
                    echo $this->getlabel($item['key']);
                    echo CHtml::textArea($item['key'], $item['value']);

                    echo "<br/>";
                case 'NULL':
                    break;
                default:
                    echo "Unsupported type: " . $item['type'] . " of " . $item['key'] . " with value " . $item['value'] . "<br/>";
                    break;
            }
        }
        echo CHtml::submitButton('Submit!');
        echo CHtml::submitButton('Submit!');
        echo CHtml::endForm();
    }

}