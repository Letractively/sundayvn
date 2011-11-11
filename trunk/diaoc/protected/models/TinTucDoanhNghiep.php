<?php

/**
 * This is the model class for table "tin_tuc_doanh_nghiep".
 *
 * The followings are the available columns in table 'tin_tuc_doanh_nghiep':
 * @property string $idTin_tuc_doanh_ghiep
 * @property string $Khachhang_doanhnghiep_idKhachhang_doanhnghiep
 * @property string $Noi_dung
 *
 * The followings are the available model relations:
 * @property KhachhangDoanhnghiep $khachhangDoanhnghiepIdKhachhangDoanhnghiep
 */
class TinTucDoanhNghiep extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TinTucDoanhNghiep the static model class
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
		return 'tin_tuc_doanh_nghiep';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Khachhang_doanhnghiep_idKhachhang_doanhnghiep', 'required'),
			array('Khachhang_doanhnghiep_idKhachhang_doanhnghiep', 'length', 'max'=>10),
			array('Noi_dung', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTin_tuc_doanh_ghiep, Khachhang_doanhnghiep_idKhachhang_doanhnghiep, Noi_dung', 'safe', 'on'=>'search'),
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
			'khachhangDoanhnghiepIdKhachhangDoanhnghiep' => array(self::BELONGS_TO, 'KhachhangDoanhnghiep', 'Khachhang_doanhnghiep_idKhachhang_doanhnghiep'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTin_tuc_doanh_ghiep' => 'Id Tin Tuc Doanh Ghiep',
			'Khachhang_doanhnghiep_idKhachhang_doanhnghiep' => 'Khachhang Doanhnghiep Id Khachhang Doanhnghiep',
			'Noi_dung' => 'Noi Dung',
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

		$criteria->compare('idTin_tuc_doanh_ghiep',$this->idTin_tuc_doanh_ghiep,true);
		$criteria->compare('Khachhang_doanhnghiep_idKhachhang_doanhnghiep',$this->Khachhang_doanhnghiep_idKhachhang_doanhnghiep,true);
		$criteria->compare('Noi_dung',$this->Noi_dung,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}