<div class="form">
    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'access-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'enabled'); ?>
        <?php echo $form->checkBox($model, 'enabled'); ?>
        <?php echo $form->error($model, 'enabled'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'module'); ?>
        <?php echo $form->dropDownList($model, 'module', RoleModule::getModulesInPair(), array('prompt' => 'None')); ?>
        <?php echo $form->error($model, 'module'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'controller'); ?>
        <?php echo $form->dropDownList($model, 'controller', RoleModule::getControllersInPair($model->module)); ?>
        <?php echo $form->error($model, 'controller'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'action'); ?>
        <?php echo $form->dropDownList($model, 'action', RoleModule::getInPair(Yii::app()->metadata->getActions(ucfirst($model->controller) . 'Controller', $model->module))); ?>
        <?php echo $form->error($model, 'action'); ?>
    </div>

    <label for="roles"><strong><?php echo Yii::t('app', 'Roles'); ?>:</strong></label>

    <div id="defaultRoles" class="row">
        <?php echo $form->checkBox($model, 'all'); ?>
        <?php echo $form->labelEx($model, 'all'); ?>
        <?php echo $form->error($model, 'all'); ?>

        <?php echo $form->checkBox($model, 'loggedIn'); ?>
        <?php echo $form->labelEx($model, 'loggedIn'); ?>
        <?php echo $form->error($model, 'loggedIn'); ?>

        <?php echo $form->checkBox($model, 'guest'); ?>
        <?php echo $form->labelEx($model, 'guest'); ?>
        <?php echo $form->error($model, 'guest'); ?>
    </div>

    <div id="roles" class="row nm_row">
        <?php
        echo CHtml::checkBoxList('Access[roles]', array_map('Awecms::getPrimaryKey', $model->roles), CHtml::listData(Role::model()->findAll(), 'id', 'name'), array('attributeitem' => 'id'));
        ?>
    </div>

    <div class="row">
        <?php
        /*
          echo $form->labelEx($model, 'rule'); ?>
          <?php
          echo CHtml::activeDropDownList($model, 'rule', array(
          'allow' => Yii::t('app', 'Allow'),
          'deny' => Yii::t('app', 'Deny'),
          ));
          ?>
          <?php echo $form->error($model, 'rule');
         */
        ?>

    </div>


    <?php
    echo CHtml::submitButton(Yii::t('app', 'Save'));
    echo CHtml::Button(Yii::t('app', 'Cancel'), array(
        'submit' => 'javascript:history.go(-1)'));
    $this->endWidget();
    ?>
</div> <!-- form -->