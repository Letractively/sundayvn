<?php

/**
 * This is the model class for table "danh_muc".
 *
 * The followings are the available columns in table 'danh_muc':
 * @property string $idDanhmuc
 * @property string $Ten_Danhmuc
 * @property string $Mieuta_Danhmuc
 *
 * The followings are the available model relations:
 * @property DanhMucCon[] $danhMucCons
 */
class DanhMuc extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DanhMuc the static model class
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
		return 'danh_muc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Ten_Danhmuc', 'required', 'message'=>'Vui lòng nhập {attribute}.'),
			array('Ten_Danhmuc', 'length', 'max'=>255),
			array('Mieuta_Danhmuc', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idDanhmuc, Ten_Danhmuc, Mieuta_Danhmuc', 'safe', 'on'=>'search'),
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
			'danhMucCons' => array(self::HAS_MANY, 'DanhMucCon', 'Danh_muc_idDanhmuc'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idDanhmuc' => 'ID danh mục',
			'Ten_Danhmuc' => 'Tên danh mục',
            'Mieuta_Danhmuc' => 'Miêu tả danh mục',
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

		$criteria->compare('idDanhmuc',$this->idDanhmuc,true);
		$criteria->compare('Ten_Danhmuc',$this->Ten_Danhmuc,true);
		$criteria->compare('Mieuta_Danhmuc',$this->Mieuta_Danhmuc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}