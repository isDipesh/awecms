<?php

class SearchBlock extends CWidget {

    public $query = '';

    public function run() {
        echo CHtml::beginForm(array('/search'), 'get', array('style' => 'inline'));
        echo CHtml::textField('q', $this->query, array('placeholder' => 'Search...', 'style' => 'width:140px;'));
        if ($this->query != '')
            echo CHtml::submitButton('Search!', array('name' => ''));
        echo CHtml::endForm('');
    }

}