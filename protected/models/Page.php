<?php

/**
 * This is the model class for table "page".
 *
 * The followings are the available columns in table 'page':
 * @property integer $id
 * @property integer $author
 * @property string $title
 * @property string $content
 * @property string $excerpt
 * @property string $status
 * @property string $created_at
 * @property string $modified_at
 * @property integer $parent
 * @property integer $order
 * @property string $type
 * @property string $comment_status
 * @property string $permission
 * @property string $password
 */
class Page extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Page the static model class
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
		return 'page';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author, title, content, excerpt, created_at, modified_at, parent, password', 'required'),
			array('author, parent, order', 'numerical', 'integerOnly'=>true),
			array('status, type, comment_status, permission, password', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, author, title, content, excerpt, status, created_at, modified_at, parent, order, type, comment_status, permission, password', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'author' => 'Author',
			'title' => 'Title',
			'content' => 'Content',
			'excerpt' => 'Excerpt',
			'status' => 'Status',
			'created_at' => 'Created At',
			'modified_at' => 'Modified At',
			'parent' => 'Parent',
			'order' => 'Order',
			'type' => 'Type',
			'comment_status' => 'Comment Status',
			'permission' => 'Permission',
			'password' => 'Password',
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
		$criteria->compare('author',$this->author);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('excerpt',$this->excerpt,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('modified_at',$this->modified_at,true);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('order',$this->order);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('comment_status',$this->comment_status,true);
		$criteria->compare('permission',$this->permission,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}