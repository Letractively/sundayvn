<?php

/**
 * This is the model class for table "bat_dong_san".
 *
 * The followings are the available columns in table 'bat_dong_san':
 * @property string $idBat_dong_san
 * @property string $Ten_bat_dong_san
 *
 * The followings are the available model relations:
 * @property BanTinKhachhangCanhan[] $banTinKhachhangCanhans
 */
class BatDongSan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return BatDongSan the static model class
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
		return 'bat_dong_san';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Ten_bat_dong_san', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idBat_dong_san, Ten_bat_dong_san', 'safe', 'on'=>'search'),
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
			'banTinKhachhangCanhans' => array(self::HAS_MANY, 'BanTinKhachhangCanhan', 'Bat_dong_san_idBat_dong_san'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idBat_dong_san' => 'Id Bat Dong San',
			'Ten_bat_dong_san' => 'Ten Bat Dong San',
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

		$criteria->compare('idBat_dong_san',$this->idBat_dong_san,true);
		$criteria->compare('Ten_bat_dong_san',$this->Ten_bat_dong_san,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}