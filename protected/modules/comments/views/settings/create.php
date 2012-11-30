<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Comments') => array('/comments'),
    Yii::t('app', 'Settings') => array('.'),
    Yii::t('app', 'Create'),
);
$this->menu = array(
    array('label' => Yii::t('CommentsModule.msg', 'All Comments'), 'url' => array('/comments')),
    array('label' => Yii::t('CommentsModule.msg', 'Active Comments'), 'url' => Yii::app()->createUrl('comments/manage?status=1')),
    array('label' => Yii::t('CommentsModule.msg', 'Pending Comments'), 'url' => Yii::app()->createUrl('comments/manage?status=0')),
    array('label' => Yii::t('CommentsModule.msg', 'Trash'), 'url' => Yii::app()->createUrl('comments/manage?status=2')),
    array('label' => Yii::t('CommentsModule.msg', 'Comment Settings')),
);
?>

<h1> Create New Comment Settings </h1>
<?php
$this->renderPartial('_form', array(
            'model' => $model,
            'buttons' => 'create'));

?>