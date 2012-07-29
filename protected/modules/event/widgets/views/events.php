<ul>
    <?php foreach ($this->getUpComingEvents() as $event): ?>
        <li>
            <?php echo CHtml::link(CHtml::encode($event->page->title), array('event/view', 'id' => $event->id)); ?>
        </li>
    <?php endforeach; ?>
</ul>
