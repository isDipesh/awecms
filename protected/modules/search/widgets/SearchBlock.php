<?php

class SearchBlock extends CWidget {

    public $query = '';
    public $type = '';

    public function run() {
        $placeholder = ($this->type) ? Yii::t('app', 'Search') . ' ' . ucfirst($this->type) . '...' : Yii::t('app', 'Search') . '...';
        echo CHtml::beginForm(array('/search/' . $this->type), 'get', array('style' => 'inline'));
        echo CHtml::textField('q', $this->query, array('placeholder' => $placeholder, 'style' => 'width:140px;'));
        if ($this->query != '')
            echo CHtml::submitButton('Search!', array('name' => ''));
        echo CHtml::endForm('');
    }

}