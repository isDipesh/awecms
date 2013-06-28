<?php

class Events extends AwePortlet {

    public function init() {
        if (!$this->title)
            $this->title = Yii::t('app', 'Upcoming Events');
        parent::init();
    }

    public function getUpcomingEvents() {
        return Event::model()->getUpcomingEvents();
    }

    protected function renderContent() {
        ?>
        <ul>
            <?php foreach ($this->getUpComingEvents() as $event): ?>
                <li>
                    <?php
                    if (strtotime($event->start) < time())
                        $title = '<b>' . CHtml::encode($event->page->title) . '</b>';
                    else
                        $title = CHtml::encode($event->page->title);

                    echo CHtml::link($title, array('/event/view', 'id' => $event->id));

                    if (strtotime($event->start) < time())
                        echo ' (' . Yii::t('app', 'Running') . ')';
                    ?>
                </li>
            <?php endforeach; ?>
            <?php
            if (!$this->getUpComingEvents()) {
                echo Yii::t('app', '<li>Sorry, no upcoming events!</li>');
            }
            ?>
        </ul>

        <?php
    }

}
?>
