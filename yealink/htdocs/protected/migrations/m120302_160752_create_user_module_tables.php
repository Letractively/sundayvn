<?php

class m120302_160752_create_user_module_tables extends CDbMigration
{
	public function up()
	{
		$sql = <<<EOF

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `yealink`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'lasa.dev@gmail.com', 'ab', 'c', '22a4495f714eead69ca347315764ab02', 1261146094, 1330999529, 1, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

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
		
EOF;
		 Yii::app()->db->createCommand($sql)->execute();
	}

	public function down()
	{
		echo "m120302_160752_create_user_module_tables does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}