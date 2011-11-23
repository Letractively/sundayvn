-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2011 at 01:36 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `diaoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `ban_tin`
--

CREATE TABLE IF NOT EXISTS `ban_tin` (
  `id_bantin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Khach_hang_ID_khach_hang` int(10) unsigned NOT NULL,
  `Chuyen_muc_idChuyen_muc` int(10) unsigned NOT NULL,
  `Bat_dong_san_idBat_dong_san` int(10) unsigned NOT NULL,
  `Hinh_anh_nha_dat_idanh_nha_dat` int(10) unsigned NOT NULL,
  `Quan_huyen_idQuan_huyen` int(10) unsigned NOT NULL,
  `Tinh_thanh_pho_idTinh_thanh_pho` int(10) unsigned NOT NULL,
  `Quoc_gia_idQuoc_gia` int(10) unsigned NOT NULL,
  `So_nha` varchar(50) DEFAULT NULL,
  `Duong_pho` varchar(100) DEFAULT NULL,
  `Gia` float DEFAULT NULL,
  `Loai_menh_gia` varchar(15) DEFAULT NULL,
  `Moi_gioi` bit(1) DEFAULT NULL,
  `Hoa_hong` float DEFAULT NULL,
  `Dien_tich` float DEFAULT NULL,
  `Chieu_dai_khuon_vien` float DEFAULT NULL,
  `Chieu_rong_khuon_vien` float DEFAULT NULL,
  `No_hau_khuon_vien` bit(1) DEFAULT NULL,
  `Chieu_dai_xay_dung` float DEFAULT NULL,
  `Chieu_rong_xay_dung` float DEFAULT NULL,
  `No_hau_xay_dung` bit(1) DEFAULT NULL,
  `Huong_tai_san` varchar(30) DEFAULT NULL,
  `Tinh_trang_phap_ly` varchar(30) DEFAULT NULL,
  `Duong_truoc_nha` varchar(20) DEFAULT NULL,
  `So_lau` int(10) unsigned DEFAULT NULL,
  `So_phong_khach` int(10) unsigned DEFAULT NULL,
  `So_phong_ngu` int(10) unsigned DEFAULT NULL,
  `So_phong_tam` int(10) unsigned DEFAULT NULL,
  `So_phong_ve_sinh` int(10) unsigned DEFAULT NULL,
  `So_phong_khac` int(10) unsigned DEFAULT NULL,
  `Tien_ich_khac` varchar(500) DEFAULT NULL,
  `Chi_tiet_khac` varchar(100) DEFAULT NULL,
  `Tieu_de` varchar(500) DEFAULT NULL,
  `Nguoi_lien_he` varchar(50) DEFAULT NULL,
  `Dien_thoai` varchar(20) DEFAULT NULL,
  `Di_dong` varchar(20) DEFAULT NULL,
  `Ghi_chu` varchar(100) DEFAULT NULL,
  `Dia_chi_nguoi_lien_he` varchar(200) DEFAULT NULL,
  `Ten_du_an` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_bantin`),
  KEY `Ban_tin_khachhang_canhan_doanhgnhiep_FKIndex2` (`Quoc_gia_idQuoc_gia`),
  KEY `Ban_tin_khachhang_canhan_doanhgnhiep_FKIndex3` (`Tinh_thanh_pho_idTinh_thanh_pho`),
  KEY `Ban_tin_khachhang_canhan_doanhgnhiep_FKIndex4` (`Quan_huyen_idQuan_huyen`),
  KEY `Ban_tin_khachhang_canhan_doanhgnhiep_FKIndex5` (`Hinh_anh_nha_dat_idanh_nha_dat`),
  KEY `Ban_tin_khachhang_canhan_doanhgnhiep_FKIndex6` (`Bat_dong_san_idBat_dong_san`),
  KEY `Ban_tin_khachhang_canhan_doanhgnhiep_FKIndex7` (`Chuyen_muc_idChuyen_muc`),
  KEY `Ban_tin_khachhang_canhan_doanhgnhiep_FKIndex8` (`Khach_hang_ID_khach_hang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ban_tin`
--


-- --------------------------------------------------------

--
-- Table structure for table `bat_dong_san`
--

CREATE TABLE IF NOT EXISTS `bat_dong_san` (
  `idBat_dong_san` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Ten_bat_dong_san` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idBat_dong_san`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bat_dong_san`
--


-- --------------------------------------------------------

--
-- Table structure for table `chuyen_muc`
--

CREATE TABLE IF NOT EXISTS `chuyen_muc` (
  `idChuyen_muc` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Ten_chuyen_muc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idChuyen_muc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `chuyen_muc`
--


-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE IF NOT EXISTS `danh_muc` (
  `idDanhmuc` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Ten_Danhmuc` varchar(255) NOT NULL,
  `Mieuta_Danhmuc` text,
  PRIMARY KEY (`idDanhmuc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`idDanhmuc`, `Ten_Danhmuc`, `Mieuta_Danhmuc`) VALUES
(1, 'Tin Địa ốc', ''),
(2, 'Thư viện Địa ốc', ''),
(3, 'Khám phá trải nghiệm', ''),
(4, 'Tư vấn luật', '');

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc_con`
--

CREATE TABLE IF NOT EXISTS `danh_muc_con` (
  `idDanh_muc_con` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Danh_muc_idDanhmuc` int(10) unsigned NOT NULL,
  `Ten_danh_muc_con` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idDanh_muc_con`),
  KEY `Danh_muc_con_FKIndex1` (`Danh_muc_idDanhmuc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `danh_muc_con`
--


-- --------------------------------------------------------

--
-- Table structure for table `doanhnghiep_bantin`
--

CREATE TABLE IF NOT EXISTS `doanhnghiep_bantin` (
  `idBantin_khachhang_doanhgnhiep` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Khach_hang_ID_khach_hang` int(10) unsigned NOT NULL,
  `Loai_du_an_idLoai_du_an` int(10) unsigned NOT NULL,
  `Chi_tiet_du_an` text,
  `Tieu_de` text,
  `Vitri` text,
  PRIMARY KEY (`idBantin_khachhang_doanhgnhiep`),
  KEY `Bantin_khachhang_doanhgnhiep_FKIndex1` (`Loai_du_an_idLoai_du_an`),
  KEY `Bantin_khachhang_doanhgnhiep_FKIndex2` (`Khach_hang_ID_khach_hang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `doanhnghiep_bantin`
--


-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_nha_dat`
--

CREATE TABLE IF NOT EXISTS `hinh_anh_nha_dat` (
  `idanh_nha_dat` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Url_duong_dan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idanh_nha_dat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hinh_anh_nha_dat`
--


-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE IF NOT EXISTS `khach_hang` (
  `ID_khach_hang` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Ten_dang_nhap` varchar(50) DEFAULT NULL,
  `Mat_khau` varchar(50) DEFAULT NULL,
  `Ho_va_ten` varchar(80) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Ngay_sinh` datetime DEFAULT NULL,
  `Gioi_tinh` tinyint(1) DEFAULT '0',
  `Dia_chi` varchar(200) DEFAULT NULL,
  `Dien_thoai_ban` varchar(30) DEFAULT NULL,
  `Dien_thoai_di_dong` varchar(30) DEFAULT NULL,
  `Url_anh_dai_dien` varchar(100) DEFAULT NULL,
  `Ladoanhgnhiep` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`ID_khach_hang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ID_khach_hang`, `Ten_dang_nhap`, `Mat_khau`, `Ho_va_ten`, `Email`, `Ngay_sinh`, `Gioi_tinh`, `Dia_chi`, `Dien_thoai_ban`, `Dien_thoai_di_dong`, `Url_anh_dai_dien`, `Ladoanhgnhiep`) VALUES
(1, 'canhan', 'canhan', 'Cá nhân', 'canhan@gmail.com', '2010-10-10 00:50:28', 1, '1/5 Nguyễn Văn Ngọc', NULL, '0985818474', NULL, 0),
(2, 'doanhnghiep', 'doanhnghiep', 'Doanh nghiệp', 'doanhnghiep@gmail.com', '2001-01-01 00:52:53', 1, '1/5 Nguyễn Văn Ngọc', NULL, '0985818474', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang_mail_message`
--

CREATE TABLE IF NOT EXISTS `khach_hang_mail_message` (
  `idKhach_hang_thu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Khach_hang_ID_khach_hang` int(10) unsigned NOT NULL,
  `Noi_dung` text,
  PRIMARY KEY (`idKhach_hang_thu`),
  KEY `Khach_hang_mail_message_FKIndex1` (`Khach_hang_ID_khach_hang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `khach_hang_mail_message`
--


-- --------------------------------------------------------

--
-- Table structure for table `loai_du_an`
--

CREATE TABLE IF NOT EXISTS `loai_du_an` (
  `idLoai_du_an` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_du_an` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idLoai_du_an`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `loai_du_an`
--


-- --------------------------------------------------------

--
-- Table structure for table `phuong_xa`
--

CREATE TABLE IF NOT EXISTS `phuong_xa` (
  `idPhuong_xa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Quan_huyen_idQuan_huyen` int(10) unsigned NOT NULL,
  `Ten_phuong_xa` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idPhuong_xa`),
  KEY `Phuong_xa_FKIndex1` (`Quan_huyen_idQuan_huyen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `phuong_xa`
--


-- --------------------------------------------------------

--
-- Table structure for table `quan_huyen`
--

CREATE TABLE IF NOT EXISTS `quan_huyen` (
  `idQuan_huyen` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Tinh_thanh_pho_idTinh_thanh_pho` int(10) unsigned NOT NULL,
  `Ten_quan_huyen` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idQuan_huyen`),
  KEY `Quan_huyen_FKIndex1` (`Tinh_thanh_pho_idTinh_thanh_pho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quan_huyen`
--


-- --------------------------------------------------------

--
-- Table structure for table `quoc_gia`
--

CREATE TABLE IF NOT EXISTS `quoc_gia` (
  `idQuoc_gia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Ten_quoc_gia` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idQuoc_gia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quoc_gia`
--


-- --------------------------------------------------------

--
-- Table structure for table `thongtin_doanhnghiep`
--

CREATE TABLE IF NOT EXISTS `thongtin_doanhnghiep` (
  `Khach_hang_ID_khach_hang` int(10) unsigned NOT NULL,
  `Ten_cong_ty` varchar(200) DEFAULT NULL,
  `Dia_chi` varchar(500) DEFAULT NULL,
  `Dien_thoai` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Web_site` varchar(200) DEFAULT NULL,
  `Von` int(10) unsigned DEFAULT NULL,
  `Ngay_thanh_lap` datetime DEFAULT NULL,
  `Gioi_thieu` varchar(2000) DEFAULT NULL,
  `Hinh_url` varchar(200) DEFAULT NULL,
  KEY `Thongtin_doanhnghiep_FKIndex1` (`Khach_hang_ID_khach_hang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thongtin_doanhnghiep`
--


-- --------------------------------------------------------

--
-- Table structure for table `tinh_thanh_pho`
--

CREATE TABLE IF NOT EXISTS `tinh_thanh_pho` (
  `idTinh_thanh_pho` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Quoc_gia_idQuoc_gia` int(10) unsigned NOT NULL,
  `Ten_tinh_thanhpho` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idTinh_thanh_pho`),
  KEY `Tinh_thanh_pho_FKIndex1` (`Quoc_gia_idQuoc_gia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tinh_thanh_pho`
--


-- --------------------------------------------------------

--
-- Table structure for table `tin_tuc`
--

CREATE TABLE IF NOT EXISTS `tin_tuc` (
  `idTin_tuc` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Danh_muc_con_idDanh_muc_con` int(10) unsigned NOT NULL,
  `Noi_dung` text,
  `Ngay_gio` datetime DEFAULT NULL,
  PRIMARY KEY (`idTin_tuc`),
  KEY `Tin_tuc_FKIndex1` (`Danh_muc_con_idDanh_muc_con`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tin_tuc`
--


-- --------------------------------------------------------

--
-- Table structure for table `tin_tuc_doanh_nghiep`
--

CREATE TABLE IF NOT EXISTS `tin_tuc_doanh_nghiep` (
  `idTin_tuc_doanh_ghiep` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Khach_hang_ID_khach_hang` int(10) unsigned NOT NULL,
  `Noi_dung` text,
  PRIMARY KEY (`idTin_tuc_doanh_ghiep`),
  KEY `Tin_tuc_doanh_nghiep_FKIndex1` (`Khach_hang_ID_khach_hang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tin_tuc_doanh_nghiep`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `ban_tin`
--
ALTER TABLE `ban_tin`
  ADD CONSTRAINT `ban_tin_ibfk_1` FOREIGN KEY (`Quoc_gia_idQuoc_gia`) REFERENCES `quoc_gia` (`idQuoc_gia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ban_tin_ibfk_2` FOREIGN KEY (`Tinh_thanh_pho_idTinh_thanh_pho`) REFERENCES `tinh_thanh_pho` (`idTinh_thanh_pho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ban_tin_ibfk_3` FOREIGN KEY (`Quan_huyen_idQuan_huyen`) REFERENCES `quan_huyen` (`idQuan_huyen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ban_tin_ibfk_4` FOREIGN KEY (`Hinh_anh_nha_dat_idanh_nha_dat`) REFERENCES `hinh_anh_nha_dat` (`idanh_nha_dat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ban_tin_ibfk_5` FOREIGN KEY (`Bat_dong_san_idBat_dong_san`) REFERENCES `bat_dong_san` (`idBat_dong_san`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ban_tin_ibfk_6` FOREIGN KEY (`Chuyen_muc_idChuyen_muc`) REFERENCES `chuyen_muc` (`idChuyen_muc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ban_tin_ibfk_7` FOREIGN KEY (`Khach_hang_ID_khach_hang`) REFERENCES `khach_hang` (`ID_khach_hang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `danh_muc_con`
--
ALTER TABLE `danh_muc_con`
  ADD CONSTRAINT `danh_muc_con_ibfk_1` FOREIGN KEY (`Danh_muc_idDanhmuc`) REFERENCES `danh_muc` (`idDanhmuc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doanhnghiep_bantin`
--
ALTER TABLE `doanhnghiep_bantin`
  ADD CONSTRAINT `doanhnghiep_bantin_ibfk_1` FOREIGN KEY (`Loai_du_an_idLoai_du_an`) REFERENCES `loai_du_an` (`idLoai_du_an`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `doanhnghiep_bantin_ibfk_2` FOREIGN KEY (`Khach_hang_ID_khach_hang`) REFERENCES `khach_hang` (`ID_khach_hang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `khach_hang_mail_message`
--
ALTER TABLE `khach_hang_mail_message`
  ADD CONSTRAINT `khach_hang_mail_message_ibfk_1` FOREIGN KEY (`Khach_hang_ID_khach_hang`) REFERENCES `khach_hang` (`ID_khach_hang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `phuong_xa`
--
ALTER TABLE `phuong_xa`
  ADD CONSTRAINT `phuong_xa_ibfk_1` FOREIGN KEY (`Quan_huyen_idQuan_huyen`) REFERENCES `quan_huyen` (`idQuan_huyen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quan_huyen`
--
ALTER TABLE `quan_huyen`
  ADD CONSTRAINT `quan_huyen_ibfk_1` FOREIGN KEY (`Tinh_thanh_pho_idTinh_thanh_pho`) REFERENCES `tinh_thanh_pho` (`idTinh_thanh_pho`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thongtin_doanhnghiep`
--
ALTER TABLE `thongtin_doanhnghiep`
  ADD CONSTRAINT `thongtin_doanhnghiep_ibfk_1` FOREIGN KEY (`Khach_hang_ID_khach_hang`) REFERENCES `khach_hang` (`ID_khach_hang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tinh_thanh_pho`
--
ALTER TABLE `tinh_thanh_pho`
  ADD CONSTRAINT `tinh_thanh_pho_ibfk_1` FOREIGN KEY (`Quoc_gia_idQuoc_gia`) REFERENCES `quoc_gia` (`idQuoc_gia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD CONSTRAINT `tin_tuc_ibfk_1` FOREIGN KEY (`Danh_muc_con_idDanh_muc_con`) REFERENCES `danh_muc_con` (`idDanh_muc_con`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tin_tuc_doanh_nghiep`
--
ALTER TABLE `tin_tuc_doanh_nghiep`
  ADD CONSTRAINT `tin_tuc_doanh_nghiep_ibfk_1` FOREIGN KEY (`Khach_hang_ID_khach_hang`) REFERENCES `khach_hang` (`ID_khach_hang`) ON DELETE NO ACTION ON UPDATE NO ACTION;
