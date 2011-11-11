<?php

/**
 * This is the model class for table "loai_du_an".
 *
 * The followings are the available columns in table 'loai_du_an':
 * @property string $idLoai_du_an
 * @property string $ten_du_an
 *
 * The followings are the available model relations:
 * @property BantinKhachhangDoanhgnhiep[] $bantinKhachhangDoanhgnhieps
 */
class LoaiDuAn extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return LoaiDuAn the static model class
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
		return 'loai_du_an';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ten_du_an', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idLoai_du_an, ten_du_an', 'safe', 'on'=>'search'),
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
			'bantinKhachhangDoanhgnhieps' => array(self::HAS_MANY, 'BantinKhachhangDoanhgnhiep', 'Loai_du_an_idLoai_du_an'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idLoai_du_an' => 'Id Loai Du An',
			'ten_du_an' => 'Ten Du An',
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

		$criteria->compare('idLoai_du_an',$this->idLoai_du_an,true);
		$criteria->compare('ten_du_an',$this->ten_du_an,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}