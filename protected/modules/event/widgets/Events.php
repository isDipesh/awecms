<?php

class Events extends AwePortlet {

    public $title = "Upcoming Events";

    public function getUpcomingEvents() {
        return Event::model()->getUpcomingEvents();
    }

    protected function renderContent() {
        $this->render('events');
    }

}

?>
