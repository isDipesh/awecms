<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Settings'),
    Yii::t('app', 'Add new settings field'),
);

$this->menu = Settings::getCategoriesAsLinks($action);

echo '<h1>' . Yii::t('app', 'Add new settings field') . ':</h1>';

echo CHtml::beginForm('', 'post', array('onsubmit' => 'return validateForm(this)', 'class' => 'form'));
?>

<div class="settings row">
    <?php
    echo CHtml::label('Category', 'category');
    echo CHtml::dropDownList(
            'category', $action, Awecms::generatePairs(array_merge(Settings::getCategories(), array('add_new'))), array(
        'onchange' => 'dropDownChanged(this)',
    ));
    echo CHtml::textField('category_value', '', array('size' => '30', 'style' => 'display:none'));
    ?>
</div>

<div class="settings row">
    <?php
    echo CHtml::label('Key', 'key');
    echo CHtml::textField('key', '', array('size' => '50'));
    ?>
</div>

<div class="settings row">
    <?php
    echo CHtml::label('Value', 'value');
    echo CHtml::textField('value', '', array('size' => '50'));
    ?>
</div>

<div class="settings row">
    <?php
    echo CHtml::label('Hint', 'hint');
    echo CHtml::textField('hint', '', array('size' => '50'));
    ?>
</div>

<div class="settings row">
    <?php
    echo CHtml::label('Type', 'type');
//    echo CHtml::textField('type', '', array('size' => '50'));
    echo CHtml::dropDownList(
            'type', '', array_merge(array('' => 'Autodetect'), Awecms::generatePairs(
                            array(
                                'textfield', 'boolean', 'image_url', 'email', 'textarea'))
            ));
    echo '<p class="hint">' . Yii::t('app', 'Leave this blank for auto-detection!') . '</p>';
    ?>
</div>

<div class="row buttons">
    <?php
    echo CHtml::submitButton('Submit!');
    ?>
</div>
<?php
echo CHtml::endForm();
?>
<script type="text/javascript">
    
    function dropDownChanged(a){
        if(a.value=='add_new'){
            $('#category_value').show();
        }
        else{
            $('#category_value').hide();
            $('#category_value').val('');
        }
    }
    
    function validateForm(a){
        if(!a['key'].value){
            alert("Key can't be empty!");
            return false;
        }
        return true;
    }
    
</script>