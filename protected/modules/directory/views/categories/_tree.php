<?php

writeTree($items, $depth);

function writeTree($items, $depth) {

    echo '<ul>';
    if (is_array($items)) {
        foreach ($items as $item) {
//            $link = '<a href="' . Yii::app()->baseUrl . '/directory/categories/view' . $item->id . '">' . $item->title . '</a>';
            $link = '<a href="' . Yii::app()->createUrl('directory/categories/view', array('id' => $item->id)) . '">' . $item->title . '</a>';
            $str = '<li class="depth' . $depth . '">' . $link;
//            $str.= ' (' . $item->count . ')';
            $str.= '</li>';
            echo $str;
            if (isset($item->children)) {
                writeTree($item->children, $depth + 1);
//                $this->renderPartial('_tree', array(
//                    'items' => $item->children,
//                    'depth' => $depth + 1,
//                ));
            }
        }
    } else {
//    $link = '<a href="' . Yii::app()->createUrl('directory/categories/view', array('id' => $items->id)) . '">' . $items->title . '</a>';
//    echo '<li class="depth' . $depth . '">' . $link . '</li>';
    }
    echo '</ul>';
}

?>