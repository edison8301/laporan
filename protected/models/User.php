<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $role_id
 * @property integer $status
 * @property string $last_login
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_user_id
 * @property integer $update_user_id
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, role_id', 'required'),
			array('role_id, parent_id, status, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('username, password, keterangan', 'length', 'max'=>255),
			array('last_login, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, role_id, status, last_login, create_time, update_time, create_user_id, update_user_id', 'safe', 'on'=>'search'),
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
			'role'=>array(self::BELONGS_TO,'Role','role_id'),
			'parent'=>array(self::BELONGS_TO,'User','parent_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'role_id' => 'Role',
			'parent_id' => 'Atasan Bidang',
			'status' => 'Status',
			'last_login' => 'Last Login',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'create_user_id' => 'Create User',
			'update_user_id' => 'Update User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
		
	public function encrypt($value)
	{
		return md5($value);
	}
	
	public function beforeSave() {
	
		if ($this->isNewRecord){
			$this->create_time = new CDbExpression('NOW()');
			$this->create_user_id = Yii::app()->user->id;
		}else{
			$this->update_time = new CDbExpression('NOW()');
			$this->update_user_id = Yii::app()->user->id;
		}	
		return parent::beforeSave();
	}
	
	public function createUser($username, $password, $role)
	{
		$model = new User;
		$model->username = $username;
		$model->password = md5($password);
		$model->role_id = $role;
		$model->create_time =  new CDbExpression('NOW()');
		$this->create_user_id = Yii::app()->user->id;
		$model->save();
		
		return $model->id;
		
	}
	
	public function getList()
	{
		if(Yii::app()->user->isAdmin())
		{
			return CHtml::listData(User::model()->findAll(),'id','username');
		}
		
		if(Yii::app()->user->isBidang())
		{
			$criteria = new CDbCriteria;
			$criteria->condition = 'id = :id OR parent_id = :id';
			$criteria->params = array(':id'=>Yii::app()->user->id);
			
			return CHtml::listData(User::model()->findAll($criteria),'id','username');
		}
		
		
	}
}
