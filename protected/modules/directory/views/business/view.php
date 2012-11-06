<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Business Directory') => array('/directory'),
    Yii::t('app', $model->title),
);
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'List All'), 'url' => array('/directory/business')),
        array('label' => Yii::t('app', 'Add New'), 'url' => array('create')),
        array('label' => Yii::t('app', 'Manage All'), 'url' => array('manage')),
        array('label' => Yii::t('app', 'All Categories'), 'url' => array('/directory/categories')),
        array('label' => Yii::t('app', 'Create New Category'), 'url' => array('/directory/categories/create')),
        array('label' => Yii::t('app', 'Manage All Categories'), 'url' => array('/directory/categories/manage')),
        array('label' => Yii::t('app', 'View')),
        array('label' => Yii::t('app', 'Update'), 'url' => array('update', 'id' => $model->id)),
        array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    );
}
?>

<article itemscope itemtype="http://schema.org/LocalBusiness">
    <h1 itemprop="name"><?php echo $model->title; ?></h1>
    <?php
    if ($model->page->user_id == Yii::app()->user->id) {
        echo CHtml::link(Yii::t('app', 'Edit this entry'), array('/directory/business/update', 'id' => $model->id));
    }
    ?>
    <hr />
    <?php
    if (isset($model->image)) {
        ?>
        <img class="thumb" src="<?php echo Yii::app()->baseUrl . '/uploads/directory/' . $model->image; ?>" alt="<?php echo $model->title ?>" itemprop="photo" />
        <?php
    }
    ?>
    <br>
    <?php
    if (isset($model->phone))
        echo '<b>' . Yii::t('app', 'Phone') . '</b>: <span itemprop="telephone">' . $model->phone . '</span><br/>';
    ?>
    <?php
    if (isset($model->fax))
        echo '<b>' . Yii::t('app', 'Fax') . '</b>: <span itemprop="faxnumber">' . $model->fax . '</span><br/>';;
    ?>
    <?php
    if (isset($model->email))
        echo '<b>' . Yii::t('app', 'Email') . '</b>: ' . CHtml::mailto($model->email, '', array('itemprop' => 'email')) . '<br/>';;
    ?>
    <?php
    if (isset($model->website))
        echo '<b>' . Yii::t('app', 'Website') . '</b>: ' . CHtml::link($model->website, $model->website, array("target" => "_blank", "itemprop" => "url")) . '<br/>';;
    ?>
    <?php
    if (isset($model->address))
        echo '<b>' . Yii::t('app', 'Address') . '</b>:<br/><span itemprop="address">' . nl2br($model->address) . '</span><br/>';;
    ?>

    <div class="rte-text" itemprop="description">
        <?php echo $model->description; ?>
    </div>

    <?php
    if ($model->latitude && $model->longitude) {
        Yii::app()->clientScript->registerScriptFile(
                'http://maps.google.com/maps/api/js?sensor=true'
        );
        Yii::app()->clientScript->registerScript('maploader', '
            var latlng = new google.maps.LatLng(' . $model->latitude . ',' . $model->longitude . ');
            var mapOptions = {
                zoom: 15,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
            var marker = new google.maps.Marker({
				position: latlng,
				map: map,
				title: "'.$model->title.'"
			});
        ', CClientScript::POS_READY);
        ?>
        <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
            <div id="map_size" style="height:400px;">
                <div id="map_canvas" style="width:100%; height:100%;">
                </div>
            </div>
            <meta itemprop="latitude" content="<?php echo $model->latitude; ?>" />
            <meta itemprop="longitude" content="<?php echo $model->longitude; ?>" />
        </div>
        <?php
    }
    ?>

    <?php if (count($model->businessCategories)) { ?>
        <h3><?php echo Yii::t('app', Awecms::pluralize('Category', 'Categories', $model->businessCategories)); ?>:</h3>
        <?php
        if (is_array($model->businessCategories))
            foreach ($model->businessCategories as $foreignobj) {

                echo '<div class="label left">';
                echo CHtml::link($foreignobj->title, array('/directory/categories/view', 'id' => $foreignobj->id));
                echo '</div>';
            }
        ?>
    <?php } ?>
</article>