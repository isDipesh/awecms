<?php

class AwePortlet extends CWidget {

    public $title;
    public $cssClass = 'portlet';
    public $decorationCssClass = 'portlet-decoration';
    public $headerCssClass = 'portlet-title';
    public $contentCssClass = 'portlet-content';
    public $visible = true;

    public function init() {
        if (!$this->visible)
            return;
        $class = strtolower(get_class($this)) . '-portlet';
        echo "<div class=\"{$this->cssClass} {$class}\">\n";
        if ($this->title !== null) {
            echo "<div class=\"{$this->decorationCssClass}\">\n";
            echo "<div class=\"{$this->headerCssClass}\">{$this->title}\n";
            // echo "<div class=\"expandButton\">+</div>\n";
            echo "</div></div>";

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