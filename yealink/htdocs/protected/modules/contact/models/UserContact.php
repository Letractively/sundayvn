<?php

/**
 * This is the model class for table "tbl_user_contacts".
 *
 * The followings are the available columns in table 'tbl_user_contacts':
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $created_timestamp
 */
class UserContact extends CActiveRecord
{
    var $phone = '';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserContacts the static model class
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
		return 'tbl_user_contacts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, name, account, created_timestamp', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>512),
			array('account', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, name, account, created_timestamp', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'name' => 'Name',
			'account' => 'Account',
			'created_timestamp' => 'Created Timestamp',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('created_timestamp',$this->created_timestamp,true);

		$provider = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		
		return $provider->getData();
	}
	
	public function is_existed()
	{
		$criteria=new CDbCriteria;
		
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,false);
		$criteria->compare('account',$this->account,false);

		$provider = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		
		return $provider->getData();
	}
}