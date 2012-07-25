<?php

class PageForm extends CWidget {

    public $model;
    public $form;
    public $fields = array();

    public function run() {

        if ($this->model->page)
            $page = $this->model->page; //for update
        else
            $page = new Page; //for create

        $form = $this->form;

        if (!is_array($this->fields)) {
            $tmp = array();
            $tmp[0] = $this->fields;
            $this->fields = $tmp;
        }

        foreach ($this->fields as $field) {

            switch ($field) {
                case 'title':
                    ?>
                    <div class="row">
                        <?php echo $form->labelEx($page, 'title'); ?>
                        <?php echo $form->textField($page, 'title', array('size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($page, 'title'); ?>
                    </div>
                    <?php
                    break;
                case 'slug':
                    ?>
                    <div class="row sticky">
                        <?php echo $form->labelEx($page, 'slug'); ?>
                        <div id="slug_holder">
                            <?php
                            $slug = isset($page->slug->slug) ? $page->slug->slug : '&nbsp;';
                            echo $slug;
                            ?>
                        </div>
                        <?php echo CHtml::textField("Page[slug]", $slug, array('size' => 65, 'style' => 'display:none;')); ?>
                    </div>
                    <?php
                    break;
                case 'content':
                    ?>
                    <div class="row">
                        <?php echo $form->labelEx($page, 'content'); ?>
                        <?php
                        $this->widget('ext.ckeditor.CKEditorWidget', array(
                            "model" => $page,
                            "attribute" => "content",
                            "defaultValue" => $page->content,
                            # Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
                            "config" => array(
                                "height" => "400px",
                                "width" => "100%",
                                "filebrowserBrowseUrl" => Yii::app()->createUrl("/file/uploader"),
                            ),
                        ));
                        ?>
                        <?php echo $form->error($page, 'content'); ?>
                    </div>
                    <?php
                    break;
                case 'user':
                    if (Yii::app()->getModule('user')->isAdmin()) {
                        if (!isset($this->model->page->user))
                            $page->user = Yii::app()->user->id;
                        ?>
                        <div class="row">
                            <?php echo $form->labelEx($page, 'user_id'); ?>
                            <?php echo $form->dropDownList($page, 'user', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('prompt' => 'None')); ?>
                            <?php echo $form->error($page, 'user_id'); ?>
                        </div>
                        <?php
                    }
                    break;
                case 'status':
                    ?>
                    <div class="row">
                        <?php echo $form->labelEx($page, 'status'); ?>
                        <?php
                        echo CHtml::activeDropDownList($page, 'status', array(
                            'published' => Yii::t('app', 'Published'),
                            'trashed' => Yii::t('app', 'Trashed'),
                            'draft' => Yii::t('app', 'Draft'),
                        ));
                        ?>
                        <?php echo $form->error($page, 'status'); ?>
                    </div>
                    <?php
                    break;
                case 'parent':
                    ?>
                    <div class="row">
                        <?php echo $form->labelEx($page, 'parent_id'); ?>
                        <?php
                        $allModels = Page::model()->findAll();
                        foreach ($allModels as $key => $aModel) {
                            if ($aModel->id == $page->id)
                                unset($allModels[$key]);
                        }
                        echo $form->dropDownList($page, 'parent', CHtml::listData($allModels, 'id', 'title'), array('prompt' => 'None'));
                        ?>
                        <?php echo $form->error($page, 'parent_id'); ?>
                    </div>
                    <?php
                    break;
                default :
                    break;
            }
        }
    }

}