<ul class="actions">
    <?php
    if (UserModule::isAdmin()) {
        ?>
        <li><?php echo CHtml::link(UserModule::t('Manage Users'), array('/admin/user')); ?></li>
        <?php
    }
    ?>
    <li><?php echo CHtml::link(UserModule::t('Edit'), array('/profile/edit')); ?></li>
    <li><?php echo CHtml::link(UserModule::t('Change password'), array('/profile/changepassword')); ?></li>
    <li><?php echo CHtml::link(UserModule::t('Logout'), array('/logout')); ?></li>
</ul>