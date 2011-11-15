CREATE TABLE Danh_muc (
  idDanhmuc INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Ten_Danhmuc VARCHAR(200) NULL,
  PRIMARY KEY(idDanhmuc)
);

CREATE TABLE Hinh_anh_nha_dat (
  idanh_nha_dat INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Url_duong_dan VARCHAR(100) NULL,
  PRIMARY KEY(idanh_nha_dat)
);

CREATE TABLE Khachhang (
  ID_khach_hang INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Ten_dang_nhap VARCHAR(50) NULL,
  Mat_khau VARCHAR(50) NULL,
  Ho_va_ten VARCHAR(80) NULL,
  Email VARCHAR(100) NULL,
  Ngay_sinh DATETIME NULL,
  Gioi_tinh BIGINT NULL,
  Dia_chi VARCHAR(200) NULL,
  Dien_thoai_ban VARCHAR(30) NULL,
  Dien_thoai_di_dong VARCHAR(30) NULL,
  Url_anh_dai_dien VARCHAR(100) NULL,
  Ladoanhgnhiep INTEGER UNSIGNED NULL,
  PRIMARY KEY(ID_khach_hang)
);

-- ------------------------------------------------------------
-- chuyen muc gom nhung chuyen muc ldai loai nhu (can ban, cho thue, can mua , can ban gap)
-- ------------------------------------------------------------

CREATE TABLE Chuyen_muc (
  idChuyen_muc INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Ten_chuyen_muc VARCHAR(100) NULL,
  PRIMARY KEY(idChuyen_muc)
);

CREATE TABLE Loai_du_an (
  idLoai_du_an INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ten_du_an VARCHAR(200) NULL,
  PRIMARY KEY(idLoai_du_an)
);

CREATE TABLE Quoc_gia (
  idQuoc_gia INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Ten_quoc_gia VARCHAR(200) NULL,
  PRIMARY KEY(idQuoc_gia)
);

CREATE TABLE Bat_dong_san (
  idBat_dong_san INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Ten_bat_dong_san VARCHAR(100) NULL,
  PRIMARY KEY(idBat_dong_san)
);

