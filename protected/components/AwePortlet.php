<?php

class AwePortlet extends CWidget {

    public $title;
    public $cssClass = 'portlet';
    public $headerCssClass = 'portlet-header';
    public $contentCssClass = 'portlet-content';
    public $visible = true;

    public function init() {
        if (!$this->visible)
            return;
        $class = strtolower(get_class($this)) . '-portlet';
        echo "<div class=\"{$this->cssClass} {$class}\">\n";
        if ($this->title !== null) {
            echo "<div class=\"{$this->headerCssClass}\" style=\"position:relative;\">{$this->title}\n";
            echo "  <div class=\"expandButton\" style=\"width:18px;height:18px;top:-1px;right:4px;background-repeat:no-repeat;position:absolute;\" class=\"expandButton\"></div></div>\n";
//            echo "  <div class=\"expandButton\" style=\"width:18px;height:18px;top:-1px;right:4px;background-image:url(" . Yii::app()->request->baseUrl . "/systemImages/widgetCollapseIcon.png);background-repeat:no-repeat;position:absolute;\" class=\"expandButton\"></div></div>\n";
        }
        echo "<div class=\"{$this->contentCssClass}\">\n";
    }

    public function run() {
        if ($this->visible)
            $this->renderContent();
        echo "</div><!-- {$this->contentCssClass} -->\n";
        echo "</div><!-- {$this->cssClass} -->";
    }

    protected function renderContent() {
        
    }

}