<?php

/**
 * This is the model class for table "chuyen_muc".
 *
 * The followings are the available columns in table 'chuyen_muc':
 * @property string $idChuyen_muc
 * @property string $Ten_chuyen_muc
 *
 * The followings are the available model relations:
 * @property BanTinKhachhangCanhan[] $banTinKhachhangCanhans
 */
class ChuyenMuc extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ChuyenMuc the static model class
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
		return 'chuyen_muc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Ten_chuyen_muc', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idChuyen_muc, Ten_chuyen_muc', 'safe', 'on'=>'search'),
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
			'banTinKhachhangCanhans' => array(self::HAS_MANY, 'BanTinKhachhangCanhan', 'Chuyen_muc_idChuyen_muc'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idChuyen_muc' => 'Id Chuyen Muc',
			'Ten_chuyen_muc' => 'Ten Chuyen Muc',
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

		$criteria->compare('idChuyen_muc',$this->idChuyen_muc,true);
		$criteria->compare('Ten_chuyen_muc',$this->Ten_chuyen_muc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}