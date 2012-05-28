<?php
$this->breadcrumbs = array(
    'Menu' => array('/menu/'),
    'Menu Items',
);
?>

<a href="<?php echo $this->createUrl('/menu/items/new', array('id' => $id)); ?>"><?php echo MenuModule::t("New", array(), "actions"); ?></a>
<br/><br/>

<?php Yii::app()->clientScript->registerScriptFile($this->module->assetsDirectory . "/libs/json/json2.min.js"); ?>
<?php $this->widget('mext.AtNestedSortable') ?>	
<?php
$this->widget('mext.AtHerList', array('model' => $model, 'actid' => $actid));
?>

<script type="text/javascript">
    $('ol.sortable').nestedSortable({
        disableNesting: 'no-nest',
        forcePlaceholderSize: true,
        placeholder: 'placeholder',
        update: function () {
            list = $(this).nestedSortable('toArray', {startDepthCount: 0});
            $.post('<?php echo $this->createUrl('/'.Yii::app()->controller->module->id.'/ajax/save') ?>',
            {list: list },
            function(data){
                $("#result").hide().html(data).fadeIn('slow')
            },
            "html"
        );
        }
    });
</script>