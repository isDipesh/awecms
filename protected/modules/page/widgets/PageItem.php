<?php

class PageItem extends CWidget {

    public $data;
    public $fields = array();
    private $page;

    public function init() {

        //check for required arguments
        if (!$this->data)
            throw new CHttpException('500', '$data must be provided for PageItem Widget');

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
                    <span itemprop="headline"><?php echo $page->title; ?></span>
                    <?php
                    break;
                case 'content':
                    echo '<div class="rte-text" itemprop="articleBody">' . $page->content . "</div>";
                    break;
                case 'created_at':
                    echo '<div class="post-time">' . Yii::t('app', 'Posted on ') . '<span itemprop="datePublished">' . date('F d, Y h:m A', strtotime($page->created_at)) . "</span></div>";
                    break;
                case 'excerpt':
                    if (!empty($page->content)) {
                        ?>
                        <div class="field">
                            <div class="field_value">
                                <?php echo nl2br($page->getExcerpt()); ?>
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
                    if (Yii::app()->hasModule('category') && count($page->categories)) {
                        ?>
                        <h2><?php echo CHtml::link(Yii::t('app', Awecms::pluralize('Category', 'Categories', count($page->categories))), array('/category/category')); ?></h2>
                        <ul class="categories">
                            <?php
                            if (is_array($page->categories))
                                foreach ($page->categories as $foreignobj) {
                                    echo '<li>
                                        <a href="' . Yii::app()->createUrl('/category/category/view', array('id' => $foreignobj->id)) . '">
                                        <span itemprop="articleSection">' . $foreignobj->name . '</span>
                                        </a>
                                        </li>';
                                }
                            ?>
                        </ul>
                        <?php
                    }
                    break;
                case 'views':
                    if (!empty($page->views)) {
                        ?>
                        <span class="field">
                            <span class="field_name">
                                <?php echo CHtml::encode($page->getAttributeLabel('views')); ?>:
                                </pan>
                                <span class="field_value">
                                    <?php
                                    echo CHtml::encode($page->views);
                                    ?>
                                </span>
                            </span>
                            <?php
                        }
                        break;
                    case 'tags':
                        if (Yii::app()->hasModule('tag')) {
                            $tags = $page->getTags();
                            if (!empty($tags)) {
                                ?>
                                <div class="field">
                                    <?php echo Yii::t('app', 'Tags'); ?>:
                                    <?php
                                    echo '<span class="tags" itemprop="keywords">' . implode(', ', $tags) . '</span>';
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        break;
                    default :
                        break;
                }
            }
        }

    }