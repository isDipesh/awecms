<?php
$this->breadcrumbs = array(
    'Settings',
);

echo CHtml::beginForm('', 'post', array('onsubmit' => 'return validateForm(this)'));

echo"<h1>Add new settings field:</h1>";

echo CHtml::label('Category', 'category');
echo CHtml::dropDownList(
        'category', $action, Awecms::generatePairs(array_merge(Settings::getCategories(), array('add_new'))), array(
    'onchange' => 'dropDownChanged(this)',
));
echo CHtml::textField('category_value', '', array('size' => '30', 'style' => 'display:none'));
echo "<br/><br/>";

echo CHtml::label('Key', 'key');
echo CHtml::textField('key', '', array('size' => '50'));
echo "<br/><br/>";

echo CHtml::label('Value', 'value');
echo CHtml::textField('value', '', array('size' => '50'));
echo "<br/><br/>";

echo CHtml::label('Type', 'type');
echo CHtml::textField('type', '', array('size' => '50'));
echo "Leave this blank for auto-detection!";
echo "<br/><br/>";

echo CHtml::submitButton('Submit!', array('onsubmit' => 'alert(1)'));

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