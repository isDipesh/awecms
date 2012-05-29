<?php
$this->breadcrumbs = array(
    'Menus' => array('/' . $this->module->id),
    Menu::model()->findByPk(1)->name,
);
?>

<a href="<?php echo $this->createUrl('/' . $this->module->id . '/item/create', array('id' => $id)); ?>"><?php echo MenuModule::t("Create New Menu Item", array(), "actions"); ?></a>
<br/><br/>

<?php Yii::app()->clientScript->registerScriptFile($this->module->assetsDirectory . "/libs/json/json2.min.js"); ?>
<?php $this->widget('mext.AtNestedSortable') ?>	
<?php
$this->widget('mext.AtHerList', array('model' => $model, 'actid' => ''));
?>

<script type="text/javascript">
    $('ol.sortable').nestedSortable({
        disableNesting: 'no-nest',
        forcePlaceholderSize: true,
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