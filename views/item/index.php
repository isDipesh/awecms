<?php
$this->breadcrumbs = array(
    'Menus' => array('/' . $this->module->id),
    Menu::model()->findByPk($id)->name
);
?>

<a href="<?php echo $this->createUrl('/' . $this->module->id . '/item/create/'.$id); ?>"><?php echo MenuModule::t("Create New Menu Item", array(), "actions"); ?></a>
<br/><br/>

<?php Yii::app()->clientScript->registerScriptFile($this->module->assetsDirectory . "/libs/json/json2.min.js"); ?>
<?php $this->widget('mext.AtNestedSortable') ?>	
<?php
$this->widget('mext.AtHerList', array('model' => $model, 'activeId' => $activeId));
?>

<script type="text/javascript">
    $('ol.sortable').nestedSortable({
        disableNesting: 'no-nest',
        forcePlaceholderSize: true,
	items: 'li',
	placeholder: 'placeholder',
        update: function () {
            list = $(this).nestedSortable('toArray', {startDepthCount: 0});
            $.post('<?php echo $this->createUrl('/' . $this->module->id . '/ajax/save') ?>',
            {list: list },
            function(data){
                $("#result").hide().html(data).fadeIn('slow')
            },
            "html"
        );
        }
    });
</script>