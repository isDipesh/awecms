<footer itemtype="http://schema.org/WPFooter">
    <?php echo Yii::t('app','Copyright'); ?> &copy; <?php echo date('Y'); ?> <a href="<?php echo Yii::app()->baseUrl; ?>/"><?php echo Settings::get('site', 'name'); ?></a> <br/>
    <?php echo Awecms::powered(); ?>
</footer>