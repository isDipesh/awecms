<?php 
        Yii::app()->clientScript
                ->registerCssFile( $assetUrl . '/userLogin.css' )
                ->registerScriptFile( $assetUrl . '/userLogin.js' )    
?>



        <div class="right">                
                <?php echo UserModule::t('Hello, {username}!',array('{username}'=>CHtml::link($user->username,$module->profileUrl)))?><br>              
        <?php echo CHtml::link(Yii::t('app', 'Logout'),$module->logoutUrl)?>
    </div>              



