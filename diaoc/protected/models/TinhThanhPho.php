<?php

/**
 * This is the model class for table "tinh_thanh_pho".
 *
 * The followings are the available columns in table 'tinh_thanh_pho':
 * @property string $idTinh_thanh_pho
 * @property string $Quoc_gia_idQuoc_gia
 * @property string $Ten_tinh_thanhpho
 *
 * The followings are the available model relations:
 * @property BanTinKhachhangCanhan[] $banTinKhachhangCanhans
 * @property QuanHuyen[] $quanHuyens
 * @property QuocGia $quocGiaIdQuocGia
 */
class TinhThanhPho extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TinhThanhPho the static model class
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
		return 'tinh_thanh_pho';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Quoc_gia_idQuoc_gia', 'required'),
			array('Quoc_gia_idQuoc_gia, Ten_tinh_thanhpho', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTinh_thanh_pho, Quoc_gia_idQuoc_gia, Ten_tinh_thanhpho', 'safe', 'on'=>'search'),
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
			'banTinKhachhangCanhans' => array(self::HAS_MANY, 'BanTinKhachhangCanhan', 'Tinh_thanh_pho_idTinh_thanh_pho'),
			'quanHuyens' => array(self::HAS_MANY, 'QuanHuyen', 'Tinh_thanh_pho_idTinh_thanh_pho'),
			'quocGiaIdQuocGia' => array(self::BELONGS_TO, 'QuocGia', 'Quoc_gia_idQuoc_gia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTinh_thanh_pho' => 'Id Tinh Thanh Pho',
			'Quoc_gia_idQuoc_gia' => 'Quoc Gia Id Quoc Gia',
			'Ten_tinh_thanhpho' => 'Ten Tinh Thanhpho',
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

		$criteria->compare('idTinh_thanh_pho',$this->idTinh_thanh_pho,true);
		$criteria->compare('Quoc_gia_idQuoc_gia',$this->Quoc_gia_idQuoc_gia,true);
		$criteria->compare('Ten_tinh_thanhpho',$this->Ten_tinh_thanhpho,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}