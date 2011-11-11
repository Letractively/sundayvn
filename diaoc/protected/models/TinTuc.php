<?php

/**
 * This is the model class for table "tin_tuc".
 *
 * The followings are the available columns in table 'tin_tuc':
 * @property string $idTin_tuc
 * @property string $Danh_muc_con_idDanh_muc_con
 * @property string $Noi_dung
 * @property string $Ngay_gio
 *
 * The followings are the available model relations:
 * @property DanhMucCon $danhMucConIdDanhMucCon
 */
class TinTuc extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TinTuc the static model class
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
		return 'tin_tuc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Danh_muc_con_idDanh_muc_con', 'required'),
			array('Danh_muc_con_idDanh_muc_con', 'length', 'max'=>10),
			array('Noi_dung, Ngay_gio', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTin_tuc, Danh_muc_con_idDanh_muc_con, Noi_dung, Ngay_gio', 'safe', 'on'=>'search'),
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
			'danhMucConIdDanhMucCon' => array(self::BELONGS_TO, 'DanhMucCon', 'Danh_muc_con_idDanh_muc_con'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTin_tuc' => 'Id Tin Tuc',
			'Danh_muc_con_idDanh_muc_con' => 'Danh Muc Con Id Danh Muc Con',
			'Noi_dung' => 'Noi Dung',
			'Ngay_gio' => 'Ngay Gio',
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

		$criteria->compare('idTin_tuc',$this->idTin_tuc,true);
		$criteria->compare('Danh_muc_con_idDanh_muc_con',$this->Danh_muc_con_idDanh_muc_con,true);
		$criteria->compare('Noi_dung',$this->Noi_dung,true);
		$criteria->compare('Ngay_gio',$this->Ngay_gio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}