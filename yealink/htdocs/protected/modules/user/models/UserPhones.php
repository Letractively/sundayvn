<?php
  	/*
  	* @author anguyen
  	* @date Mar 3, 2012
  	*/

class UserPhones extends CActiveRecord
{
	const STATUS_NOACTIVE=0;
	const STATUS_ACTIVE=1;
	const STATUS_BANED=-1;
	

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
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
		return Yii::app()->getModule('user')->tableUserPhones;
	}
	
	public function findByUserId($user_id)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('user_id', $user_id);		

		$provider = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		
		return $provider->getData();
	}
}