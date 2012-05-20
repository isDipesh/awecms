<?php
echo "<?php\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs['$label'] = array('index');\n";
//echo "\$this->breadcrumbs[\$model->{$this->getIdentificationColumn()}] = array('view','{$this->getIdentificationColumn()}'=>\$model->{$this->getIdentificationColumn()});\n";
echo "\$this->breadcrumbs[\$model->{$this->getIdentificationColumn()}] = array('view','{$this->tableSchema->primaryKey}'=>\$model->{$this->tableSchema->primaryKey});\n";
echo "\$this->breadcrumbs[] = Yii::t('app', 'Update');\n";
?>

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
	//array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
);
?>

<?php 
$pk = "\$model->" . $this->getIdentificationColumn();
printf('<h1> %s %s </h1>',
'<?php echo Yii::t(\'app\', \'Update\');?>',
'<?php echo ' . $pk . '; ?>'); ?>

<?php echo "<?php\n"; ?>
$this->renderPartial('_form', array(
			'model'=>$model));
?>