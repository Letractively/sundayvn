<?php

/**
 * This is the model class for table "bantin_khachhang_doanhgnhiep".
 *
 * The followings are the available columns in table 'bantin_khachhang_doanhgnhiep':
 * @property string $idBantin_khachhang_doanhgnhiep
 * @property string $Khachhang_doanhnghiep_idKhachhang_doanhnghiep
 * @property string $Loai_du_an_idLoai_du_an
 * @property string $Chi_tiet_du_an
 * @property string $Tieu_de
 * @property string $Vitri
 *
 * The followings are the available model relations:
 * @property LoaiDuAn $loaiDuAnIdLoaiDuAn
 * @property KhachhangDoanhnghiep $khachhangDoanhnghiepIdKhachhangDoanhnghiep
 */
class BantinKhachhangDoanhgnhiep extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return BantinKhachhangDoanhgnhiep the static model class
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
		return 'bantin_khachhang_doanhgnhiep';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Khachhang_doanhnghiep_idKhachhang_doanhnghiep, Loai_du_an_idLoai_du_an', 'required'),
			array('Khachhang_doanhnghiep_idKhachhang_doanhnghiep, Loai_du_an_idLoai_du_an', 'length', 'max'=>10),
			array('Chi_tiet_du_an, Tieu_de, Vitri', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idBantin_khachhang_doanhgnhiep, Khachhang_doanhnghiep_idKhachhang_doanhnghiep, Loai_du_an_idLoai_du_an, Chi_tiet_du_an, Tieu_de, Vitri', 'safe', 'on'=>'search'),
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
			'loaiDuAnIdLoaiDuAn' => array(self::BELONGS_TO, 'LoaiDuAn', 'Loai_du_an_idLoai_du_an'),
			'khachhangDoanhnghiepIdKhachhangDoanhnghiep' => array(self::BELONGS_TO, 'KhachhangDoanhnghiep', 'Khachhang_doanhnghiep_idKhachhang_doanhnghiep'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idBantin_khachhang_doanhgnhiep' => 'Id Bantin Khachhang Doanhgnhiep',
			'Khachhang_doanhnghiep_idKhachhang_doanhnghiep' => 'Khachhang Doanhnghiep Id Khachhang Doanhnghiep',
			'Loai_du_an_idLoai_du_an' => 'Loai Du An Id Loai Du An',
			'Chi_tiet_du_an' => 'Chi Tiet Du An',
			'Tieu_de' => 'Tieu De',
			'Vitri' => 'Vitri',
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

		$criteria->compare('idBantin_khachhang_doanhgnhiep',$this->idBantin_khachhang_doanhgnhiep,true);
		$criteria->compare('Khachhang_doanhnghiep_idKhachhang_doanhnghiep',$this->Khachhang_doanhnghiep_idKhachhang_doanhnghiep,true);
		$criteria->compare('Loai_du_an_idLoai_du_an',$this->Loai_du_an_idLoai_du_an,true);
		$criteria->compare('Chi_tiet_du_an',$this->Chi_tiet_du_an,true);
		$criteria->compare('Tieu_de',$this->Tieu_de,true);
		$criteria->compare('Vitri',$this->Vitri,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}