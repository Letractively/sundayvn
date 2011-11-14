<?php

/**
 * This is the model class for table "khachhang_canhan".
 *
 * The followings are the available columns in table 'khachhang_canhan':
 * @property string $idKhachhang_canhan
 * @property string $Ten_dang_nhap
 * @property string $Mat_khau
 * @property string $Ho_va_ten
 * @property string $Email
 * @property integer $Ngay_sinh
 * @property integer $Gioi_tinh
 * @property string $Ten_cong_ty
 * @property string $Dia_chi
 * @property string $Dien_thoai_ban
 * @property string $Dien_thoai_di_dong
 * @property string $Url_anh_dai_dien
 */
class KhachhangCanhan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return KhachhangCanhan the static model class
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
		return 'khachhang_canhan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Ngay_sinh, Gioi_tinh', 'numerical', 'integerOnly'=>true),
			array('Ten_dang_nhap, Mat_khau', 'length', 'max'=>50),
			array('Ho_va_ten', 'length', 'max'=>80),
			array('Email, Ten_cong_ty, Url_anh_dai_dien', 'length', 'max'=>100),
			array('Dia_chi', 'length', 'max'=>200),
			array('Dien_thoai_ban, Dien_thoai_di_dong', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idKhachhang_canhan, Ten_dang_nhap, Mat_khau, Ho_va_ten, Email, Ngay_sinh, Gioi_tinh, Ten_cong_ty, Dia_chi, Dien_thoai_ban, Dien_thoai_di_dong, Url_anh_dai_dien', 'safe', 'on'=>'search'),
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
			'idKhachhang_canhan' => 'Id Khachhang Canhan',
			'Ten_dang_nhap' => 'Ten Dang Nhap',
			'Mat_khau' => 'Mat Khau',
			'Ho_va_ten' => 'Ho Va Ten',
			'Email' => 'Email',
			'Ngay_sinh' => 'Ngay Sinh',
			'Gioi_tinh' => 'Gioi Tinh',
			'Ten_cong_ty' => 'Ten Cong Ty',
			'Dia_chi' => 'Dia Chi',
			'Dien_thoai_ban' => 'Dien Thoai Ban',
			'Dien_thoai_di_dong' => 'Dien Thoai Di Dong',
			'Url_anh_dai_dien' => 'Url Anh Dai Dien',
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

		$criteria->compare('idKhachhang_canhan',$this->idKhachhang_canhan,true);
		$criteria->compare('Ten_dang_nhap',$this->Ten_dang_nhap,true);
		$criteria->compare('Mat_khau',$this->Mat_khau,true);
		$criteria->compare('Ho_va_ten',$this->Ho_va_ten,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Ngay_sinh',$this->Ngay_sinh);
		$criteria->compare('Gioi_tinh',$this->Gioi_tinh);
		$criteria->compare('Ten_cong_ty',$this->Ten_cong_ty,true);
		$criteria->compare('Dia_chi',$this->Dia_chi,true);
		$criteria->compare('Dien_thoai_ban',$this->Dien_thoai_ban,true);
		$criteria->compare('Dien_thoai_di_dong',$this->Dien_thoai_di_dong,true);
		$criteria->compare('Url_anh_dai_dien',$this->Url_anh_dai_dien,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}