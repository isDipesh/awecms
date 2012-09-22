<?php 
        Yii::app()->clientScript
                ->registerCssFile( $assetUrl . '/userLogin.css' )
                ->registerScriptFile( $assetUrl . '/userLogin.js' )    
?>

<div class="right">                
    <?php echo UserModule::t('Hello, {username}',array('{username}'=>CHtml::link($user->username,$module->profileUrl)))?>             
</div>              



