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
$items = array(
    (object) array('id' => 1, 'title' => 'Software', 'parent_id' => 0),
    (object) array('id' => 9, 'title' => 'Hardware', 'parent_id' => 0),
    (object) array('id' => 10, 'title' => 'Linux', 'parent_id' => 1),
    (object) array('id' => 12, 'title' => 'TV', 'parent_id' => 9),
    (object) array('id' => 13, 'title' => 'PC', 'parent_id' => 9),
    (object) array('id' => 14, 'title' => 'Android', 'parent_id' => 1),
    (object) array('id' => 11, 'title' => 'JellyBean', 'parent_id' => 14),
    (object) array('id' => 110, 'title' => 'ICS', 'parent_id' => 14),
);


$categories = Awecms::buildTree(Awecms::quickSort(($dataProvider->data)));

writeTree($categories);

function writeTree($items, $depth = 0) {
    echo '<ul>';
    if (is_array($items)) {
        foreach ($items as $key => $item) {
//            $link = '<a href="' . Yii::app()->baseUrl . '/directory/categories/view' . $item->id . '">' . $item->title . '</a>';
            $link = '<a href="' . Yii::app()->createUrl('directory/categories/view', array('id'=>$item->id)) . '">' . $item->title . '</a>';
            echo '<li class="depth' . $depth . '">' . $link . '</li>';
            if (isset($item->children))
                writeTree($item->children, $depth + 1);
        }
    }else {
        echo $depth . $items->title;
    }
    echo '</ul>';
}

//die();
?>
