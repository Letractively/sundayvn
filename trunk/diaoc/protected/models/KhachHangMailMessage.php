<?php

/**
 * This is the model class for table "khach_hang_mail_message".
 *
 * The followings are the available columns in table 'khach_hang_mail_message':
 * @property string $idKhach_hang_thu
 * @property string $Khachhang_canhan_idKhachhang_canhan
 * @property string $Noi_dung
 *
 * The followings are the available model relations:
 * @property KhachhangCanhan $khachhangCanhanIdKhachhangCanhan
 */
class KhachHangMailMessage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return KhachHangMailMessage the static model class
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
		return 'khach_hang_mail_message';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Khachhang_canhan_idKhachhang_canhan', 'required'),
			array('Khachhang_canhan_idKhachhang_canhan', 'length', 'max'=>10),
			array('Noi_dung', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idKhach_hang_thu, Khachhang_canhan_idKhachhang_canhan, Noi_dung', 'safe', 'on'=>'search'),
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
			'khachhangCanhanIdKhachhangCanhan' => array(self::BELONGS_TO, 'KhachhangCanhan', 'Khachhang_canhan_idKhachhang_canhan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idKhach_hang_thu' => 'Id Khach Hang Thu',
			'Khachhang_canhan_idKhachhang_canhan' => 'Khachhang Canhan Id Khachhang Canhan',
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

		$criteria->compare('idKhach_hang_thu',$this->idKhach_hang_thu,true);
		$criteria->compare('Khachhang_canhan_idKhachhang_canhan',$this->Khachhang_canhan_idKhachhang_canhan,true);
		$criteria->compare('Noi_dung',$this->Noi_dung,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}