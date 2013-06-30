    UserModule::t("Login") => array('/user/login'),
    UserModule::t("Change Password"),
);
?>

<h1><?php echo UserModule::t("Change Password"); ?></h1>


<div class="form">
<?php echo CHtml::beginForm(); ?>

    <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
    <?php echo CHtml::errorSummary($form); ?>

    <?php echo CHtml::activePasswordField($form,'password'); ?>
    <p class="hint">
    <?php echo UserModule::t("Minimum password length is 4 characters."); ?>
    </p>

    <?php echo CHtml::activeLabelEx($form,'verifyPassword'); ?>
    <?php echo CHtml::activePasswordField($form,'verifyPassword'); ?>


    <div class="submit">
    <?php echo CHtml::submitButton(UserModule::t("Save")); ?>
    </div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->