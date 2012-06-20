<?php
$this->pageTitle = Yii::app()->name . ' - Search results';
$this->breadcrumbs = array(
    'Search Results',
);
?>

<h3>Search Results for: "<?php echo CHtml::encode($queryString); ?>"</h3>
<?php if (!empty($results)): ?>
    <?php foreach ($results as $result):
        ?>                  
        Title: <?php echo $query->highlightMatches(CHtml::encode($result->title)); ?>
        <br/>
        Link: <?php echo CHtml::link($query->highlightMatches(CHtml::encode($result->link)), CHtml::encode($result->link)); ?>
        <br/>
        Content: <?php echo $query->highlightMatches(CHtml::encode($result->content)); ?>
        <br/>
        <hr/>
    <?php endforeach; ?>

<?php else: ?>
    <p class="error">No results matched your search terms.</p>
<?php endif; ?>