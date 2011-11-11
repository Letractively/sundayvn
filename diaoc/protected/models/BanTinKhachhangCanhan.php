<?php

/**
 * This is the model class for table "ban_tin_khachhang_canhan".
 *
 * The followings are the available columns in table 'ban_tin_khachhang_canhan':
 * @property string $idBan_tin
 * @property string $Chuyen_muc_idChuyen_muc
 * @property string $Phuong_xa_idPhuong_xa
 * @property string $Quan_huyen_idQuan_huyen
 * @property string $Tinh_thanh_pho_idTinh_thanh_pho
 * @property string $Khachhang_canhan_idKhachhang_canhan
 * @property string $Bat_dong_san_idBat_dong_san
 * @property string $So_nha
 * @property string $Duong_pho
 * @property double $Gia
 * @property string $Loai_menh_gia
 * @property integer $Moi_gioi
 * @property double $Hoa_hong
 * @property double $Dien_tich
 * @property double $Chieu_dai_khuon_vien
 * @property double $Chieu_rong_khuon_vien
 * @property integer $No_hau_khuon_vien
 * @property double $Chieu_dai_xay_dung
 * @property double $Chieu_rong_xay_dung
 * @property integer $No_hau_xay_dung
 * @property string $Huong_tai_san
 * @property string $Tinh_trang_phap_ly
 * @property string $Duong_truoc_nha
 * @property string $So_lau
 * @property string $So_phong_khach
 * @property string $So_phong_ngu
 * @property string $So_phong_tam
 * @property string $So_phong_ve_sinh
 * @property string $So_phong_khac
 * @property string $Tien_ich_khac
 * @property string $Chi_tiet_khac
 * @property string $Tieu_de
 * @property string $hinh_URL
 * @property string $hinh_URL_2
 * @property string $hinh_URL_3
 * @property string $hinh_URL_4
 * @property string $hinh_URL_5
 * @property string $hinh_URL_6
 * @property string $hinh_URL_7
 * @property string $hinh_URL_8
 * @property string $hinh_URL_9
 * @property string $hinh_URL_10
 * @property string $Nguoi_lien_he
 * @property string $Dien_thoai
 * @property string $Di_dong
 * @property string $Ghi_chu
 * @property string $Dia_chi_nguoi_lien_he
 * @property string $Ten_du_an
 *
 * The followings are the available model relations:
 * @property BatDongSan $batDongSanIdBatDongSan
 * @property KhachhangCanhan $khachhangCanhanIdKhachhangCanhan
 * @property TinhThanhPho $tinhThanhPhoIdTinhThanhPho
 * @property QuanHuyen $quanHuyenIdQuanHuyen
 * @property PhuongXa $phuongXaIdPhuongXa
 * @property ChuyenMuc $chuyenMucIdChuyenMuc
 */
