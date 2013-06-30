<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Login");
$this->breadcrumbs = array(
    UserModule::t("Login"),
    );
    ?>

    <h1><?php echo UserModule::t("Login"); ?></h1>

    <?php if (Yii::app()->user->hasFlash('loginMessage')): ?>

    <div class="success">
        <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
    </div>

<?php endif; ?>

<div class="form">
    <?php echo CHtml::beginForm(); ?>

    <?php echo CHtml::errorSummary($model); ?>

    <?php echo CHtml::activeLabelEx($model, 'username'); ?>
    <?php echo CHtml::activeTextField($model, 'username') ?>

    <?php echo CHtml::activeLabelEx($model, 'password'); ?>
    <?php echo CHtml::activePasswordField($model, 'password') ?>

    <div class="rememberMe">
        <?php echo CHtml::activeCheckBox($model, 'rememberMe'); ?>
        <?php echo CHtml::activeLabelEx($model, 'rememberMe'); ?>
    </div>

    <div class="submit">
        <?php echo CHtml::submitButton(UserModule::t("Login")); ?>
    </div>

    <p class="hint">
        <?php echo CHtml::link(UserModule::t("Register"), Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?>
    </p>

    <?php echo CHtml::endForm(); ?>
</div><!-- form -->

<script type="text/javascript" language="javascript">
document.getElementById('UserLogin_username').focus();
</script>


<?php
$form = new CForm(array(
    'elements' => array(
        'username' => array(
            'type' => 'text',
            'maxlength' => 32,
            ),
        'password' => array(
            'type' => 'password',
            'maxlength' => 32,
            ),
        'rememberMe' => array(
            'type' => 'checkbox',
            )
        ),
    'buttons' => array(
        'login' => array(
            'type' => 'submit',
            'label' => 'Login',
            ),
        ),
    ), $model);
?>