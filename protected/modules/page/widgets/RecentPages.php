<?php
class RecentPages extends AwePortlet{
	
	public $title;

	public function init(){
	if (!$this->title)
		$this->title = Yii::t('app','Recent Pages');
		parent::init();
	}

	public function run(){
		$pages = Page::model()->getRecentPages();
		
	?>
	<ul>
    <?php foreach ($pages as $page): ?>
        <li>
            <?php
            	$title = CHtml::encode($page->title);
            	echo CHtml::link($title, $page->url);
            ?>
        </li>
    <?php endforeach; ?>
    <?php
    if (!$pages) {
        echo Yii::t('app', 'Sorry, no recent pages!');
    }
    ?>
	</ul>
	<?php
		
		parent::run();
	}

}