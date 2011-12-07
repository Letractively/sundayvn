<?php

/**
 * This is the model class for table "tin_tuc".
 *
 * The followings are the available columns in table 'tin_tuc':
 * @property string $idTin_tuc
 * @property string $idDanhmuc
 * @property string $Tieu_de
 * @property string $Hinh_anh
 * @property string $Noi_dung_ngan
 * @property string $Noi_dung
 * @property integer $Ngay_dang
 *
 * The followings are the available model relations:
 * @property DanhMuc $idDanhmuc0
 */
class TinTuc extends CActiveRecord
{
    public $hinhanh;
    
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
			array('Tieu_de, Noi_dung_ngan', 'required', 'message'=>'Vui lòng nhập {attribute}.'),
            array('idDanhmuc', 'length', 'max'=>11),
            array('Hinh_anh', 'length', 'max'=>255),
            array('hinhanh', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true, 'wrongType'=>'Tập tin ảnh không hợp lệ (JPG, GIF, PNG).'),
			array('Noi_dung', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTin_tuc, idDanhmuc, Tieu_de, Hinh_anh, Noi_dung_ngan, Noi_dung, Ngay_dang', 'safe', 'on'=>'search'),
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
			'idDanhmuc0' => array(self::BELONGS_TO, 'DanhMuc', 'idDanhmuc'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTin_tuc' => 'ID tin tức',
            'idDanhmuc' => 'Danh mục',
			'Tieu_de' => 'Tiêu đề',
			'Hinh_anh' => 'Hình ảnh',
			'Noi_dung_ngan' => 'Giới thiệu',
			'Noi_dung' => 'Nội dung',
			'Ngay_dang' => 'Ngày đăng',
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
        $criteria->compare('idDanhmuc',$this->idDanhmuc,true);
		$criteria->compare('Tieu_de',$this->Tieu_de,true);
		$criteria->compare('Hinh_anh',$this->Hinh_anh,true);
		$criteria->compare('Noi_dung_ngan',$this->Noi_dung_ngan,true);
		$criteria->compare('Noi_dung',$this->Noi_dung,true);
		$criteria->compare('Ngay_dang',$this->Ngay_dang);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}