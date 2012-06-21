<?php
$this->pageTitle = Yii::app()->name . ' - Search results';
$this->breadcrumbs = array(
    Yii::t('app', 'Search Results'),
);
?>

<?php
$this->widget('SearchBlock', array('query' => $queryString));
?>

<h3>Search results for <em><strong><?php echo CHtml::encode($queryString); ?></strong></em></h3>
<?php if (!empty($results)): ?>
    <?php foreach ($results as $result):
        ?>                  
        <a href="<?php echo CHtml::encode($result->link) ?>" title="<?php echo CHtml::encode($result->title); ?>">
            <?php echo $query->highlightMatches(CHtml::encode($result->title)); ?>
        </a>
        <br/>
        <?php echo CHtml::encode($result->content); ?>
        <br/>
        <hr/>
    <?php endforeach; ?>

<?php else: ?>
    <p class="error">No results matched your search terms.</p>
<?php endif; ?>