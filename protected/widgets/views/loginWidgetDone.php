<?php 
        Yii::app()->clientScript
                ->registerCssFile( $assetUrl . '/userLogin.css' )
                ->registerScriptFile( $assetUrl . '/userLogin.js' )    
?>

<div class="login">

        <div class="row">                
                <?php echo UserModule::t('Hello, {username}!',array('{username}'=>CHtml::link($user->username,$module->profileUrl)))?><br>              
        <?php echo CHtml::link(UserModule::t('Logout'),$module->logoutUrl)?>
    </div>              

</div>

