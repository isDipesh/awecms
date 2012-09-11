<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Contents'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'All Pages'), 'url' => array('/page')),
        array('label' => Yii::t('app', 'Create New Page'), 'url' => array('/page/create')),
        array('label' => Yii::t('app', 'Manage Pages'), 'url' => array('/page/manage')),
        array('label' => Yii::t('app', 'All Contents')),
    );
?>

<h1>
    <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'All Contents'); ?>
</h1>

<?php
if (count($model->search()->data)) {
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
            'status',
            'created_at',
            'modified_at',
            'type',
            'comment_status',
            array(
                'class' => 'JToggleColumn',
                'name' => 'tags_enabled',
                'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                'model' => get_class($page),
                'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
            ),
            'views',
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    ));
} else {
    echo Yii::app('app', 'No results found!');
}