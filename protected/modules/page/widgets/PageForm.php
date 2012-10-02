<?php

class PageForm extends CWidget {

    public $model;
    public $form;
    public $fields = array();
    private $scenario;
    private $page;

    public function init() {

        //check for required arguments
        if (!$this->model)
            throw new CHttpException('500', '$model must be provided for PageForm Widget');
        if (!$this->form)
            throw new CHttpException('500', '$form must be provided for PageForm Widget');

        //users do not tend to use array for single item
        if (!is_array($this->fields)) {
            $tmp = array();
            $tmp[0] = $this->fields;
            $this->fields = $tmp;
        }

        //get Page
        if (get_class($this->model) == 'Page')
            $this->page = $this->model;
        else if ($this->model->page)
            $this->page = $this->model->page; //for update
        else
            $this->page = new Page; //for create




            
//get scenario
        $this->scenario = $this->model->scenario;
    }

    public function run() {

        $page = $this->page;
        $form = $this->form;

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
                    $baseUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.page.assets'));
                    Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/slug.js');
                    if ($this->scenario == 'insert')
                        Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/create_slug.js');
                    ?>
                    <div class="row sticky">
                            <?php echo $form->labelEx($page, 'slug', array('id' => 'slug_label', 'style' => 'display:inline;')); ?>
                        <div id="slug_holder" style="display:inline">
                            <?php
                            $slug = isset($page->slug->slug) ? $page->slug->slug : '';
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
                        $this->widget('ext.redactor.ERedactorWidget', array(
                            "model" => $page,
                            "attribute" => "content",
                        ));
                        ?>
                    <?php echo $form->error($page, 'content'); ?>
                    </div>
                    <?php
                    break;
                case 'user':
                    if (Yii::app()->getModule('user')->isAdmin()) {
                        if (!isset($page->user))
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
                        $allModels = Page::findByType(get_class($this->model));
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
                case 'categories':
                    ?>
                    <div class="row nm_row">
                        <label for="categories"><?php echo Yii::t('app', 'Categories'); ?></label>
                        <?php
                        echo CHtml::checkBoxList('Page[categories]', array_map('Awecms::getPrimaryKey', $page->categories), CHtml::listData(Category::model()->findAll(), 'id', 'name'), array('attributeitem' => 'id', 'checkAll' => 'Select All'));
                        ?>
                    </div>
                    <?php
                    break;
                default :
                    break;
            }
        }
    }

}