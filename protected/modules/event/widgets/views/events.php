<ul>
    <?php foreach ($this->getUpComingEvents() as $event): ?>
        <li>
            <?php
            if (strtotime($event->start) < time())
                $title = '<b>' . CHtml::encode($event->page->title) . '</b>';
            else
                $title = CHtml::encode($event->page->title);

            echo CHtml::link($title, array('event/view', 'id' => $event->id));

            if (strtotime($event->start) < time())
                echo " (Running)"
                ?>
        </li>
    <?php endforeach; ?>
</ul>
