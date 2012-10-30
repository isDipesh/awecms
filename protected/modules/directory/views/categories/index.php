<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Business Categories')
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'List All'), 'url' => array('/directory/business')),
        array('label' => Yii::t('app', 'Add New'), 'url' => array('/directory/business/create')),
        array('label' => Yii::t('app', 'Manage All'), 'url' => array('/directory/business/manage')),
        array('label' => Yii::t('app', 'All Categories')),
        array('label' => Yii::t('app', 'Create New Category'), 'url' => array('/directory/categories/create')),
        array('label' => Yii::t('app', 'Manage All Categories'), 'url' => array('/directory/categories/manage')),
    );
?>

<h1><?php echo Yii::t('app', 'Business Categories'); ?></h1>

<?php
$this->widget('SearchBlock', array('type' => 'directory'));

$categories = Awecms::buildTree(Awecms::quickSort(($allCategories)));
$this->renderPartial('_tree', array(
    'categories' => $categories,
    'depth' => 0,
));

////writeTree($categories);
//
//function writeTree($items, $depth = 0) {
//    echo '<ul>';
//    if (is_array($items)) {
//        foreach ($items as $key => $item) {
////            $link = '<a href="' . Yii::app()->baseUrl . '/directory/categories/view' . $item->id . '">' . $item->title . '</a>';
//            $link = '<a href="' . Yii::app()->createUrl('directory/categories/view', array('id' => $item->id)) . '">' . $item->title . '</a>';
//            echo '<li class="depth' . $depth . '">' . $link . '</li>';
//            if (isset($item->children))
//                writeTree($item->children, $depth + 1);
//        }
//    }else {
//        echo $depth . $items->title;
//    }
//    echo '</ul>';
//}
//
////die();
//
?>
