<?php

/**
 * This is the model class for table "khachhang_doanhnghiep".
 *
 * The followings are the available columns in table 'khachhang_doanhnghiep':
 * @property string $idKhachhang_doanhnghiep
 * @property string $Ten_cong_ty
 * @property string $Dia_chi
 * @property string $Dien_thoai
 * @property string $Email
 * @property string $Web_site
 * @property string $Von
 * @property string $Ngay_thanh_lap
 * @property string $Gioi_thieu
 * @property string $Hinh_url
 *
 * The followings are the available model relations:
 * @property BantinKhachhangDoanhgnhiep[] $bantinKhachhangDoanhgnhieps
 * @property TinTucDoanhNghiep[] $tinTucDoanhNghieps
 */
class KhachhangDoanhnghiep extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return KhachhangDoanhnghiep the static model class
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
		return 'khachhang_doanhnghiep';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Ten_cong_ty, Web_site, Hinh_url', 'length', 'max'=>200),
			array('Dia_chi', 'length', 'max'=>500),
			array('Dien_thoai, Email', 'length', 'max'=>20),
			array('Von', 'length', 'max'=>10),
			array('Gioi_thieu', 'length', 'max'=>2000),
			array('Ngay_thanh_lap', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idKhachhang_doanhnghiep, Ten_cong_ty, Dia_chi, Dien_thoai, Email, Web_site, Von, Ngay_thanh_lap, Gioi_thieu, Hinh_url', 'safe', 'on'=>'search'),
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
			'bantinKhachhangDoanhgnhieps' => array(self::HAS_MANY, 'BantinKhachhangDoanhgnhiep', 'Khachhang_doanhnghiep_idKhachhang_doanhnghiep'),
			'tinTucDoanhNghieps' => array(self::HAS_MANY, 'TinTucDoanhNghiep', 'Khachhang_doanhnghiep_idKhachhang_doanhnghiep'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idKhachhang_doanhnghiep' => 'Id Khachhang Doanhnghiep',
			'Ten_cong_ty' => 'Ten Cong Ty',
			'Dia_chi' => 'Dia Chi',
			'Dien_thoai' => 'Dien Thoai',
			'Email' => 'Email',
			'Web_site' => 'Web Site',
			'Von' => 'Von',
			'Ngay_thanh_lap' => 'Ngay Thanh Lap',
			'Gioi_thieu' => 'Gioi Thieu',
			'Hinh_url' => 'Hinh Url',
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

		$criteria->compare('idKhachhang_doanhnghiep',$this->idKhachhang_doanhnghiep,true);
		$criteria->compare('Ten_cong_ty',$this->Ten_cong_ty,true);
		$criteria->compare('Dia_chi',$this->Dia_chi,true);
		$criteria->compare('Dien_thoai',$this->Dien_thoai,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Web_site',$this->Web_site,true);
		$criteria->compare('Von',$this->Von,true);
		$criteria->compare('Ngay_thanh_lap',$this->Ngay_thanh_lap,true);
		$criteria->compare('Gioi_thieu',$this->Gioi_thieu,true);
		$criteria->compare('Hinh_url',$this->Hinh_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}