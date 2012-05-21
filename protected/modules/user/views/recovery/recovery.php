<?php
$this->breadcrumbs = array(
    Yii::t('app', "Login") => array('/user/login'),
    Yii::t('app', "Restore"),
);
?>

    <?php if (Yii::app()->user->hasFlash('recoveryMessage')): ?>
    <div class="success">
    <?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
    </div>
<?php else: ?>

    <div class="form">
        <?php echo CHtml::beginForm(); ?>

    <?php echo CHtml::errorSummary($form); ?>

        <div class="row">
            <?php echo CHtml::activeLabel($form, 'login_or_email'); ?>
    <?php echo CHtml::activeTextField($form, 'login_or_email') ?>
            <p class="hint"><?php echo Yii::t('app', "Please enter your login or email address!"); ?></p>
        </div>

        <div class="row submit">
    <?php echo CHtml::submitButton(Yii::t('app', "Restore")); ?>
        </div>

    <?php echo CHtml::endForm(); ?>
    </div><!-- form -->
<?php endif; ?>