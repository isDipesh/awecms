<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Pages') => array('index'),
    Yii::t('app', 'Manage'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
        array('label' => Yii::t('app', 'List'), 'url' => array('index')),
    );


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('page-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Pages'); ?> </h1>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?><div class="search-form" style="display: none">
    <?php
    $this->renderPartial('_search', array(
        'page' => $page,
    ));
    ?>
</div><!-- search-form -->
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'page-grid',
    'dataProvider' => $page->search(),
    'filter' => $page,
    'columns' => array(
        'id',
        array(
            'name' => 'user_id',
            'value' => 'isset($data->user->username)?$data->user->username:"N/A"'
        ),
        'title',
        'content',
        'status',
        'created_at',
        'modified_at',
        array(
            'name' => 'parent_id',
            'value' => 'isset($data->pages->title)?$data->pages->title:"N/A"'
        ),
        'order',
        'type',
        'comment_status',
        array(
            'class' => 'JToggleColumn',
            'name' => 'tags_enabled',
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'model' => get_class($page),
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
        'permission',
        'password',
        'views',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>