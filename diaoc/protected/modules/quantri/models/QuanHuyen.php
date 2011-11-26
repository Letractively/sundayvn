<?php

/**
 * This is the model class for table "quan_huyen".
 *
 * The followings are the available columns in table 'quan_huyen':
 * @property string $idQuan_huyen
 * @property string $Tinh_thanh_pho_idTinh_thanh_pho
 * @property string $Ten_quan_huyen
 *
 * The followings are the available model relations:
 * @property BanTinKhachhangCanhan[] $banTinKhachhangCanhans
 * @property PhuongXa[] $phuongXas
 * @property TinhThanhPho $tinhThanhPhoIdTinhThanhPho
 */
class QuanHuyen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return QuanHuyen the static model class
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
		return 'quan_huyen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Tinh_thanh_pho_idTinh_thanh_pho', 'required'),
			array('Tinh_thanh_pho_idTinh_thanh_pho', 'length', 'max'=>10),
			array('Ten_quan_huyen', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idQuan_huyen, Tinh_thanh_pho_idTinh_thanh_pho, Ten_quan_huyen', 'safe', 'on'=>'search'),
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
			'banTinKhachhangCanhans' => array(self::HAS_MANY, 'BanTinKhachhangCanhan', 'Quan_huyen_idQuan_huyen'),
			'phuongXas' => array(self::HAS_MANY, 'PhuongXa', 'Quan_huyen_idQuan_huyen'),
			'tinhThanhPhoIdTinhThanhPho' => array(self::BELONGS_TO, 'TinhThanhPho', 'Tinh_thanh_pho_idTinh_thanh_pho'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idQuan_huyen' => 'Id Quan Huyen',
			'Tinh_thanh_pho_idTinh_thanh_pho' => 'Tinh Thanh Pho Id Tinh Thanh Pho',
			'Ten_quan_huyen' => 'Ten Quan Huyen',
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

		$criteria->compare('idQuan_huyen',$this->idQuan_huyen,true);
		$criteria->compare('Tinh_thanh_pho_idTinh_thanh_pho',$this->Tinh_thanh_pho_idTinh_thanh_pho,true);
		$criteria->compare('Ten_quan_huyen',$this->Ten_quan_huyen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}