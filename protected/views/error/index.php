<?php
$this->pageTitle = Yii::app()->name . ' - Error';
$this->breadcrumbs = array(
    'Error',
);
?>

<?php
if (!$errorCode)
    $errorCode = $code;
?>

<h2>☹ Error <?php echo $errorCode; ?> - <?php echo AweException::getDefinitionFromCode($errorCode); ?></h2>

<div>
    <?php
    switch ($errorCode) {
        case '404':
            echo 'The address you entered is not a functioning page on this site.<br/><br/>';
            break;
    }

    echo 'Here\'s what you can do:<br/>';

    $this->widget('SearchBlock', array('query' => Yii::app()->request->pathInfo));
    echo '<br/>';

    if (isset($_SERVER['HTTP_REFERER'])) {
        echo CHtml::link('Go back to where you came from.', $_SERVER['HTTP_REFERER']) . '</br>';
    }

    echo CHtml::link('Go back home.', Yii::app()->createAbsoluteUrl(Yii::app()->baseUrl)) . '</br>';

    echo CHtml::link('If you feel we are the one who screwed it this time, please contact us.', Yii::app()->createAbsoluteUrl('/site/contact')) . '</br>';

    if (YII_DEBUG) {
        echo '<br/><pre class="error">';
        var_dump($_SERVER);
        echo '</pre>';
    }
    ?>


</div>