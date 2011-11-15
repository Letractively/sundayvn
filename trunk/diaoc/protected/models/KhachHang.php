<?php

/**
 * This is the model class for table "khach_hang".
 *
 * The followings are the available columns in table 'khach_hang':
 * @property string $ID_khach_hang
 * @property string $Ten_dang_nhap
 * @property string $Mat_khau
 * @property string $Ho_va_ten
 * @property string $Email
 * @property string $Ngay_sinh
 * @property string $Gioi_tinh
 * @property string $Dia_chi
 * @property string $Dien_thoai_ban
 * @property string $Dien_thoai_di_dong
 * @property string $Url_anh_dai_dien
 * @property string $Ladoanhgnhiep
 *
 * The followings are the available model relations:
 * @property BanTin[] $banTins
 * @property DoanhnghiepBantin[] $doanhnghiepBantins
 * @property KhachHangMailMessage[] $khachHangMailMessages
 * @property ThongtinDoanhnghiep[] $thongtinDoanhnghieps
 * @property TinTucDoanhNghiep[] $tinTucDoanhNghieps
 */
class KhachHang extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return KhachHang the static model class
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
		return 'khach_hang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Ten_dang_nhap, Mat_khau', 'length', 'max'=>50),
			array('Ho_va_ten', 'length', 'max'=>80),
			array('Email, Url_anh_dai_dien', 'length', 'max'=>100),
			array('Gioi_tinh', 'length', 'max'=>20),
			array('Dia_chi', 'length', 'max'=>200),
			array('Dien_thoai_ban, Dien_thoai_di_dong', 'length', 'max'=>30),
			array('Ladoanhgnhiep', 'length', 'max'=>10),
			array('Ngay_sinh', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_khach_hang, Ten_dang_nhap, Mat_khau, Ho_va_ten, Email, Ngay_sinh, Gioi_tinh, Dia_chi, Dien_thoai_ban, Dien_thoai_di_dong, Url_anh_dai_dien, Ladoanhgnhiep', 'safe', 'on'=>'search'),
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
			'banTins' => array(self::HAS_MANY, 'BanTin', 'Khach_hang_ID_khach_hang'),
			'doanhnghiepBantins' => array(self::HAS_MANY, 'DoanhnghiepBantin', 'Khach_hang_ID_khach_hang'),
			'khachHangMailMessages' => array(self::HAS_MANY, 'KhachHangMailMessage', 'Khach_hang_ID_khach_hang'),
			'thongtinDoanhnghieps' => array(self::HAS_MANY, 'ThongtinDoanhnghiep', 'Khach_hang_ID_khach_hang'),
			'tinTucDoanhNghieps' => array(self::HAS_MANY, 'TinTucDoanhNghiep', 'Khach_hang_ID_khach_hang'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_khach_hang' => 'Id Khach Hang',
			'Ten_dang_nhap' => 'Ten Dang Nhap',
			'Mat_khau' => 'Mat Khau',
			'Ho_va_ten' => 'Ho Va Ten',
			'Email' => 'Email',
			'Ngay_sinh' => 'Ngay Sinh',
			'Gioi_tinh' => 'Gioi Tinh',
			'Dia_chi' => 'Dia Chi',
			'Dien_thoai_ban' => 'Dien Thoai Ban',
			'Dien_thoai_di_dong' => 'Dien Thoai Di Dong',
			'Url_anh_dai_dien' => 'Url Anh Dai Dien',
			'Ladoanhgnhiep' => 'Ladoanhgnhiep',
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

		$criteria->compare('ID_khach_hang',$this->ID_khach_hang,true);
		$criteria->compare('Ten_dang_nhap',$this->Ten_dang_nhap,true);
		$criteria->compare('Mat_khau',$this->Mat_khau,true);
		$criteria->compare('Ho_va_ten',$this->Ho_va_ten,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Ngay_sinh',$this->Ngay_sinh,true);
		$criteria->compare('Gioi_tinh',$this->Gioi_tinh,true);
		$criteria->compare('Dia_chi',$this->Dia_chi,true);
		$criteria->compare('Dien_thoai_ban',$this->Dien_thoai_ban,true);
		$criteria->compare('Dien_thoai_di_dong',$this->Dien_thoai_di_dong,true);
		$criteria->compare('Url_anh_dai_dien',$this->Url_anh_dai_dien,true);
		$criteria->compare('Ladoanhgnhiep',$this->Ladoanhgnhiep,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}