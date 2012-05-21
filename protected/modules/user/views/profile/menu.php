<ul class="actions">
    <?php
    if (UserModule::isAdmin()) {
        ?>
        <li><?php echo CHtml::link(UserModule::t('Manage Users'), array('/admin/user')); ?></li>
        <?php
    }
    ?>
    <li><?php echo CHtml::link(Yii::t('app', 'Edit'), array('/profile/edit')); ?></li>
    <li><?php echo CHtml::link(Yii::t('app', 'Change password'), array('/profile/changepassword')); ?></li>
    <li><?php echo CHtml::link(Yii::t('app', 'Logout'), array('/logout')); ?></li>
</ul>