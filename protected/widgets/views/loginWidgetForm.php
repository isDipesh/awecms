<?php 
	Yii::app()->clientScript
		->registerCssFile( $assetUrl . '/userLogin.css' )
		->registerScriptFile( $assetUrl . '/userLogin.js' )    
?>

<div class="login form" style="display:none">
	<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>
		<div class="success"><?php echo Yii::app()->user->getFlash('loginMessage'); ?></div>
	<?php endif; ?>

	<?php echo CHtml::beginForm(); ?>

	<div class="row">
	<?php echo	CHtml::activeLabelEx($model,'username'),
				CHtml::activeTextField($model,'username'),
				CHtml::error($model,'username') ?>
	</div>
	<div class="row">
	<?php echo	CHtml::activeLabelEx($model,'password'),
				CHtml::activeTextField($model,'password'),
				CHtml::error($model,'password') ?>
	</div>

	<div class="row">
		<p class="hint">
			<?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
		</p>
	</div>

	<div class="row rememberMe">
		<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
		<?php echo CHtml::activeLabelEx($model,'rememberMe'); ?>
	</div>

	<div class="row submit">
		<?php echo CHtml::submitButton(UserModule::t("Login")); ?>
	</div>

	<?php echo CHtml::endForm(); ?>

</div>

