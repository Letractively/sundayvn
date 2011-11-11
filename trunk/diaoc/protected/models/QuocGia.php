<?php

/**
 * This is the model class for table "quoc_gia".
 *
 * The followings are the available columns in table 'quoc_gia':
 * @property string $idQuoc_gia
 * @property string $Ten_quoc_gia
 *
 * The followings are the available model relations:
 * @property TinhThanhPho[] $tinhThanhPhos
 */
class QuocGia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return QuocGia the static model class
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
		return 'quoc_gia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Ten_quoc_gia', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idQuoc_gia, Ten_quoc_gia', 'safe', 'on'=>'search'),
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
			'tinhThanhPhos' => array(self::HAS_MANY, 'TinhThanhPho', 'Quoc_gia_idQuoc_gia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idQuoc_gia' => 'Id Quoc Gia',
			'Ten_quoc_gia' => 'Ten Quoc Gia',
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

		$criteria->compare('idQuoc_gia',$this->idQuoc_gia,true);
		$criteria->compare('Ten_quoc_gia',$this->Ten_quoc_gia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}