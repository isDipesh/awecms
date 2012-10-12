<?php

class Disqus extends CWidget {

    public $id;

    public function init() {

        if (!$this->id)
            $this->id = Settings::get('site', 'disqus_id');
        if (!$this->id)
            return false;
        $this->renderContent();
    }

    public function renderContent() {
        echo "<script type=\"text/javascript\">
        var disqus_shortname = '".$this->id."'; //
        (function () {
            var s = document.createElement('script'); s.async = true;
            s.type = 'text/javascript';
            s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
            (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
        }());
        </script>";
    }

}