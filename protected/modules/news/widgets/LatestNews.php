<?php

class LatestNews extends AwePortlet {

    public $title = "Latest News";

    public function getLatestNews() {
        return News::model()->getLatestNews();
    }

    protected function renderContent() {
        $this->render('latest');
    }

}

?>
