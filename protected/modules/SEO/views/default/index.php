The XML sitemap is available at <?php $xml = Yii::app()->createAbsoluteUrl('/sitemap.xml');
echo CHtml::link($xml, $xml); ?>.