CREATE TABLE Thongtin_doanhnghiep (
  Khachhang_ID_khach_hang INTEGER UNSIGNED NOT NULL,
  Ten_cong_ty VARCHAR(200) NULL,
  Dia_chi VARCHAR(500) NULL,
  Dien_thoai VARCHAR(20) NULL,
  Email VARCHAR(20) NULL,
  Web_site VARCHAR(200) NULL,
  Von INT UNSIGNED NULL,
  Ngay_thanh_lap DATETIME NULL,
  Gioi_thieu VARCHAR(2000) NULL,
  Hinh_url VARCHAR(200) NULL,
  INDEX Thongtin_doanhnghiep_FKIndex1(Khachhang_ID_khach_hang),
  FOREIGN KEY(Khachhang_ID_khach_hang)
    REFERENCES Khachhang(ID_khach_hang)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Tin_tuc_doanh_nghiep (
  idTin_tuc_doanh_ghiep INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Khachhang_ID_khach_hang INTEGER UNSIGNED NOT NULL,
  Noi_dung TEXT NULL,
  PRIMARY KEY(idTin_tuc_doanh_ghiep),
  INDEX Tin_tuc_doanh_nghiep_FKIndex1(Khachhang_ID_khach_hang),
  FOREIGN KEY(Khachhang_ID_khach_hang)
    REFERENCES Khachhang(ID_khach_hang)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Tinh_thanh_pho (
  idTinh_thanh_pho INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Quoc_gia_idQuoc_gia INTEGER UNSIGNED NOT NULL,
  Ten_tinh_thanhpho INTEGER UNSIGNED NULL,
  PRIMARY KEY(idTinh_thanh_pho),
  INDEX Tinh_thanh_pho_FKIndex1(Quoc_gia_idQuoc_gia),
  FOREIGN KEY(Quoc_gia_idQuoc_gia)
    REFERENCES Quoc_gia(idQuoc_gia)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Quan_huyen (
  idQuan_huyen INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Tinh_thanh_pho_idTinh_thanh_pho INTEGER UNSIGNED NOT NULL,
  Ten_quan_huyen VARCHAR(200) NULL,
  PRIMARY KEY(idQuan_huyen),
  INDEX Quan_huyen_FKIndex1(Tinh_thanh_pho_idTinh_thanh_pho),
  FOREIGN KEY(Tinh_thanh_pho_idTinh_thanh_pho)
    REFERENCES Tinh_thanh_pho(idTinh_thanh_pho)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Danh_muc_con (
  idDanh_muc_con INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Danh_muc_idDanhmuc INTEGER UNSIGNED NOT NULL,
  Ten_danh_muc_con VARCHAR(200) NULL,
  PRIMARY KEY(idDanh_muc_con),
  INDEX Danh_muc_con_FKIndex1(Danh_muc_idDanhmuc),
  FOREIGN KEY(Danh_muc_idDanhmuc)
    REFERENCES Danh_muc(idDanhmuc)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Khach_hang_mail_message (
  idKhach_hang_thu INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Khachhang_ID_khach_hang INTEGER UNSIGNED NOT NULL,
  Noi_dung TEXT NULL,
  PRIMARY KEY(idKhach_hang_thu),
  INDEX Khach_hang_mail_message_FKIndex1(Khachhang_ID_khach_hang),
  FOREIGN KEY(Khachhang_ID_khach_hang)
    REFERENCES Khachhang(ID_khach_hang)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Phuong_xa (
  idPhuong_xa INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Quan_huyen_idQuan_huyen INTEGER UNSIGNED NOT NULL,
  Ten_phuong_xa VARCHAR(200) NULL,
  PRIMARY KEY(idPhuong_xa),
  INDEX Phuong_xa_FKIndex1(Quan_huyen_idQuan_huyen),
  FOREIGN KEY(Quan_huyen_idQuan_huyen)
    REFERENCES Quan_huyen(idQuan_huyen)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Bantin_khachhang_doanhgnhiep (
  idBantin_khachhang_doanhgnhiep INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Khachhang_ID_khach_hang INTEGER UNSIGNED NOT NULL,
  Loai_du_an_idLoai_du_an INTEGER UNSIGNED NOT NULL,
  Chi_tiet_du_an TEXT NULL,
  Tieu_de TEXT NULL,
  Vitri TEXT NULL,
  PRIMARY KEY(idBantin_khachhang_doanhgnhiep),
  INDEX Bantin_khachhang_doanhgnhiep_FKIndex1(Loai_du_an_idLoai_du_an),
  INDEX Bantin_khachhang_doanhgnhiep_FKIndex2(Khachhang_ID_khach_hang),
  FOREIGN KEY(Loai_du_an_idLoai_du_an)
    REFERENCES Loai_du_an(idLoai_du_an)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Khachhang_ID_khach_hang)
    REFERENCES Khachhang(ID_khach_hang)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Ban_tin_khachhang_canhan_doanhgnhiep (
  id_bantin INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Khachhang_ID_khach_hang INTEGER UNSIGNED NOT NULL,
  Chuyen_muc_idChuyen_muc INTEGER UNSIGNED NOT NULL,
  Bat_dong_san_idBat_dong_san INTEGER UNSIGNED NOT NULL,
  Hinh_anh_nha_dat_idanh_nha_dat INTEGER UNSIGNED NOT NULL,
  Quan_huyen_idQuan_huyen INTEGER UNSIGNED NOT NULL,
  Tinh_thanh_pho_idTinh_thanh_pho INTEGER UNSIGNED NOT NULL,
  Quoc_gia_idQuoc_gia INTEGER UNSIGNED NOT NULL,
  So_nha VARCHAR(50) NULL,
  Duong_pho VARCHAR(100) NULL,
  Gia FLOAT NULL,
  Loai_menh_gia VARCHAR(15) NULL,
  Moi_gioi BIT NULL,
  Hoa_hong FLOAT NULL,
  Dien_tich FLOAT NULL,
  Chieu_dai_khuon_vien FLOAT NULL,
  Chieu_rong_khuon_vien FLOAT NULL,
  No_hau_khuon_vien BIT NULL,
  Chieu_dai_xay_dung FLOAT NULL,
  Chieu_rong_xay_dung FLOAT NULL,
  No_hau_xay_dung BIT NULL,
  Huong_tai_san VARCHAR(30) NULL,
  Tinh_trang_phap_ly VARCHAR(30) NULL,
  Duong_truoc_nha VARCHAR(20) NULL,
  So_lau INTEGER UNSIGNED NULL,
  So_phong_khach INTEGER UNSIGNED NULL,
  So_phong_ngu INTEGER UNSIGNED NULL,
  So_phong_tam INTEGER UNSIGNED NULL,
  So_phong_ve_sinh INTEGER UNSIGNED NULL,
  So_phong_khac INTEGER UNSIGNED NULL,
  Tien_ich_khac VARCHAR(500) NULL,
  Chi_tiet_khac VARCHAR(100) NULL,
  Tieu_de VARCHAR(500) NULL,
  Nguoi_lien_he VARCHAR(50) NULL,
  Dien_thoai VARCHAR(20) NULL,
  Di_dong VARCHAR(20) NULL,
  Ghi_chu VARCHAR(100) NULL,
  Dia_chi_nguoi_lien_he VARCHAR(200) NULL,
  Ten_du_an VARCHAR(500) NULL,
  PRIMARY KEY(id_bantin),
  INDEX Ban_tin_khachhang_canhan_doanhgnhiep_FKIndex2(Quoc_gia_idQuoc_gia),
  INDEX Ban_tin_khachhang_canhan_doanhgnhiep_FKIndex3(Tinh_thanh_pho_idTinh_thanh_pho),
  INDEX Ban_tin_khachhang_canhan_doanhgnhiep_FKIndex4(Quan_huyen_idQuan_huyen),
  INDEX Ban_tin_khachhang_canhan_doanhgnhiep_FKIndex5(Hinh_anh_nha_dat_idanh_nha_dat),
  INDEX Ban_tin_khachhang_canhan_doanhgnhiep_FKIndex6(Bat_dong_san_idBat_dong_san),
  INDEX Ban_tin_khachhang_canhan_doanhgnhiep_FKIndex7(Chuyen_muc_idChuyen_muc),
  INDEX Ban_tin_khachhang_canhan_doanhgnhiep_FKIndex7(Khachhang_ID_khach_hang),
  FOREIGN KEY(Quoc_gia_idQuoc_gia)
    REFERENCES Quoc_gia(idQuoc_gia)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Tinh_thanh_pho_idTinh_thanh_pho)
    REFERENCES Tinh_thanh_pho(idTinh_thanh_pho)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Quan_huyen_idQuan_huyen)
    REFERENCES Quan_huyen(idQuan_huyen)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Hinh_anh_nha_dat_idanh_nha_dat)
    REFERENCES Hinh_anh_nha_dat(idanh_nha_dat)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Bat_dong_san_idBat_dong_san)
    REFERENCES Bat_dong_san(idBat_dong_san)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Chuyen_muc_idChuyen_muc)
    REFERENCES Chuyen_muc(idChuyen_muc)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Khachhang_ID_khach_hang)
    REFERENCES Khachhang(ID_khach_hang)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Tin_tuc (
  idTin_tuc INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Danh_muc_con_idDanh_muc_con INTEGER UNSIGNED NOT NULL,
  Noi_dung TEXT NULL,
  Ngay_gio DATETIME NULL,
  PRIMARY KEY(idTin_tuc),
  INDEX Tin_tuc_FKIndex1(Danh_muc_con_idDanh_muc_con),
  FOREIGN KEY(Danh_muc_con_idDanh_muc_con)
    REFERENCES Danh_muc_con(idDanh_muc_con)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