class BanTinKhachhangCanhan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return BanTinKhachhangCanhan the static model class
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
		return 'ban_tin_khachhang_canhan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Chuyen_muc_idChuyen_muc, Phuong_xa_idPhuong_xa, Quan_huyen_idQuan_huyen, Tinh_thanh_pho_idTinh_thanh_pho, Khachhang_canhan_idKhachhang_canhan, Bat_dong_san_idBat_dong_san', 'required'),
			array('Moi_gioi, No_hau_khuon_vien, No_hau_xay_dung', 'numerical', 'integerOnly'=>true),
			array('Gia, Hoa_hong, Dien_tich, Chieu_dai_khuon_vien, Chieu_rong_khuon_vien, Chieu_dai_xay_dung, Chieu_rong_xay_dung', 'numerical'),
			array('Chuyen_muc_idChuyen_muc, Phuong_xa_idPhuong_xa, Quan_huyen_idQuan_huyen, Tinh_thanh_pho_idTinh_thanh_pho, Khachhang_canhan_idKhachhang_canhan, Bat_dong_san_idBat_dong_san, So_lau, So_phong_khach, So_phong_ngu, So_phong_tam, So_phong_ve_sinh, So_phong_khac', 'length', 'max'=>10),
			array('So_nha, Nguoi_lien_he', 'length', 'max'=>50),
			array('Duong_pho, Chi_tiet_khac, Ghi_chu', 'length', 'max'=>100),
			array('Loai_menh_gia', 'length', 'max'=>15),
			array('Huong_tai_san, Tinh_trang_phap_ly', 'length', 'max'=>30),
			array('Duong_truoc_nha, Dien_thoai, Di_dong', 'length', 'max'=>20),
			array('Tien_ich_khac, Tieu_de, Ten_du_an', 'length', 'max'=>500),
			array('hinh_URL, hinh_URL_2, hinh_URL_3, hinh_URL_4, hinh_URL_5, hinh_URL_6, hinh_URL_7, hinh_URL_8, hinh_URL_9, hinh_URL_10, Dia_chi_nguoi_lien_he', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idBan_tin, Chuyen_muc_idChuyen_muc, Phuong_xa_idPhuong_xa, Quan_huyen_idQuan_huyen, Tinh_thanh_pho_idTinh_thanh_pho, Khachhang_canhan_idKhachhang_canhan, Bat_dong_san_idBat_dong_san, So_nha, Duong_pho, Gia, Loai_menh_gia, Moi_gioi, Hoa_hong, Dien_tich, Chieu_dai_khuon_vien, Chieu_rong_khuon_vien, No_hau_khuon_vien, Chieu_dai_xay_dung, Chieu_rong_xay_dung, No_hau_xay_dung, Huong_tai_san, Tinh_trang_phap_ly, Duong_truoc_nha, So_lau, So_phong_khach, So_phong_ngu, So_phong_tam, So_phong_ve_sinh, So_phong_khac, Tien_ich_khac, Chi_tiet_khac, Tieu_de, hinh_URL, hinh_URL_2, hinh_URL_3, hinh_URL_4, hinh_URL_5, hinh_URL_6, hinh_URL_7, hinh_URL_8, hinh_URL_9, hinh_URL_10, Nguoi_lien_he, Dien_thoai, Di_dong, Ghi_chu, Dia_chi_nguoi_lien_he, Ten_du_an', 'safe', 'on'=>'search'),
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
			'batDongSanIdBatDongSan' => array(self::BELONGS_TO, 'BatDongSan', 'Bat_dong_san_idBat_dong_san'),
			'khachhangCanhanIdKhachhangCanhan' => array(self::BELONGS_TO, 'KhachhangCanhan', 'Khachhang_canhan_idKhachhang_canhan'),
			'tinhThanhPhoIdTinhThanhPho' => array(self::BELONGS_TO, 'TinhThanhPho', 'Tinh_thanh_pho_idTinh_thanh_pho'),
			'quanHuyenIdQuanHuyen' => array(self::BELONGS_TO, 'QuanHuyen', 'Quan_huyen_idQuan_huyen'),
			'phuongXaIdPhuongXa' => array(self::BELONGS_TO, 'PhuongXa', 'Phuong_xa_idPhuong_xa'),
			'chuyenMucIdChuyenMuc' => array(self::BELONGS_TO, 'ChuyenMuc', 'Chuyen_muc_idChuyen_muc'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idBan_tin' => 'Id Ban Tin',
			'Chuyen_muc_idChuyen_muc' => 'Chuyen Muc Id Chuyen Muc',
			'Phuong_xa_idPhuong_xa' => 'Phuong Xa Id Phuong Xa',
			'Quan_huyen_idQuan_huyen' => 'Quan Huyen Id Quan Huyen',
			'Tinh_thanh_pho_idTinh_thanh_pho' => 'Tinh Thanh Pho Id Tinh Thanh Pho',
			'Khachhang_canhan_idKhachhang_canhan' => 'Khachhang Canhan Id Khachhang Canhan',
			'Bat_dong_san_idBat_dong_san' => 'Bat Dong San Id Bat Dong San',
			'So_nha' => 'So Nha',
			'Duong_pho' => 'Duong Pho',
			'Gia' => 'Gia',
			'Loai_menh_gia' => 'Loai Menh Gia',
			'Moi_gioi' => 'Moi Gioi',
			'Hoa_hong' => 'Hoa Hong',
			'Dien_tich' => 'Dien Tich',
			'Chieu_dai_khuon_vien' => 'Chieu Dai Khuon Vien',
			'Chieu_rong_khuon_vien' => 'Chieu Rong Khuon Vien',
			'No_hau_khuon_vien' => 'No Hau Khuon Vien',
			'Chieu_dai_xay_dung' => 'Chieu Dai Xay Dung',
			'Chieu_rong_xay_dung' => 'Chieu Rong Xay Dung',
			'No_hau_xay_dung' => 'No Hau Xay Dung',
			'Huong_tai_san' => 'Huong Tai San',
			'Tinh_trang_phap_ly' => 'Tinh Trang Phap Ly',
			'Duong_truoc_nha' => 'Duong Truoc Nha',
			'So_lau' => 'So Lau',
			'So_phong_khach' => 'So Phong Khach',
			'So_phong_ngu' => 'So Phong Ngu',
			'So_phong_tam' => 'So Phong Tam',
			'So_phong_ve_sinh' => 'So Phong Ve Sinh',
			'So_phong_khac' => 'So Phong Khac',
			'Tien_ich_khac' => 'Tien Ich Khac',
			'Chi_tiet_khac' => 'Chi Tiet Khac',
			'Tieu_de' => 'Tieu De',
			'hinh_URL' => 'Hinh Url',
			'hinh_URL_2' => 'Hinh Url 2',
			'hinh_URL_3' => 'Hinh Url 3',
			'hinh_URL_4' => 'Hinh Url 4',
			'hinh_URL_5' => 'Hinh Url 5',
			'hinh_URL_6' => 'Hinh Url 6',
			'hinh_URL_7' => 'Hinh Url 7',
			'hinh_URL_8' => 'Hinh Url 8',
			'hinh_URL_9' => 'Hinh Url 9',
			'hinh_URL_10' => 'Hinh Url 10',
			'Nguoi_lien_he' => 'Nguoi Lien He',
			'Dien_thoai' => 'Dien Thoai',
			'Di_dong' => 'Di Dong',
			'Ghi_chu' => 'Ghi Chu',
			'Dia_chi_nguoi_lien_he' => 'Dia Chi Nguoi Lien He',
			'Ten_du_an' => 'Ten Du An',
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

		$criteria->compare('idBan_tin',$this->idBan_tin,true);
		$criteria->compare('Chuyen_muc_idChuyen_muc',$this->Chuyen_muc_idChuyen_muc,true);
		$criteria->compare('Phuong_xa_idPhuong_xa',$this->Phuong_xa_idPhuong_xa,true);
		$criteria->compare('Quan_huyen_idQuan_huyen',$this->Quan_huyen_idQuan_huyen,true);
		$criteria->compare('Tinh_thanh_pho_idTinh_thanh_pho',$this->Tinh_thanh_pho_idTinh_thanh_pho,true);
		$criteria->compare('Khachhang_canhan_idKhachhang_canhan',$this->Khachhang_canhan_idKhachhang_canhan,true);
		$criteria->compare('Bat_dong_san_idBat_dong_san',$this->Bat_dong_san_idBat_dong_san,true);
		$criteria->compare('So_nha',$this->So_nha,true);
		$criteria->compare('Duong_pho',$this->Duong_pho,true);
		$criteria->compare('Gia',$this->Gia);
		$criteria->compare('Loai_menh_gia',$this->Loai_menh_gia,true);
		$criteria->compare('Moi_gioi',$this->Moi_gioi);
		$criteria->compare('Hoa_hong',$this->Hoa_hong);
		$criteria->compare('Dien_tich',$this->Dien_tich);
		$criteria->compare('Chieu_dai_khuon_vien',$this->Chieu_dai_khuon_vien);
		$criteria->compare('Chieu_rong_khuon_vien',$this->Chieu_rong_khuon_vien);
		$criteria->compare('No_hau_khuon_vien',$this->No_hau_khuon_vien);
		$criteria->compare('Chieu_dai_xay_dung',$this->Chieu_dai_xay_dung);
		$criteria->compare('Chieu_rong_xay_dung',$this->Chieu_rong_xay_dung);
		$criteria->compare('No_hau_xay_dung',$this->No_hau_xay_dung);
		$criteria->compare('Huong_tai_san',$this->Huong_tai_san,true);
		$criteria->compare('Tinh_trang_phap_ly',$this->Tinh_trang_phap_ly,true);
		$criteria->compare('Duong_truoc_nha',$this->Duong_truoc_nha,true);
		$criteria->compare('So_lau',$this->So_lau,true);
		$criteria->compare('So_phong_khach',$this->So_phong_khach,true);
		$criteria->compare('So_phong_ngu',$this->So_phong_ngu,true);
		$criteria->compare('So_phong_tam',$this->So_phong_tam,true);
		$criteria->compare('So_phong_ve_sinh',$this->So_phong_ve_sinh,true);
		$criteria->compare('So_phong_khac',$this->So_phong_khac,true);
		$criteria->compare('Tien_ich_khac',$this->Tien_ich_khac,true);
		$criteria->compare('Chi_tiet_khac',$this->Chi_tiet_khac,true);
		$criteria->compare('Tieu_de',$this->Tieu_de,true);
		$criteria->compare('hinh_URL',$this->hinh_URL,true);
		$criteria->compare('hinh_URL_2',$this->hinh_URL_2,true);
		$criteria->compare('hinh_URL_3',$this->hinh_URL_3,true);
		$criteria->compare('hinh_URL_4',$this->hinh_URL_4,true);
		$criteria->compare('hinh_URL_5',$this->hinh_URL_5,true);
		$criteria->compare('hinh_URL_6',$this->hinh_URL_6,true);
		$criteria->compare('hinh_URL_7',$this->hinh_URL_7,true);
		$criteria->compare('hinh_URL_8',$this->hinh_URL_8,true);
		$criteria->compare('hinh_URL_9',$this->hinh_URL_9,true);
		$criteria->compare('hinh_URL_10',$this->hinh_URL_10,true);
		$criteria->compare('Nguoi_lien_he',$this->Nguoi_lien_he,true);
		$criteria->compare('Dien_thoai',$this->Dien_thoai,true);
		$criteria->compare('Di_dong',$this->Di_dong,true);
		$criteria->compare('Ghi_chu',$this->Ghi_chu,true);
		$criteria->compare('Dia_chi_nguoi_lien_he',$this->Dia_chi_nguoi_lien_he,true);
		$criteria->compare('Ten_du_an',$this->Ten_du_an,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}