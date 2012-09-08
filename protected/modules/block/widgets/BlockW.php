<?php

class BlockW extends AwePortlet {

    public $block;

    public function init() {
        $this->title = $this->block->title;
//        $this->cssClass = $block->css_class;
//        print_r($this->block->attributes);
//        die();
        $this->headerCssClass = $this->block->title_css_class;
        $this->contentCssClass = $this->block->content_css_class;
        $this->visible = $this->block->enabled;
        parent::init();
    }
    
    protected function renderContent() {
     echo $this->block->content;
    }

}