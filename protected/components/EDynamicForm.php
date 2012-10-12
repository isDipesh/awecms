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
    public $class;
    public $selector = false;

    // you put as many properties as needed
    public function init() {
        if ($this->class)
            $this->class = $this->class . " dynamicForm form";
        else
            $this->class = "dynamicForm";
    }

    public function getlabel($name) {
        return CHtml::label(Awecms::generateFriendlyName($name), $name);
    }

    public function getFullTextField($item) {
        return CHtml::textField($item['key'], $item['value'], (array('class' => 'row', 'size' => strlen($item['value']) + 5)));
    }

    public function run() {
        //begin form
        echo CHtml::beginForm($this->action, $this->method, array(
            'id' => $this->id,
            'enctype' => $this->enctype,
            'class' => $this->class,
        ));


        foreach ($this->model as $item) {

            if ($this->selector)
                echo CHtml::checkBox('selector_' . $item['key']);

            $name = Awecms::generateFriendlyName($item["key"]);
            ?>
            <div class="settings row">
                <?php
                echo $this->getlabel($item['key']);

                switch ($item['type']) {
                    //add new types here
                    case 'textfield':
                        echo $this->getFullTextField($item);
                        break;
                    case 'boolean':
                        echo CHtml::hiddenField($item['key'], 0);
                        echo CHtml::checkBox($item['key'], $item['value']);
                        break;
                    case 'image_url':
                        echo $this->getFullTextField($item);
                        echo "<a class=\"right\" href=\"{$item["value"]}\" target=\"_blank\"><img src=\"{$item["value"]}\" title=\"{$name}\" alt=\"{$name}\" /></a>";
                        break;
                    case 'email':
                        echo $this->getFullTextField($item);
                        break;
                    case 'textarea':
                        echo CHtml::textArea($item['key'], $item['value']);
                    case 'NULL':
                        break;
                    default:
                        echo "Unsupported type: " . $item['type'] . " of " . $item['key'] . " with value " . $item['value'] . "<br/>";
                        break;
                }
                if (isset($item['hint'])) {
                    ?>
                    <p class="hint">
                        <?php
                        echo $item['hint'];
                        ?>
                    </p>
                    <?php
                }
                ?>

            </div>
            <?php
        }
        ?>
        <div class="row buttons">
            <?php
            echo CHtml::submitButton('Submit!');
            ?>
        </div>
        <?php
        echo CHtml::endForm();
    }

}