<?php

/**
 * This is the model class for table "danh_muc_con".
 *
 * The followings are the available columns in table 'danh_muc_con':
 * @property string $idDanh_muc_con
 * @property string $Danh_muc_idDanhmuc
 * @property string $Ten_danh_muc_con
 *
 * The followings are the available model relations:
 * @property DanhMuc $danhMucIdDanhmuc
 * @property TinTuc[] $tinTucs
 */
class DanhMucCon extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DanhMucCon the static model class
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
		return 'danh_muc_con';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Danh_muc_idDanhmuc', 'required'),
			array('Danh_muc_idDanhmuc', 'length', 'max'=>10),
			array('Ten_danh_muc_con', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idDanh_muc_con, Danh_muc_idDanhmuc, Ten_danh_muc_con', 'safe', 'on'=>'search'),
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
			'danhMucIdDanhmuc' => array(self::BELONGS_TO, 'DanhMuc', 'Danh_muc_idDanhmuc'),
			'tinTucs' => array(self::HAS_MANY, 'TinTuc', 'Danh_muc_con_idDanh_muc_con'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idDanh_muc_con' => 'Id Danh Muc Con',
			'Danh_muc_idDanhmuc' => 'Danh Muc Id Danhmuc',
			'Ten_danh_muc_con' => 'Ten Danh Muc Con',
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

		$criteria->compare('idDanh_muc_con',$this->idDanh_muc_con,true);
		$criteria->compare('Danh_muc_idDanhmuc',$this->Danh_muc_idDanhmuc,true);
		$criteria->compare('Ten_danh_muc_con',$this->Ten_danh_muc_con,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}