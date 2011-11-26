<?php

/**
 * This is the model class for table "phuong_xa".
 *
 * The followings are the available columns in table 'phuong_xa':
 * @property string $idPhuong_xa
 * @property string $Quan_huyen_idQuan_huyen
 * @property string $Ten_phuong_xa
 *
 * The followings are the available model relations:
 * @property BanTinKhachhangCanhan[] $banTinKhachhangCanhans
 * @property QuanHuyen $quanHuyenIdQuanHuyen
 */
class PhuongXa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PhuongXa the static model class
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
		return 'phuong_xa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Quan_huyen_idQuan_huyen', 'required'),
			array('Quan_huyen_idQuan_huyen', 'length', 'max'=>10),
			array('Ten_phuong_xa', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPhuong_xa, Quan_huyen_idQuan_huyen, Ten_phuong_xa', 'safe', 'on'=>'search'),
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
			'banTinKhachhangCanhans' => array(self::HAS_MANY, 'BanTinKhachhangCanhan', 'Phuong_xa_idPhuong_xa'),
			'quanHuyenIdQuanHuyen' => array(self::BELONGS_TO, 'QuanHuyen', 'Quan_huyen_idQuan_huyen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPhuong_xa' => 'Id Phuong Xa',
			'Quan_huyen_idQuan_huyen' => 'Quan Huyen Id Quan Huyen',
			'Ten_phuong_xa' => 'Ten Phuong Xa',
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

		$criteria->compare('idPhuong_xa',$this->idPhuong_xa,true);
		$criteria->compare('Quan_huyen_idQuan_huyen',$this->Quan_huyen_idQuan_huyen,true);
		$criteria->compare('Ten_phuong_xa',$this->Ten_phuong_xa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}