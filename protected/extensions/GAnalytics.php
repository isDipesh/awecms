<?php

class GAnalytics extends CWidget {

    public $id;

    public function init() {

        if (!$this->id)
            $this->id = Settings::get('SEO', 'google_analytics_tracking_ID');
        if (!$this->id)
            return false;
        $this->renderContent();
    }

    public function renderContent() {
        echo "<script type=\"text/javascript\">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '" . $this->id . "']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>";
    }

}