<?php
$this->pageTitle = Yii::app()->name . ' - Search results';
$this->breadcrumbs = array(
    Yii::t('app', 'Search Results'),
);
?>

<?php
$this->widget('SearchBlock', array('query' => $originalQuery, 'type' => $type));
?>

<h3>
    <?php if ($type) echo Yii::t('app', ucfirst($type)); ?>
    <?php echo Yii::t("app", "Search results"); ?>
    <?php
    if ($originalQuery) {
        echo Yii::t("app", "for");
        ?>
        '<em><strong><?php echo CHtml::encode($originalQuery); ?>'</strong></em>
<?php } ?>
</h3>
<?php if (!empty($results)): ?>
    <?php foreach ($results as $result):
        ?>                  
        <a href="<?php echo Yii::app()->createUrl($result->link) ?>" title="<?php echo CHtml::encode($result->title); ?>">
        <?php echo $query->highlightMatches(CHtml::encode($result->title)); ?>
        </a>
        <br/>
        <?php echo $query->highlightMatches(Awecms::summarize($result->content)); ?>
        <br/>
        <hr/>
    <?php endforeach; ?>

<?php else: ?>
    <p class="error">No results matched your search terms.</p>
<?php endif; ?>