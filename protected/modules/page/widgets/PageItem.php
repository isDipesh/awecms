<?php

class PageItem extends CWidget {

    public $data;
    public $fields = array();
    private $page;

    public function init() {

        //users do not tend to use array for single item
        if (!is_array($this->fields)) {
            $tmp = array();
            $tmp[0] = $this->fields;
            $this->fields = $tmp;
        }

        //get Page
        if (get_class($this->data) == 'Page')
            $this->page = $this->data;
        else
            $this->page = $this->data->page; //for update
    }

    public function run() {

        $page = $this->page;
        ?>


        <?php
        foreach ($this->fields as $key => $field) {

            //linkify the first field
            if ($key == 0) {
                ?>
                <h2><?php echo CHtml::link(CHtml::encode($page->$field), array('view', 'id' => $this->data->id)); ?></h2>
                <?php
                continue;
            }
            switch ($field) {
                case 'title':
                    ?>
                    <?php echo CHtml::encode($page->title); ?><br/>
                    <?php
                    break;
                case 'content':
                    echo nl2br($page->content);
                    break;
                case 'excerpt':
                    if (!empty($page->content)) {
                        ?>
                        <div class="field">
                            <div class="field_value">
                                <?php echo $page->getExcerpt(); ?>
                            </div>
                        </div>
                        <?php
                    }
                    break;
                case 'sub-pages':
                    if (count($page->pages)) {
                        ?>
                        <h2><?php echo CHtml::link(Yii::t('app', Awecms::pluralize('Sub-Page', 'Sub-Pages', count($page->pages))), array('/page/page')); ?></h2>
                        <ul class="sub_pages">
                            <?php
                            if (is_array($page->pages))
                                foreach ($page->pages as $foreignobj) {
                                    echo '<li>';
                                    echo CHtml::link($foreignobj->title, array('/page/page/view', 'id' => $foreignobj->id));
                                }
                            ?>
                        </ul>
                        <?php
                    }
                    break;
                case 'categories':
                    if (count($page->categories)) {
                        ?>
                        <h2><?php echo CHtml::link(Yii::t('app', Awecms::pluralize('Category', 'Categories', count($page->categories))), array('/category/category')); ?></h2>
                        <ul class="categories">
                            <?php
                            if (is_array($page->categories))
                                foreach ($page->categories as $foreignobj) {
                                    echo '<li>';
                                    echo CHtml::link($foreignobj->name, array('/category/category/view', 'id' => $foreignobj->id));
                                }
                            ?>
                        </ul>
                        <?php
                    }
                    break;
                case 'views':
                    if (!empty($page->views)) {
                        ?>
                        <div class="field">
                            <?php echo CHtml::encode($page->getAttributeLabel('views')); ?>:
                            <?php
                            echo CHtml::encode($page->views);
                            ?>
                        </div>
                        <?php
                    }
                    break;
                default :
                    break;
            }
        }
    }

}