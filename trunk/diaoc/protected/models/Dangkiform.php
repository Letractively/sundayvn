<?php

/**
 * This is the model class for table "khach_hang".
 *
 * The followings are the available columns in table 'khach_hang':
 * @property string $ID_khach_hang
 * @property string $Ten_dang_nhap
 * @property string $Mat_khau
 * @property string $Ho_va_ten
 * @property string $Email
 * @property string $Ngay_sinh
 * @property string $Gioi_tinh
 * @property string $Dia_chi
 * @property string $Dien_thoai_ban
 * @property string $Dien_thoai_di_dong
 * @property string $Url_anh_dai_dien
 * @property string $Ladoanhgnhiep
 *
 * The followings are the available model relations:
 * @property BanTin[] $banTins
 * @property DoanhnghiepBantin[] $doanhnghiepBantins
 * @property KhachHangMailMessage[] $khachHangMailMessages
 * @property ThongtinDoanhnghiep[] $thongtinDoanhnghieps
 * @property TinTucDoanhNghiep[] $tinTucDoanhNghieps
 */
class Dangkiform extends CActiveRecord {

    public $Nhap_lai_pass;
    public $codeCaptcha;
    public $image;
    public $Ten_cong_ty;
    public $Dia_chi_cong_ty;
    public $So_dien_thoai_cong_ty;
    public $linh_vuc_hoat_dong;
    public $gioi_thieu_cong_ty;
    public $website;
    public $von;

    /**
     * Returns the static model of the specified AR class.
     * @return Dangkiform the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'khach_hang';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codeCaptcha', 'captcha',
                'allowEmpty' => !CCaptcha::checkRequirements(),
                'message' => 'Mã Xác Nhận Nhập Không Đúng'
            ),
            array('Email', 'email', 'message' => '{attribute} không hợp lệ'),
            array('Ten_dang_nhap,Email,Mat_khau,Nhap_lai_pass,Ho_va_ten', 'required', 'message' => "{attribute} không được bỏ trống"),
            array('Nhap_lai_pass', 'compare', 'compareAttribute' => 'Mat_khau', 'message' => "{attribute} phải chính xác"),
            array('Mat_khau', 'length', 'min' => '6', 'message' => "{attribute} quá ngắn (tối thiểu là {min} kí tự)."),
            array('Gioi_tinh', 'safe'),
            array('Ten_cong_ty', 'safe'),
            array('Dia_chi_cong_ty', 'safe'),
            array('linh_vuc_hoat_dong', 'safe'),
            array('gioi_thieu_cong_ty', 'safe'),
            array('Ladoanhgnhiep', 'safe'),
            array('website', 'safe'),
            array('Url_anh_dai_dien', 'safe'),
            array('image', 'file', 'types' => 'jpg, gif, png','allowEmpty'=>true),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'banTins' => array(self::HAS_MANY, 'BanTin', 'Khach_hang_ID_khach_hang'),
            'doanhnghiepBantins' => array(self::HAS_MANY, 'DoanhnghiepBantin', 'Khach_hang_ID_khach_hang'),
            'khachHangMailMessages' => array(self::HAS_MANY, 'KhachHangMailMessage', 'Khach_hang_ID_khach_hang'),
            'thongtinDoanhnghieps' => array(self::HAS_MANY, 'ThongtinDoanhnghiep', 'Khach_hang_ID_khach_hang'),
            'tinTucDoanhNghieps' => array(self::HAS_MANY, 'TinTucDoanhNghiep', 'Khach_hang_ID_khach_hang'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ID_khach_hang' => 'Id Khach Hang',
            'Ten_dang_nhap' => 'Tên đăng nhập',
            'Mat_khau' => 'Mật khẩu',
            'Ho_va_ten' => 'Họ và tên',
            'Email' => 'Email',
            'Ngay_sinh' => 'Ngày sinh',
            'Gioi_tinh' => 'Giới tính',
            'Dia_chi' => 'Địa chỉ',
            'Dien_thoai_ban' => 'Số điện thoại bàn',
            'Dien_thoai_di_dong' => 'Số điện thoại di động',
            'Url_anh_dai_dien' => 'Hình đại diện',
            'Ladoanhgnhiep' => 'Bạn là',
            'Nhap_lai_pass'=> 'Nhập lại mật khẩu'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('ID_khach_hang', $this->ID_khach_hang, true);
        $criteria->compare('Ten_dang_nhap', $this->Ten_dang_nhap, true);
        $criteria->compare('Mat_khau', $this->Mat_khau, true);
        $criteria->compare('Ho_va_ten', $this->Ho_va_ten, true);
        $criteria->compare('Email', $this->Email, true);
        $criteria->compare('Ngay_sinh', $this->Ngay_sinh, true);
        $criteria->compare('Gioi_tinh', $this->Gioi_tinh, true);
        $criteria->compare('Dia_chi', $this->Dia_chi, true);
        $criteria->compare('Dien_thoai_ban', $this->Dien_thoai_ban, true);
        $criteria->compare('Dien_thoai_di_dong', $this->Dien_thoai_di_dong, true);
        $criteria->compare('Url_anh_dai_dien', $this->Url_anh_dai_dien, true);
        $criteria->compare('Ladoanhgnhiep', $this->Ladoanhgnhiep, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function hasExistUserName() {
        $connection = Yii::app()->db;

        $connection->active = true;

        $sql = "SELECT * from khach_hang where Ten_dang_nhap='" . $this->Ten_dang_nhap . "'";
        $command = $connection->createCommand($sql);
        $rows = $command->query();
        if ($rows->count() > 0) {
            $connection->active = false;
            return true;
        } else {
            $connection->active = false;
            return false;
        }
    }

    public function hasExistEmail() {
        $connection = Yii::app()->db;

        $connection->active = true;

        $sql = "SELECT * from khach_hang where Email='" . $this->Email . "'";
        $command = $connection->createCommand($sql);
        $rows = $command->query();
        if ($rows->count() > 0) {
            $connection->active = false;
            return true;
        } else {
            $connection->active = false;
            return false;
        }
    }

    public function insertToThongtin_doanhnghiep() {
        $connection = Yii::app()->db;

        $connection->active = true;

        $sql = "INSERT INTO thongtin_doanhnghiep (Khach_hang_ID_khach_hang, Ten_cong_ty, Dia_chi,Dien_thoai,Web_site,Gioi_thieu)
        VALUES (" . $this->ID_khach_hang . ",'" . $this->Ten_cong_ty . "','" . $this->Dia_chi_cong_ty . "','" . $this->So_dien_thoai_cong_ty . "','" . $this->website . "','" . $this->gioi_thieu_cong_ty . "')";
        $command = $connection->createCommand($sql);
        $rows = $command->execute();


        $connection->active = false;
    }

}