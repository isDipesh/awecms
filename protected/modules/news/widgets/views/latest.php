<ul>
    <?php foreach ($this->getLatestNews() as $news): ?>
        <li>
            <?php
            $title = CHtml::encode($news->page->title);
            echo CHtml::link($title, array('news/view', 'id' => $news->id));
            ?>
        </li>
    <?php endforeach; ?>
    <?php
    if (!$this->getLatestNews()) {
        echo Yii::t('app', 'Sorry, no latest news!');
    }
    ?>
</ul>
