<?php

class ItemList extends CWidget {

    public $items;
    public $activeId = 2;
    public $id;
    public $css = true;
    private $_processed = array();

    public function init() {
        //$this->id = 'menu-list-item-1';
        if ($this->css) {
            $css = "
            ";
            Yii::app()->clientScript->registerCoreScript('jquery');
            Yii::app()->clientScript->registerCoreScript('jquery.ui');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->getModule('menu')->assetsDirectory . '/libs/nestedsortable/jquery.ui.nestedSortable.js');
            Yii::app()->clientScript->registerCssFile(Yii::app()->getModule('menu')->assetsDirectory . '/libs/nestedsortable/nestedSortable.css');
            Yii::app()->clientScript->registerCss('AtHerList', $css);
        }
    }

    public static function depthSort($a, $b) {
        //return $a->depth > $b->depth;
    }

    public static function leftSort($a, $b) {
        return $a->lft > $b->lft;
    }

    public static function echoer($a) {
        print_r($a->id);
    }

    public function run() {

        //sort items first to move deeper items to last
        usort($this->items, 'self::depthSort');
        usort($this->items, 'self::leftSort');

        echo '<div class="header-wrapper" style="height:20px">';
        echo '<span style="padding-left:40px"></span><b>Title</b>';
        echo '<div style="float:right;width:200px;text-align:center;"><b>Active</b></div>';
        echo "</div>";
        echo '<ol id="' . $this->id . '" class="sortable ui-sortable menu-item-list">
            ';
        foreach ($this->items As $row):
            if (in_array($row->id, $this->_processed))
                continue;
            $this->getRender($row);
            if ($row->children()) {
                echo "<ol>";
                $children = $row->children;
                //array_map('self::echoer',$children);
                //usort($children, 'self::depthSort');
                //usort($children, 'self::leftSort');
                $this->getchildren($children);
                echo "</ol>";
            }
            echo "</li>";
        endforeach;
        echo '</ol>';
    }

    public function getchildren($items) {
        usort($items, 'self::leftSort');
        //array_map('self::echoer', $items);
        foreach ($items As $row):
            $this->getRender($row);
            if ($row->children()) {
                echo "<ol>";
                $this->getchildren($row->children());
                echo "</ol>";
            }
            echo "</li>";
        endforeach;
    }

    public function getRender($row) {
        $this->_processed[] = $row->id;
        echo '<li id="list_' . $row->id . '">';
        ?>
        <div style="height:20px;" class="item-wrapper <?php echo ($this->activeId == $row->id) ? 'active' : ''; ?>">
            <b><label><?php echo $row->name; ?></label></b>
            <div class="right"><a href="<?php echo Yii::app()->createUrl(Yii::app()->getModule('menu')->id . '/item/edit/' . $row->id); ?>">Edit</a></div>
            <div class="right"><input type="checkbox" disabled="disabled" <?php echo($row->enabled) ? "checked" : ""; ?>/></div>
        </div>
        <?php
    }

}