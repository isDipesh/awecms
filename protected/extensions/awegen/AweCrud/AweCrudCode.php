<?php

Yii::import('system.gii.generators.crud.CrudCode');

class AweCrudCode extends CrudCode {

    public $authtype = 'no_access_control';
    public $validation = 0;
    public $baseControllerClass = 'Controller';
    public $identificationColumn = '';
    public $isJToggleColumnEnabled = true;

    public function rules() {
        return array_merge(parent::rules(), array(
                    array('identificationColumn,isJToggleColumnEnabled,validation,authtype', 'safe'),
                ));
    }

    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), array(
                    'authtype' => 'Authentication type',
                ));
    }

    private static function getName($column) {
        return $column->name;
    }

    public function getIdentificationColumn() {
        if (!empty($this->identificationColumn))
            return $this->identificationColumn;

        $possibleIdentifiers = array('name', 'title', 'slug');


        $columns_name = array_map('self::getName', $this->tableSchema->columns);
        foreach ($possibleIdentifiers as $possibleIdentifier) {
            if (in_array($possibleIdentifier, $columns_name))
                return $possibleIdentifier;
        }

        foreach ($columns_name as $column_name) {
            if (preg_match('/.*name.*/', $column_name, $matches)) {
                return $column_name;
            }
        }

        foreach ($this->tableSchema->columns as $column) {
            if (!$column->isForeignKey
                    && !$column->isPrimaryKey
                    && $column->type != 'INT'
                    && $column->type != 'INTEGER'
                    && $column->type != 'BOOLEAN') {
                return $column->name;
            }
        }

        if (is_array($pk = $this->tableSchema->primaryKey))
            $pk = $pk[0];
        //every table must have a PK
        return $pk;
    }

    public function getDetailViewAttribute($column) {
        if ($column->name == 'id') {
            return "array(
                        'name'=>'id', // only admin user can see person id
                        'label'=>'ID',
                        'visible'=>Yii::app()->getModule('user')->isAdmin()
                    ),";
        }

        if (in_array(strtolower($column->name), array('image', 'picture', 'photo', 'pic', 'profile_pic', 'profile_picture', 'avatar', 'profilepic', 'profilepicture'))) {
            return "array(
                        'name'=>'{$column->name}',
                        'type'=>'image'
                    ),";
        }

        if (in_array(strtolower($column->name), array('email', 'e-mail', 'email_address', 'e-mail_address', 'emailaddress', 'e-mailaddress'))) {
            return "array(
                        'name'=>'{$column->name}',
                        'type'=>'email'
                    ),";
        }

        if (in_array(strtolower($column->name), array('url', 'link', 'uri'))) {
            return "array(
                        'name'=>'{$column->name}',
                        'type'=>'url'
                    ),";
        }

        $type_conversion = array(
            'longtext' => 'ntext',
            'time' => 'time',
            'boolean' => 'boolean',
            'bool' => 'boolean',
            'tinyint(1)' => 'boolean',
        );

        if (array_key_exists(strtolower($column->dbType), $type_conversion)) {
            return "array(
                        'name'=>'{$column->name}',
                        'type'=>'" . $type_conversion[strtolower($column->dbType)] . "'
                    ),";
        }

        return "'{$column->name}',";
    }

    public function generateField($column) {
        if (in_array(strtolower($column->dbType), array('boolean', 'tinyint(1)', 'bool')))
            return "echo \$form->checkBox(\$model,'{$column->name}')";
        else if (strtolower($column->dbType) == 'longtext')
        //TODO integrate markitup
            return "echo \$form->textArea(\$model,'{$column->name}',array('rows'=>6, 'cols'=>50))";
        else if (stripos($column->dbType, 'text') !== false)
            return "echo \$form->textArea(\$model,'{$column->name}',array('rows'=>6, 'cols'=>50))";
        else if (substr(strtoupper($column->dbType), 0, 4) == 'ENUM') {
            $string = sprintf("echo CHtml::activeDropDownList(\$model, '%s', array(\n", $column->name);

            $enum_values = explode(',', substr($column->dbType, 4, strlen($column->dbType) - 1));

            foreach ($enum_values as $value) {
                $value = trim($value, "()'");
                $string .= "\t\t\t'$value' => Yii::t('app', '" . Awecms::generateFriendlyName($value) . "') ,\n";
            }
            $string .= '))';

            return $string;
        } 
        else if(in_array(strtolower($column->dbType),array('date','datetime','date'))){
            return ("\$this->widget('CJuiDateTimePicker',
						 array(
								 'model'=>'\$model',
                                                                 'name'=>'{$column->name}',
								 'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
								 'value'=>\$model->{$column->name},
								 'htmlOptions'=>array('size'=>10, 'style'=>'width:80px !important'),
                                                                 'mode' => '".strtolower($column->dbType)."',
								 'options'=>array(
                                                                         'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
									 'showButtonPanel'=>true,
									 'changeYear'=>true,
									 'changeYear'=>true,
									 'dateFormat'=>'yy-mm-dd',
									 ),
								 )
							 );
					");
        }
        else if(in_array(strtolower($column->dbType),array('date','datetime'))){
            return ("\$this->widget('zii.widgets.jui.CJuiDatePicker',
						 array(
								 'model'=>'\$model',
                                                                 'name'=>'{$column->name}',
								 'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
								 'value'=>\$model->{$column->name},
								 'htmlOptions'=>array('size'=>10, 'style'=>'width:80px !important'),
								 'options'=>array(
									 'showButtonPanel'=>true,
									 'changeYear'=>true,
									 'changeYear'=>true,
									 'dateFormat'=>'yy-mm-dd',
									 ),
								 )
							 );
					");
        }
        else {
            if (preg_match('/^(password|pass|passwd|passcode)$/i', $column->name))
                $inputField = 'passwordField';
            else
                $inputField = 'textField';

            if ($column->type !== 'string' || $column->size === null)
                return "echo \$form->{$inputField}(\$model,'{$column->name}')";
            else {
                if (($size = $maxLength = $column->size) > 60)
                    $size = 60;
                return "echo \$form->{$inputField}(\$model,'{$column->name}',array('size'=>$size,'maxlength'=>$maxLength))";
            }
        }
    }

}