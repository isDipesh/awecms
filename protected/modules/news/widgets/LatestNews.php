<?php

class LatestNews extends AwePortlet {

    public $title;

    public function init(){
    	if (!$this->title)
			$this->title = Yii::t('app','Latest News');
		parent::init();
    }

    protected function renderContent() {
    	$news_items = News::model()->getLatestNews();
        ?>
        <ul>
    <?php foreach ($news_items as $news): ?>
        <li>
            <?php
            $title = CHtml::encode($news->title);
            echo CHtml::link($title, $news->url);
            ?>
        </li>
    <?php endforeach; ?>
    <?php
    if (!$news_items ){
        echo Yii::t('app', 'Sorry, no latest news!');
    }
    ?>
</ul>

        <?php
    }

}

?>
