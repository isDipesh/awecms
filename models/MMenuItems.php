<?php

/**
 * This is the model class for table "menu_items".
 *
 * The followings are the available columns in table 'menu_items':
 * @property integer $id
 * @property integer $menu_id
 * @property integer $weight
 * @property integer $parent_id
 * @property integer $level
 * @property integer $left
 * @property integer $right
 * @property string $title
 * @property string $type
 * @property string $controller
 * @property integer $enabled
 * @property integer $expanded
 * @property string $action
 * @property string $var_name
 * @property string $var_id
 * @property integer $content_id
 */
class MMenuItems extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return MMenuItems the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'menu_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('menu_id, weight, parent_id, level, left, right, enabled, expanded, content_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>128),
			array('type', 'length', 'max'=>5),
			array('controller, action, var_name, var_id', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, menu_id, weight, parent_id, level, left, right, title, type, controller, enabled, expanded, action, var_name, var_id, content_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'getparent' => array(self::BELONGS_TO, 'MMenuItems', 'parent_id'),
			'childs' => array(self::HAS_MANY, 'MMenuItems', 'parent_id'),
			'menu' => array(self::BELONGS_TO, 'MMenu', 'menu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'menu_id' => 'Menu',
			'weight' => 'Weight',
			'parent_id' => 'Parent',
			'level' => 'Level',
			'left' => 'Left',
			'right' => 'Right',
			'title' => 'Title',
			'type' => 'Type',
			'controller' => 'Controller',
			'enabled' => 'Enabled',
			'expanded' => 'Expanded',
			'action' => 'Action',
			'var_name' => 'Var Name',
			'var_id' => 'Var',
			'content_id' => 'Content',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('level',$this->level);
		$criteria->compare('left',$this->left);
		$criteria->compare('right',$this->right);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('controller',$this->controller,true);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('expanded',$this->expanded);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('var_name',$this->var_name,true);
		$criteria->compare('var_id',$this->var_id,true);
		$criteria->compare('content_id',$this->content_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}