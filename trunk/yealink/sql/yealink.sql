-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2012 at 04:57 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yealink`
--

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `expire`, `data`) VALUES
('mekb8fodrahhrbv5nnbnpudue4', 1331784986, '0d2ef4efaccf97ac898b3af924529c3a__returnUrl|s:52:"/yealink/htdocs/index.php/search/1330790009/?name=at";0d2ef4efaccf97ac898b3af924529c3a__id|s:1:"1";0d2ef4efaccf97ac898b3af924529c3a__name|s:5:"admin";0d2ef4efaccf97ac898b3af924529c3a__states|a:0:{}'),
('n3474tp5v8en86efjcagjgbla1', 1331784382, '0d2ef4efaccf97ac898b3af924529c3a__returnUrl|s:52:"/yealink/htdocs/index.php/search/1330790009/?name=at";');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'lasa.dev@gmail.com', 'ab', 'c', '22a4495f714eead69ca347315764ab02', 1261146094, 1331782950, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_contacts`
--

CREATE TABLE IF NOT EXISTS `tbl_user_contacts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `name` varchar(512) NOT NULL,
  `account` varchar(256) NOT NULL,
  `created_timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_contact_exist_index` (`user_id`,`name`,`account`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tbl_user_contacts`
--

INSERT INTO `tbl_user_contacts` (`id`, `user_id`, `name`, `account`, `created_timestamp`) VALUES
(38, 1, '_noname_1', 'vphat28@gmail.com', '2012-03-13 04:59:04'),
(39, 1, 'Thanh IT', 'vphat28@gmail.com', '2012-03-13 04:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_contact_addresses`
--

CREATE TABLE IF NOT EXISTS `tbl_user_contact_addresses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_contact_id` int(10) NOT NULL,
  `address` varchar(512) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_contact_address_exist_index` (`user_contact_id`,`address`,`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_contact_emails`
--

CREATE TABLE IF NOT EXISTS `tbl_user_contact_emails` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_contact_id` int(10) NOT NULL,
  `email` varchar(256) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_contact_email_exist_index` (`user_contact_id`,`email`,`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tbl_user_contact_emails`
--

INSERT INTO `tbl_user_contact_emails` (`id`, `user_contact_id`, `email`, `type`) VALUES
(40, 38, 'nhienchi@gmail.com', NULL),
(41, 39, 'thanhit@giaiphapseo.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_contact_phones`
--

CREATE TABLE IF NOT EXISTS `tbl_user_contact_phones` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_contact_id` int(10) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_contact_phones_exist_index` (`user_contact_id`,`phone`,`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_phones`
--

CREATE TABLE IF NOT EXISTS `tbl_user_phones` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `phoneid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user_phones`
--

INSERT INTO `tbl_user_phones` (`id`, `user_id`, `phoneid`) VALUES
(1, 1, 1330790009);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
