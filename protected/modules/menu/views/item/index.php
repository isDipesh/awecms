<?php
$this->breadcrumbs = array(
    'Menus' => array('/' . $this->module->id),
    Menu::model()->findByPk($id)->name
);
$this->menu = array(
    array('label' => MenuModule::t('Manage Menus'), 'url' => array('/menu')),
    array('label' => MenuModule::t('Create New Menu'), 'url' => array('/menu/menu/create')),
);
?>

<a class="button" href="<?php echo $this->createUrl('/' . $this->module->id . '/item/create/' . $id); ?>"><?php echo MenuModule::t("Create New Menu Item", array(), "actions"); ?></a>
<br/><br/>

<?php Yii::app()->clientScript->registerScriptFile($this->module->assetsDirectory . "/libs/json/json2.min.js"); ?>

<?php
$this->widget('application.modules.menu.extensions.ItemList', array('items' => $items, 'activeId' => $activeId));
?>

<script type="text/javascript">
    $('ol.sortable').nestedSortable({
        handle: 'div',
        helper:	'clone',
        opacity: .5,
        revert: 250,
        tolerance: 'pointer',
        toleranceElement: '> div',
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