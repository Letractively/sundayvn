-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2013 at 10:31 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `joomla25`
--

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_config`
--

DROP TABLE IF EXISTS `lekg5_acymailing_config`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_config` (
  `namekey` varchar(200) NOT NULL,
  `value` text,
  PRIMARY KEY (`namekey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lekg5_acymailing_config`
--

INSERT INTO `lekg5_acymailing_config` (`namekey`, `value`) VALUES
('level', 'Starter'),
('version', '3.7.0'),
('from_name', 'Joomla 2.5'),
('from_email', 'vphat28@gmail.com'),
('reply_name', 'Joomla 2.5'),
('reply_email', 'vphat28@gmail.com'),
('bounce_email', ''),
('add_names', '1'),
('mailer_method', 'mail'),
('encoding_format', '8bit'),
('charset', 'UTF-8'),
('word_wrapping', '150'),
('hostname', ''),
('embed_images', '0'),
('embed_files', '1'),
('editor', '0'),
('multiple_part', '1'),
('sendmail_path', '/usr/sbin/sendmail'),
('smtp_host', 'localhost'),
('smtp_port', ''),
('smtp_secured', ''),
('smtp_auth', '0'),
('smtp_username', ''),
('smtp_password', ''),
('queue_nbmail', '40'),
('queue_nbmail_auto', '70'),
('queue_type', 'auto'),
('queue_try', '3'),
('queue_pause', '120'),
('allow_visitor', '1'),
('require_confirmation', '0'),
('priority_newsletter', '3'),
('allowedfiles', 'zip,doc,docx,pdf,xls,txt,gzip,rar,jpg,gif,xlsx,pps,csv,bmp,ico,odg,odp,ods,odt,png,ppt,swf,xcf,mp3,wma'),
('uploadfolder', 'media/com_acymailing/upload'),
('confirm_redirect', ''),
('subscription_message', '1'),
('notification_unsuball', ''),
('cron_next', '1251990901'),
('confirmation_message', '1'),
('welcome_message', '1'),
('unsub_message', '1'),
('cron_last', '0'),
('cron_fromip', ''),
('cron_report', ''),
('cron_frequency', '900'),
('cron_sendreport', '2'),
('cron_sendto', 'vphat28@gmail.com'),
('cron_fullreport', '1'),
('cron_savereport', '2'),
('cron_savepath', 'media/com_acymailing/logs/report165008544.log'),
('notification_created', ''),
('notification_accept', ''),
('notification_refuse', ''),
('forward', '0'),
('description_starter', 'Joomla!™ Mailing Extension'),
('description_essential', 'Joomla!™ E-mail Marketing'),
('description_business', 'Joomla!™ E-mail Marketing'),
('description_enterprise', 'Joomla!™ E-mail Marketing'),
('priority_followup', '2'),
('unsub_redirect', ''),
('show_footer', '1'),
('use_sef', '0'),
('itemid', '0'),
('css_module', 'default'),
('css_frontend', 'default'),
('css_backend', 'default'),
('menu_position', 'under'),
('installcomplete', '1'),
('Starter', '0'),
('Essential', '1'),
('Business', '2'),
('Enterprise', '3');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_fields`
--

DROP TABLE IF EXISTS `lekg5_acymailing_fields`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_fields` (
  `fieldid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `fieldname` varchar(250) NOT NULL,
  `namekey` varchar(50) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `value` text NOT NULL,
  `published` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `ordering` smallint(5) unsigned DEFAULT '99',
  `options` text,
  `core` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `required` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `backend` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `frontcomp` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `default` varchar(250) DEFAULT NULL,
  `listing` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`fieldid`),
  UNIQUE KEY `namekey` (`namekey`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lekg5_acymailing_fields`
--

INSERT INTO `lekg5_acymailing_fields` (`fieldid`, `fieldname`, `namekey`, `type`, `value`, `published`, `ordering`, `options`, `core`, `required`, `backend`, `frontcomp`, `default`, `listing`) VALUES
(1, 'NAMECAPTION', 'name', 'text', '', 1, 1, '', 1, 1, 1, 1, '', 1),
(2, 'EMAILCAPTION', 'email', 'text', '', 1, 2, '', 1, 1, 1, 1, '', 1),
(3, 'RECEIVE', 'html', 'radio', '0::JOOMEXT_TEXT\n1::HTML', 1, 3, '', 1, 1, 1, 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_filter`
--

DROP TABLE IF EXISTS `lekg5_acymailing_filter`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_filter` (
  `filid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `description` text,
  `published` tinyint(3) unsigned DEFAULT NULL,
  `lasttime` int(10) unsigned DEFAULT NULL,
  `trigger` text,
  `report` text,
  `action` text,
  `filter` text,
  PRIMARY KEY (`filid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_history`
--

DROP TABLE IF EXISTS `lekg5_acymailing_history`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_history` (
  `subid` int(10) unsigned NOT NULL,
  `date` int(10) unsigned NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `action` varchar(50) NOT NULL COMMENT 'different actions: created,modified,confirmed',
  `data` text,
  `source` text,
  `mailid` mediumint(8) unsigned DEFAULT NULL,
  KEY `subid` (`subid`,`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lekg5_acymailing_history`
--

INSERT INTO `lekg5_acymailing_history` (`subid`, `date`, `ip`, `action`, `data`, `source`, `mailid`) VALUES
(2, 1358245407, '127.0.0.1', 'created', 'EXECUTED_BY::232 ( admin )', 'HTTP_REFERER::http://localhost/joomla25/administrator/index.php?option=com_projectfork&workspace=1&section=users&task=form_new\nHTTP_USER_AGENT::Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11 AlexaToolbar/alxg-3.1\nHTTP_HOST::localhost\nSERVER_ADDR::127.0.0.1\nREMOTE_ADDR::127.0.0.1\nREQUEST_URI::/joomla25/administrator/index.php?option=com_projectfork&workspace=1&section=users&task=form_new\nQUERY_STRING::option=com_projectfork&workspace=1&section=users&task=form_new', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_list`
--

DROP TABLE IF EXISTS `lekg5_acymailing_list`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_list` (
  `name` varchar(250) NOT NULL,
  `description` text,
  `ordering` smallint(10) unsigned DEFAULT NULL,
  `listid` smallint(10) unsigned NOT NULL AUTO_INCREMENT,
  `published` tinyint(11) DEFAULT NULL,
  `userid` int(10) unsigned DEFAULT NULL,
  `alias` varchar(250) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT '1',
  `welmailid` mediumint(11) DEFAULT NULL,
  `unsubmailid` mediumint(11) DEFAULT NULL,
  `type` enum('list','campaign') NOT NULL DEFAULT 'list',
  `access_sub` varchar(250) DEFAULT 'all',
  `access_manage` varchar(250) NOT NULL DEFAULT 'none',
  `languages` varchar(250) NOT NULL DEFAULT 'all',
  PRIMARY KEY (`listid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lekg5_acymailing_list`
--

INSERT INTO `lekg5_acymailing_list` (`name`, `description`, `ordering`, `listid`, `published`, `userid`, `alias`, `color`, `visible`, `welmailid`, `unsubmailid`, `type`, `access_sub`, `access_manage`, `languages`) VALUES
('Newsletters', 'Receive our latest news', 1, 1, 1, 232, 'mailing_list', '#3366ff', 1, NULL, NULL, 'list', 'all', 'none', 'all');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_listcampaign`
--

DROP TABLE IF EXISTS `lekg5_acymailing_listcampaign`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_listcampaign` (
  `campaignid` smallint(10) unsigned NOT NULL,
  `listid` smallint(10) unsigned NOT NULL,
  PRIMARY KEY (`campaignid`,`listid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_listmail`
--

DROP TABLE IF EXISTS `lekg5_acymailing_listmail`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_listmail` (
  `listid` smallint(10) unsigned NOT NULL,
  `mailid` mediumint(10) unsigned NOT NULL,
  PRIMARY KEY (`listid`,`mailid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_listsub`
--

DROP TABLE IF EXISTS `lekg5_acymailing_listsub`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_listsub` (
  `listid` smallint(11) unsigned NOT NULL,
  `subid` int(11) unsigned NOT NULL,
  `subdate` int(11) unsigned DEFAULT NULL,
  `unsubdate` int(11) unsigned DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`listid`,`subid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lekg5_acymailing_listsub`
--

INSERT INTO `lekg5_acymailing_listsub` (`listid`, `subid`, `subdate`, `unsubdate`, `status`) VALUES
(1, 1, 1357635547, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_mail`
--

DROP TABLE IF EXISTS `lekg5_acymailing_mail`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_mail` (
  `mailid` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(250) NOT NULL,
  `body` longtext NOT NULL,
  `altbody` longtext NOT NULL,
  `published` tinyint(4) DEFAULT '1',
  `senddate` int(10) unsigned DEFAULT NULL,
  `created` int(10) unsigned DEFAULT NULL,
  `fromname` varchar(250) NOT NULL,
  `fromemail` varchar(250) NOT NULL,
  `replyname` varchar(250) NOT NULL,
  `replyemail` varchar(250) NOT NULL,
  `type` enum('news','autonews','followup','unsub','welcome','notification') NOT NULL DEFAULT 'news',
  `visible` tinyint(4) NOT NULL DEFAULT '1',
  `userid` int(10) unsigned DEFAULT NULL,
  `alias` varchar(250) DEFAULT NULL,
  `attach` text,
  `html` tinyint(4) NOT NULL DEFAULT '1',
  `tempid` smallint(11) NOT NULL DEFAULT '0',
  `key` varchar(200) DEFAULT NULL,
  `frequency` varchar(50) DEFAULT NULL,
  `params` text,
  `sentby` int(11) unsigned DEFAULT NULL,
  `metakey` text,
  `metadesc` text,
  `filter` text,
  PRIMARY KEY (`mailid`),
  KEY `senddate` (`senddate`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `lekg5_acymailing_mail`
--

INSERT INTO `lekg5_acymailing_mail` (`mailid`, `subject`, `body`, `altbody`, `published`, `senddate`, `created`, `fromname`, `fromemail`, `replyname`, `replyemail`, `type`, `visible`, `userid`, `alias`, `attach`, `html`, `tempid`, `key`, `frequency`, `params`, `sentby`, `metakey`, `metadesc`, `filter`) VALUES
(1, 'New Subscriber on your website : {user:email}', '<p>Hello {subtag:name},</p><p>A new user has been created in AcyMailing : </p><blockquote><p>Name : {user:name}</p><p>Email : {user:email}</p><p>IP : {user:ip} </p><p>Subscription : {user:subscription}</p></blockquote>', '', 1, NULL, NULL, '', '', '', '', 'notification', 0, NULL, 'notification_created', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'A User unsubscribed from all your lists : {user:email}', '<p>Hello {subtag:name},</p><p>The user {user:name} : {user:email} unsubscribed from all your lists</p><p>Subscription : {user:subscription}</p><p>{survey}</p>', '', 1, NULL, NULL, '', '', '', '', 'notification', 0, NULL, 'notification_unsuball', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'A User unsubscribed : {user:email}', '<p>Hello {subtag:name},</p><p>The user {user:name} : {user:email} unsubscribed from your list</p><p>Subscription : {user:subscription}</p><p>{survey}</p>', '', 1, NULL, NULL, '', '', '', '', 'notification', 0, NULL, 'notification_unsub', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'A User refuses to receive e-mails from your website : {user:email}', '<p>The User {user:name} : {user:email} refuses to receive any e-mail anymore from your website.</p><p>Subscription : {user:subscription}</p><p>{survey}</p>', '', 1, NULL, NULL, '', '', '', '', 'notification', 0, NULL, 'notification_refuse', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '{subtag:name|ucfirst}, {trans:PLEASE_CONFIRM_SUB}', '<div style="text-align: center; width: 100%; background-color: #ffffff;">\r\n			<table style="text-align:justify; margin:auto; background-color:#ebebeb; border:1px solid #e7e7e7" border="0" cellspacing="0" cellpadding="0" width="600" align="center" bgcolor="#ebebeb">\r\n			<tbody>\r\n			<tr style="line-height: 0px;">\r\n			<td style="line-height: 0px;" height="38px"><img src="media/com_acymailing/templates/newsletter-4/top.png" border="0" alt=" - - - " /></td>\r\n			</tr>\r\n			<tr>\r\n			<td style="text-align:center" width="600">\r\n			<table style="margin:auto;" border="0" cellspacing="0" cellpadding="0" width="520">\r\n			<tbody>\r\n			<tr>\r\n			<td style="background-color: #ffffff; border: 1px solid #dbdbdb; padding: 20px; width: 500px; margin: 15px auto; text-align: left;">\r\n			<h1>Hello {subtag:name|ucfirst},</h1>\r\n			<p>{trans:CONFIRM_MSG}<br /><br />{trans:CONFIRM_MSG_ACTIVATE}</p>\r\n			<br />\r\n			<p style="text-align:center;"><strong>{confirm}{trans:CONFIRM_SUBSCRIPTION}{/confirm}</strong></p>\r\n			</td>\r\n			</tr>\r\n			</tbody>\r\n			</table>\r\n			</td>\r\n			</tr>\r\n			<tr style="line-height: 0px;">\r\n			<td style="line-height: 0px;" height="40px"><img src="media/com_acymailing/templates/newsletter-4/bottom.png" border="0" alt=" - - - " /></td>\r\n			</tr>\r\n			</tbody>\r\n			</table>\r\n			</div>', '', 1, NULL, NULL, '', '', '', '', 'notification', 0, NULL, 'confirmation', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'AcyMailing Cron Report {mainreport}', '<p>{report}</p><p>{detailreport}</p>', '', 1, NULL, NULL, '', '', '', '', 'notification', 0, NULL, 'report', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'A Newsletter has been generated : "{subject}"', '<p>The Newsletter issue {issuenb} has been generated : </p><p>Subject : {subject}</p><p>{body}</p>', '', 1, NULL, NULL, '', '', '', '', 'notification', 0, NULL, 'notification_autonews', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Modify your subscription', '<p>Hello {subtag:name}, </p><p>You requested some changes on your subscription,</p><p>Please {modify}click here{/modify} to be identified as the owner of this account and then modify your subscription.</p>', '', 1, NULL, NULL, '', '', '', '', 'notification', 0, NULL, 'modif', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_queue`
--

DROP TABLE IF EXISTS `lekg5_acymailing_queue`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_queue` (
  `senddate` int(10) unsigned NOT NULL,
  `subid` int(10) unsigned NOT NULL,
  `mailid` mediumint(10) unsigned NOT NULL,
  `priority` tinyint(3) unsigned DEFAULT '3',
  `try` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `paramqueue` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`subid`,`mailid`),
  KEY `senddate` (`senddate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_rules`
--

DROP TABLE IF EXISTS `lekg5_acymailing_rules`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_rules` (
  `ruleid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `ordering` smallint(6) DEFAULT NULL,
  `regex` text NOT NULL,
  `executed_on` text NOT NULL,
  `action_message` text NOT NULL,
  `action_user` text NOT NULL,
  `published` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`ruleid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_stats`
--

DROP TABLE IF EXISTS `lekg5_acymailing_stats`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_stats` (
  `mailid` mediumint(10) unsigned NOT NULL,
  `senthtml` int(10) unsigned NOT NULL DEFAULT '0',
  `senttext` int(10) unsigned NOT NULL DEFAULT '0',
  `senddate` int(10) unsigned NOT NULL,
  `openunique` mediumint(10) unsigned NOT NULL DEFAULT '0',
  `opentotal` int(10) unsigned NOT NULL DEFAULT '0',
  `bounceunique` mediumint(10) unsigned NOT NULL DEFAULT '0',
  `fail` mediumint(10) unsigned NOT NULL DEFAULT '0',
  `clicktotal` int(10) unsigned NOT NULL DEFAULT '0',
  `clickunique` mediumint(10) unsigned NOT NULL DEFAULT '0',
  `unsub` mediumint(10) unsigned NOT NULL DEFAULT '0',
  `forward` mediumint(10) unsigned NOT NULL DEFAULT '0',
  `bouncedetails` text,
  PRIMARY KEY (`mailid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_subscriber`
--

DROP TABLE IF EXISTS `lekg5_acymailing_subscriber`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_subscriber` (
  `subid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(250) NOT NULL,
  `created` int(10) unsigned DEFAULT NULL,
  `confirmed` tinyint(4) NOT NULL DEFAULT '0',
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  `accept` tinyint(4) NOT NULL DEFAULT '1',
  `ip` varchar(100) DEFAULT NULL,
  `html` tinyint(4) NOT NULL DEFAULT '1',
  `key` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`subid`),
  UNIQUE KEY `email` (`email`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lekg5_acymailing_subscriber`
--

INSERT INTO `lekg5_acymailing_subscriber` (`subid`, `email`, `userid`, `name`, `created`, `confirmed`, `enabled`, `accept`, `ip`, `html`, `key`) VALUES
(1, 'vphat28@gmail.com', 232, 'Super User', 1357352219, 1, 1, 1, NULL, 1, NULL),
(2, 'vphat28a@gmail.com', 233, 'Stakeholder', 1358245407, 1, 1, 1, '127.0.0.1', 1, '39af9d83eb8768fae5b90e9d701e220c');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_template`
--

DROP TABLE IF EXISTS `lekg5_acymailing_template`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_template` (
  `tempid` smallint(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `description` text,
  `body` longtext,
  `altbody` longtext,
  `created` int(10) unsigned DEFAULT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '1',
  `premium` tinyint(4) NOT NULL DEFAULT '0',
  `ordering` smallint(10) unsigned NOT NULL DEFAULT '99',
  `namekey` varchar(50) NOT NULL,
  `styles` text,
  `subject` varchar(250) DEFAULT NULL,
  `stylesheet` text,
  `fromname` varchar(250) DEFAULT NULL,
  `fromemail` varchar(250) DEFAULT NULL,
  `replyname` varchar(250) DEFAULT NULL,
  `replyemail` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`tempid`),
  UNIQUE KEY `namekey` (`namekey`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lekg5_acymailing_template`
--

INSERT INTO `lekg5_acymailing_template` (`tempid`, `name`, `description`, `body`, `altbody`, `created`, `published`, `premium`, `ordering`, `namekey`, `styles`, `subject`, `stylesheet`, `fromname`, `fromemail`, `replyname`, `replyemail`) VALUES
(1, 'White Shadow Red', '<img src="media/com_acymailing/templates/newsletter-1/newsletter-1.png" />', '<div style="background-color: #e2e8df; width: 100%; color: #8a8a8a; text-align: center;">\r\n	<table style="text-align: left; margin: auto;" align="center" width="560" cellspacing="0" cellpadding="0">\r\n		<tr>\r\n			<td class="hideonline" style="padding: 20px 0px; font-size: 10px; color: #000000; margin: auto; text-align: center;" colspan="3">This email contains graphics, so if you don''t see them, {readonline}view it in your browser{/readonline}.</td>\r\n		</tr>\r\n		<tr>\r\n			<td width="37"> </td>\r\n			<td style="background-color: #fbfbf7;" valign="top" width="496">\r\n				<table width="100%" cellspacing="0" cellpadding="0">\r\n					<tr>\r\n						<td colspan="2" height="20"> </td>\r\n					</tr>\r\n					<tr>\r\n						<td width="20"> </td>\r\n						<td style="background-color: #f9f7d3;" width="456" height="110">\r\n							<table width="456" cellspacing="0" cellpadding="0">\r\n								<tr>\r\n									<td colspan="3" height="11"> </td>\r\n								</tr>\r\n								<tr>\r\n									<td width="7"> </td>\r\n									<td style="line-height: 0px;"><img src="http://www.acyba.com/images/templates/newsletter-1/logo-icon.png" border="0" alt="" /></td>\r\n									<td valign="top">\r\n										<h1>AcyMailing is Out!</h1>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td colspan="3" height="3"> </td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n						<td width="20"> </td>\r\n					</tr>\r\n					<tr>\r\n						<td colspan="5">\r\n							<table width="100%">\r\n								<tr>\r\n									<td width="40"> </td>\r\n									<td>\r\n										<div class="acymailing_content">\r\n											<h2>E-Mail</h2>\r\n											<p style="text-align: justify;"><img src="http://www.acyba.com/images/templates/newsletter-1/acymailing.png" border="0" alt="" style="margin: 10px; float: right;" /> Electronic mail, often abbreviated as email or e-mail, is a method of exchanging digital messages, designed primarily for human use. E-mail systems are based on a store-and-forward model in which e-mail computer server systems accept, forward, deliver and store messages on behalf of users, who only need to connect to the e-mail infrastructure, typically an e-mail server, with a network-enabled device (e.g., a personal computer) for the duration of message submission or retrieval.<br /><a href="http://en.wikipedia.org/wiki/E-mail">Wikipedia</a></p>\r\n										</div>\r\n										<div class="acymailing_content">\r\n											<h2>Marketing Campaign</h2>\r\n											<p><img src="http://www.acyba.com/images/templates/newsletter-1/essential.png" border="0" alt="" style="float: left; margin: 10px;" />Marketing is an integrated communications-based process through which individuals and communities are informed or persuaded that existing and newly-identified needs and wants may be satisfied by the products and services of others.</p>\r\n											<p>Marketing is used to create the customer, to keep the customer and to satisfy the customer. <a href="http://en.wikipedia.org/wiki/Marketing_campaign">Wikipedia</a></p>\r\n										</div>\r\n										<div class="acymailing_content">\r\n											<h2>Joomla!</h2>\r\n											<p>Joomla! is a content management system platform for publishing content on the World Wide Web and intranets as well as a Model–view–controller (MVC) Web Application Development framework.</p>\r\n											<p>The system includes features such as page caching to improve performance, RSS feeds, printable versions of pages, news flashes, blogs, polls, website searching, and language internationalization.<br /><a href="http://en.wikipedia.org/wiki/Joomla">Wikipedia</a></p>\r\n										</div>\r\n									</td>\r\n									<td width="40"> </td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n			<td width="27"> </td>\r\n		</tr>\r\n		<tr style="line-height: 0px;">\r\n			<td style="line-height: 0px;" colspan="3"><img src="media/com_acymailing/templates/newsletter-1/page-footer.png" border="0" alt="" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style="padding: 20px 0px; font-size: 10px; color: #000000; margin: auto; text-align: center;" colspan="3">Not interested any more? {unsubscribe}Unsubscribe{/unsubscribe}</td>\r\n		</tr>\r\n	</table>\r\n</div>', '', NULL, 1, 0, 1, 'newsletter-1', 'a:9:{s:18:"acymailing_content";s:129:"clear:both;text-align:justify;font-family: Verdana, Arial, Helvetica, sans-serif;font-size:12px;line-height:14px;margin-top:10px;";s:16:"acymailing_title";s:89:"color:#8a8a8a;font-weight:normal;font-size:14px;margin:0;border-bottom:5px solid #d39f9f;";s:16:"acymailing_unsub";s:31:"font-weight:bold;color:#000000;";s:19:"acymailing_readmore";s:14:"color:#d39f9f;";s:17:"acymailing_online";s:31:"font-weight:bold;color:#000000;";s:6:"tag_h1";s:128:"margin-bottom:0;margin-top:0;font-family: Verdana, Arial, Helvetica, sans-serif;font-size:26px;color:#d47e7e;vertical-align:top;";s:6:"tag_h2";s:100:"color:#8a8a8a !important;font-weight:normal;font-size:14px;margin:0;border-bottom:5px solid #d39f9f;";s:6:"tag_h3";s:68:"color:#8a8a8a !important;font-weight:normal;font-size:100%;margin:0;";s:8:"color_bg";s:7:"#e2e8df";}', NULL, 'div,table{font-family: Verdana, Arial, Helvetica, sans-serif; font-size:12px;}', NULL, NULL, NULL, NULL),
(2, 'Clean White Pink', '<img src="media/com_acymailing/templates/newsletter-2/newsletter-2.png" />', '<div style="background-color: #ffffff; width: 100%; color: #8a8a8a; text-align: center;">\r\n<table style="text-align: left; margin: auto;" width="600" cellspacing="0" cellpadding="0" align="center">\r\n<tbody>\r\n<tr>\r\n<td class="hideonline" style="padding: 20px 0px; font-size: 10px; color: #000000; margin: auto; text-align: center;" colspan="3">This email contains graphics, so if you don''t see them, {readonline}view it in your browser{/readonline}.</td>\r\n</tr>\r\n<tr>\r\n<td valign="top" width="370">\r\n<h1>AcyMailing is Out!</h1>\r\n<br />\r\n<div class="acymailing_content">\r\n<h2>E-Mail</h2>\r\n<p style="font-size: 10px; margin-top: 0px;"><img src="http://www.acyba.com/images/templates/newsletter-1/acymailing.png" border="0" alt="" style="float: left;" />Electronic mail, often abbreviated as email or e-mail, is a method of exchanging digital messages, designed primarily for human use.<br /><a href="http://en.wikipedia.org/wiki/E-mail">Wikipedia</a></p>\r\n<a href="#" style="font-size: 10px; color: #999999;">Read More</a></div>\r\n<div class="acymailing_content">\r\n<h2>Marketing Campaign</h2>\r\n<p style="font-size: 10px; margin-top: 0px;"><img src="http://www.acyba.com/images/templates/newsletter-1/essential.png" border="0" alt="" style="float: left;" />Marketing is an integrated communications-based process through which individuals and communities are informed or persuaded that existing and newly-identified needs and wants may be satisfied by the products and services of others.</p>\r\n<p style="font-size: 10px; margin-top: 0px;">Marketing is used to create the customer, to keep the customer and to satisfy the customer. <a href="http://en.wikipedia.org/wiki/Marketing_campaign">Wikipedia</a></p>\r\n<a href="#" style="font-size: 10px; color: #999999;">Read More</a></div>\r\n</td>\r\n<td width="20"> </td>\r\n<td valign="top" width="210"><img src="http://www.acyba.com/images/templates/newsletter-2/logo-icon.jpg" border="0" alt="" width="207" height="137" />\r\n<div class="acymailing_content">\r\n<h2>Joomla!</h2>\r\n<p style="font-size: 10px; margin-top: 0px;">Joomla! is a content management system platform for publishing content on the World Wide Web and intranets as well as a Model–view–controller (MVC) Web Application Development framework.</p>\r\n<img src="media/com_acymailing/templates/newsletter-2/hori-separator.png" border="0" alt="" />\r\n<p style="font-size: 10px; margin-top: 0px;">The system includes features such as page caching to improve performance, RSS feeds, printable versions of pages, news flashes, blogs, polls, website searching, and language internationalization.<br /><a href="http://en.wikipedia.org/wiki/Joomla">Wikipedia</a></p>\r\n<a href="#" style="font-size: 10px; color: #999999;">Read More</a></div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style="text-align: center; padding: 20px 0px; font-size: 10px; color: #000000;" colspan="3">Not interested any more? {unsubscribe}Unsubscribe{/unsubscribe}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', '', NULL, 1, 0, 2, 'newsletter-2', 'a:8:{s:18:"acymailing_content";s:63:"clear:both;text-align:justify;line-height:14px;margin-top:10px;";s:16:"acymailing_title";s:94:"color:#8a8a8a;text-align:right;border-bottom:6px solid #d39fc9;font-size:16px;margin-top:10px;";s:19:"acymailing_readmore";s:32:"font-size: 10px; color: #999999;";s:6:"tag_h1";s:144:"margin-bottom:0;margin-top:0;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:26px;color:#d47e7e;vertical-align:top;text-align:center";s:8:"color_bg";s:7:"#ffffff";s:6:"tag_h2";s:105:"color:#8a8a8a !important;text-align:right;border-bottom:6px solid #d39fc9;font-size:16px;margin-top:10px;";s:6:"tag_h3";s:85:"color:#8a8a8a !important;text-align:right;font-weight:normal;font-size:100%;margin:0;";s:5:"tag_a";s:39:"color:#d39fc9;text-decoration:underline";}', NULL, 'div,table{font-family: Verdana, Arial, Helvetica, sans-serif; font-size:12px;}', NULL, NULL, NULL, NULL),
(3, 'Rounders and corners', '<img src="media/com_acymailing/templates/newsletter-3/newsletter-3.png" />', '<div style="background-color: #dfe6e8; width: 100%; font-family: Verdana, Arial, Helvetica, sans-serif; color: #8a8a8a; text-align: center;">\r\n<table style="text-align: left; margin: auto;" width="600" cellspacing="0" cellpadding="0" align="center">\r\n<tbody>\r\n<tr>\r\n<td class="hideonline" style="font-size: 10px; color: #000000; margin: auto; text-align: center; padding: 20px 0px;" colspan="3">This email contains graphics, so if you don''t see them, {readonline}view it in your browser{/readonline}.</td>\r\n</tr>\r\n<tr>\r\n<td valign="top" width="216">\r\n<table cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr style="line-height: 0px;">\r\n<td style="text-align: center;"><img src="http://www.acyba.com/images/templates/newsletter-3/logo-icon.jpg" border="0" alt="" width="207" height="137" /></td>\r\n</tr>\r\n<tr>\r\n<td height="20"> </td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr style="line-height: 0;">\r\n<td style="line-height: 0px;" colspan="3" width="216" height="15"><img src="media/com_acymailing/templates/newsletter-3/top23rds.png" border="0" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td style="background-color: #ffffff;" width="15"> </td>\r\n<td style="background-color: #ffffff;" width="186">\r\n<div class="acymailing_content">\r\n<h2>Joomla!</h2>\r\n<p style="font-size: 10px; margin-top: 0px;">Joomla! is a content management system platform for publishing content on the World Wide Web and intranets as well as a Model–view–controller (MVC) Web Application Development framework.</p>\r\n<img src="media/com_acymailing/templates/newsletter-2/hori-separator.png" border="0" alt="" />\r\n<p style="font-size: 10px;">The system includes features such as page caching to improve performance, RSS feeds, printable versions of pages, news flashes, blogs, polls, website searching, and language internationalization.<br /><a href="http://en.wikipedia.org/wiki/Joomla">Wikipedia</a></p>\r\n<a href="#" style="font-size: 10px; color: #999999;">Read More</a></div>\r\n</td>\r\n<td style="background-color: #ffffff;" width="15"> </td>\r\n</tr>\r\n<tr style="line-height: 0;">\r\n<td style="line-height: 0px;" colspan="3" width="216" height="15"><img src="media/com_acymailing/templates/newsletter-3/bottom23rds.png" border="0" alt="" /></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td width="20"> </td>\r\n<td valign="top" width="364">\r\n<table cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n<td style="background-color: #ffffff; color: #d47e7e; text-align: center;" width="325" height="48">\r\n<h1>AcyMailing is Out!</h1>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td height="20"> </td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr style="line-height: 0;">\r\n<td style="line-height: 0px;" colspan="3" width="323" height="15"><img src="media/com_acymailing/templates/newsletter-3/top23rd.png" border="0" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td style="background-color: #ffffff;" width="15"> </td>\r\n<td style="background-color: #ffffff;" width="293">\r\n<div class="acymailing_content">\r\n<h2>E-Mail</h2>\r\n<p><img src="http://www.acyba.com/images/templates/newsletter-1/acymailing.png" border="0" alt="" style="float: left;" />Electronic mail, often abbreviated as email or e-mail, is a method of exchanging digital messages, designed primarily for human use.<br /><a href="http://en.wikipedia.org/wiki/E-mail">Wikipedia</a></p>\r\n<a href="#" style="font-size: 10px; color: #999999;">Read More</a></div>\r\n</td>\r\n<td style="background-color: #ffffff;" width="15"> </td>\r\n</tr>\r\n<tr style="line-height: 0;">\r\n<td style="line-height: 0px;" colspan="3" width="323" height="15"><img src="media/com_acymailing/templates/newsletter-3/bottom23rd.png" border="0" alt="" /></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td height="20"> </td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr style="line-height: 0;">\r\n<td style="line-height: 0px;" colspan="3" width="323" height="15"><img src="media/com_acymailing/templates/newsletter-3/top23rd.png" border="0" alt="" /></td>\r\n</tr>\r\n<tr>\r\n<td style="background-color: #ffffff;" width="15"> </td>\r\n<td style="background-color: #ffffff;" width="293">\r\n<div class="acymailing_content">\r\n<h2>Marketing Campaign</h2>\r\n<p style="font-size: 10px; margin-top: 0px;"><img src="http://www.acyba.com/images/templates/newsletter-1/essential.png" border="0" alt="" style="float: right;" />Marketing is an integrated communications-based process through which individuals and communities are informed or persuaded that existing and newly-identified needs and wants may be satisfied by the products and services of others.</p>\r\n<img src="media/com_acymailing/templates/newsletter-2/hori-separator.png" border="0" alt="" />\r\n<p style="font-size: 10px;">Marketing is used to create the customer, to keep the customer and to satisfy the customer. <a href="http://en.wikipedia.org/wiki/Marketing_campaign">Wikipedia</a></p>\r\n<a href="#" style="font-size: 10px; color: #999999;">Read More</a></div>\r\n</td>\r\n<td style="background-color: #ffffff;" width="15"> </td>\r\n</tr>\r\n<tr style="line-height: 0;">\r\n<td style="line-height: 0px;" colspan="3" width="323" height="15"><img src="media/com_acymailing/templates/newsletter-3/bottom23rd.png" border="0" alt="" /></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style="padding: 20px 0px; font-size: 10px; color: #000000; margin: auto; text-align: center;" colspan="3">Not interested any more? {unsubscribe}Unsubscribe{/unsubscribe}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', '', NULL, 1, 0, 3, 'newsletter-3', 'a:7:{s:6:"tag_h1";s:127:"margin-bottom:0;margin-top:0;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:26px;color:#d47e7e;vertical-align:top;";s:6:"tag_h2";s:72:"color:#8a8a8a !important;border-bottom:6px solid #d3d09f;font-size:16px;";s:16:"acymailing_title";s:72:"color:#8a8a8a !important;border-bottom:6px solid #d3d09f;font-size:16px;";s:6:"tag_h3";s:68:"color:#8a8a8a !important;font-weight:normal;font-size:100%;margin:0;";s:19:"acymailing_readmore";s:32:"font-size: 10px; color: #999999;";s:8:"color_bg";s:7:"#dfe6e8";s:18:"acymailing_content";s:19:"text-align:justify;";}', NULL, 'div,table{font-family: Verdana, Arial, Helvetica, sans-serif; font-size:12px;}', NULL, NULL, NULL, NULL),
(4, 'Notification template', '<img src="media/com_acymailing/templates/newsletter-4/newsletter-4.png" />', '<div style="text-align:center; width:100%; background-color:#fff;">\r\n	<div class="info">{readonline}This email contains graphics, so if you don''t see them,view it in your browser{/readonline}</div>\r\n	<table width="600" bgcolor="#ebebeb" cellpadding="0" cellspacing="0" style="text-align:justify; margin:auto; background-color:#ebebeb; border:1px solid #e7e7e7" align="center">\r\n		<tr>\r\n			<td height="38px">\r\n				<img src="media/com_acymailing/templates/newsletter-4/top.png" alt=" - - - "/>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width="600" style="text-align:center">\r\n				<table width="520" border="0" cellpadding="0" cellspacing="0" style="margin:auto;">\r\n					<tr>\r\n						<td style="padding:20px 0px; text-align:left;">\r\n							<img src="media/com_acymailing/templates/newsletter-4/message_icon.png" alt="" style="float:left; margin:0px; margin-right:20px;"/>\r\n							<h3>Topic of your message</h3>\r\n							<h4>Subtitle for your message</h4>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style="background-color:#fff; border:1px solid #dbdbdb; padding:20px; width:500px; margin:auto; margin-top:15px; margin-bottom:15px;text-align:left">\r\n							<h1>Dear {subtag:name},</h1>\r\n							Your message here...\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="40px">\r\n				<img src="media/com_acymailing/templates/newsletter-4/bottom.png" alt=" - - - " />\r\n			</td>\r\n		</tr>\r\n	 </table>\r\n	 <div class="info">Not interested any more? {unsubscribe}Unsubscribe{/unsubscribe}</div>\r\n</div>', '', NULL, 1, 0, 4, 'newsletter-4', 'a:9:{s:6:"tag_h1";s:79:"color:#393939 !important; font-size:14px; font-weight:normal; font-weight:bold;";s:6:"tag_h2";s:106:"color: #309fb3 !important; font-size: 14px; font-weight: normal; text-align:left; margin:0px; padding:0px;";s:6:"tag_h3";s:144:"color: #393939 !important; font-size: 18px; font-weight: bold; text-align:left; margin:0px; padding-bottom:5px; border-bottom:1px solid #bdbdbd;";s:6:"tag_h4";s:104:"color: #309fb3 !important; font-size: 14px; font-weight: bold; text-align:left; margin:0px; padding:0px;";s:5:"tag_a";s:71:"color:#4d4d4d; text-decoration:none; font-style:italic; cursor:pointer;";s:19:"acymailing_readmore";s:32:"font-size: 10px; color: #999999;";s:17:"acymailing_online";s:52:"color:#a3a3a3; text-decoration:none; font-size:11px;";s:8:"color_bg";s:7:"#ffffff";s:18:"acymailing_content";s:19:"text-align:justify;";}', NULL, 'div,table{font-family: Verdana, Arial, Helvetica, sans-serif; font-size:12px;} div.info{text:align:center;padding:10px;}', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_url`
--

DROP TABLE IF EXISTS `lekg5_acymailing_url`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_url` (
  `urlid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`urlid`),
  KEY `url` (`url`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_urlclick`
--

DROP TABLE IF EXISTS `lekg5_acymailing_urlclick`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_urlclick` (
  `urlid` int(10) unsigned NOT NULL,
  `mailid` mediumint(10) unsigned NOT NULL,
  `click` smallint(10) unsigned NOT NULL DEFAULT '0',
  `subid` int(10) unsigned NOT NULL,
  `date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`urlid`,`mailid`,`subid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_acymailing_userstats`
--

DROP TABLE IF EXISTS `lekg5_acymailing_userstats`;
CREATE TABLE IF NOT EXISTS `lekg5_acymailing_userstats` (
  `mailid` mediumint(10) unsigned NOT NULL,
  `subid` int(10) unsigned NOT NULL,
  `html` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `sent` tinyint(4) NOT NULL DEFAULT '1',
  `senddate` int(11) NOT NULL,
  `open` tinyint(4) NOT NULL DEFAULT '0',
  `opendate` int(11) NOT NULL,
  `bounce` tinyint(4) NOT NULL DEFAULT '0',
  `fail` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mailid`,`subid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_assets`
--

DROP TABLE IF EXISTS `lekg5_assets`;
CREATE TABLE IF NOT EXISTS `lekg5_assets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set parent.',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `level` int(10) unsigned NOT NULL COMMENT 'The cached level in the nested tree.',
  `name` varchar(50) NOT NULL COMMENT 'The unique name for the asset.\n',
  `title` varchar(100) NOT NULL COMMENT 'The descriptive title for the asset.',
  `rules` varchar(5120) NOT NULL COMMENT 'JSON encoded access control.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_asset_name` (`name`),
  KEY `idx_lft_rgt` (`lft`,`rgt`),
  KEY `idx_parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `lekg5_assets`
--

INSERT INTO `lekg5_assets` (`id`, `parent_id`, `lft`, `rgt`, `level`, `name`, `title`, `rules`) VALUES
(1, 0, 1, 77, 0, 'root.1', 'Root Asset', '{"core.login.site":{"6":1,"2":1},"core.login.admin":{"6":1},"core.login.offline":{"6":1},"core.admin":{"8":1},"core.manage":{"7":1},"core.create":{"6":1,"3":1},"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1},"core.edit.own":{"6":1,"3":1}}'),
(2, 1, 1, 2, 1, 'com_admin', 'com_admin', '{}'),
(3, 1, 3, 6, 1, 'com_banners', 'com_banners', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(4, 1, 7, 8, 1, 'com_cache', 'com_cache', '{"core.admin":{"7":1},"core.manage":{"7":1}}'),
(5, 1, 9, 10, 1, 'com_checkin', 'com_checkin', '{"core.admin":{"7":1},"core.manage":{"7":1}}'),
(6, 1, 11, 12, 1, 'com_config', 'com_config', '{}'),
(7, 1, 13, 16, 1, 'com_contact', 'com_contact', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(8, 1, 17, 22, 1, 'com_content', 'com_content', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":[],"core.edit":{"4":1},"core.edit.state":{"5":1},"core.edit.own":[]}'),
(9, 1, 23, 24, 1, 'com_cpanel', 'com_cpanel', '{}'),
(10, 1, 25, 26, 1, 'com_installer', 'com_installer', '{"core.admin":[],"core.manage":{"7":0},"core.delete":{"7":0},"core.edit.state":{"7":0}}'),
(11, 1, 27, 28, 1, 'com_languages', 'com_languages', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(12, 1, 29, 30, 1, 'com_login', 'com_login', '{}'),
(13, 1, 31, 32, 1, 'com_mailto', 'com_mailto', '{}'),
(14, 1, 33, 34, 1, 'com_massmail', 'com_massmail', '{}'),
(15, 1, 35, 36, 1, 'com_media', 'com_media', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":{"5":1}}'),
(16, 1, 37, 38, 1, 'com_menus', 'com_menus', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(17, 1, 39, 40, 1, 'com_messages', 'com_messages', '{"core.admin":{"7":1},"core.manage":{"7":1}}'),
(18, 1, 41, 42, 1, 'com_modules', 'com_modules', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(19, 1, 43, 46, 1, 'com_newsfeeds', 'com_newsfeeds', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(20, 1, 47, 48, 1, 'com_plugins', 'com_plugins', '{"core.admin":{"7":1},"core.manage":[],"core.edit":[],"core.edit.state":[]}'),
(21, 1, 49, 50, 1, 'com_redirect', 'com_redirect', '{"core.admin":{"7":1},"core.manage":[]}'),
(22, 1, 51, 52, 1, 'com_search', 'com_search', '{"core.admin":{"7":1},"core.manage":{"6":1}}'),
(23, 1, 53, 54, 1, 'com_templates', 'com_templates', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(24, 1, 55, 58, 1, 'com_users', 'com_users', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(25, 1, 59, 62, 1, 'com_weblinks', 'com_weblinks', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":[],"core.edit":{"4":1},"core.edit.state":{"5":1},"core.edit.own":[]}'),
(26, 1, 63, 64, 1, 'com_wrapper', 'com_wrapper', '{}'),
(27, 8, 18, 21, 2, 'com_content.category.2', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(28, 3, 4, 5, 2, 'com_banners.category.3', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(29, 7, 14, 15, 2, 'com_contact.category.4', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(30, 19, 44, 45, 2, 'com_newsfeeds.category.5', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(31, 25, 60, 61, 2, 'com_weblinks.category.6', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(32, 24, 56, 57, 1, 'com_users.category.7', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(33, 1, 65, 66, 1, 'com_finder', 'com_finder', '{"core.admin":{"7":1},"core.manage":{"6":1}}'),
(34, 1, 67, 68, 1, 'com_joomlaupdate', 'com_joomlaupdate', '{"core.admin":[],"core.manage":[],"core.delete":[],"core.edit.state":[]}'),
(35, 1, 69, 70, 1, 'com_falang', 'com_falang', '{}'),
(36, 27, 19, 20, 3, 'com_content.article.1', 'Donec ullamcorper auctor placerat. Nullam eu nunc se', '{"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1}}'),
(38, 1, 71, 72, 1, 'com_acymailing', 'acymailing', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(39, 1, 73, 74, 1, 'com_k2', 'com_k2', '{}'),
(40, 1, 75, 76, 1, 'com_projectfork', 'projectfork', '{}');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_associations`
--

DROP TABLE IF EXISTS `lekg5_associations`;
CREATE TABLE IF NOT EXISTS `lekg5_associations` (
  `id` varchar(50) NOT NULL COMMENT 'A reference to the associated item.',
  `context` varchar(50) NOT NULL COMMENT 'The context of the associated item.',
  `key` char(32) NOT NULL COMMENT 'The key for the association computed from an md5 on associated ids.',
  PRIMARY KEY (`context`,`id`),
  KEY `idx_key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_banners`
--

DROP TABLE IF EXISTS `lekg5_banners`;
CREATE TABLE IF NOT EXISTS `lekg5_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `imptotal` int(11) NOT NULL DEFAULT '0',
  `impmade` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `clickurl` varchar(200) NOT NULL DEFAULT '',
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `custombannercode` varchar(2048) NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `params` text NOT NULL,
  `own_prefix` tinyint(1) NOT NULL DEFAULT '0',
  `metakey_prefix` varchar(255) NOT NULL DEFAULT '',
  `purchase_type` tinyint(4) NOT NULL DEFAULT '-1',
  `track_clicks` tinyint(4) NOT NULL DEFAULT '-1',
  `track_impressions` tinyint(4) NOT NULL DEFAULT '-1',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reset` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `language` char(7) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_state` (`state`),
  KEY `idx_own_prefix` (`own_prefix`),
  KEY `idx_metakey_prefix` (`metakey_prefix`),
  KEY `idx_banner_catid` (`catid`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_banner_clients`
--

DROP TABLE IF EXISTS `lekg5_banner_clients`;
CREATE TABLE IF NOT EXISTS `lekg5_banner_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `contact` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `extrainfo` text NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `metakey` text NOT NULL,
  `own_prefix` tinyint(4) NOT NULL DEFAULT '0',
  `metakey_prefix` varchar(255) NOT NULL DEFAULT '',
  `purchase_type` tinyint(4) NOT NULL DEFAULT '-1',
  `track_clicks` tinyint(4) NOT NULL DEFAULT '-1',
  `track_impressions` tinyint(4) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`),
  KEY `idx_own_prefix` (`own_prefix`),
  KEY `idx_metakey_prefix` (`metakey_prefix`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_banner_tracks`
--

DROP TABLE IF EXISTS `lekg5_banner_tracks`;
CREATE TABLE IF NOT EXISTS `lekg5_banner_tracks` (
  `track_date` datetime NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL,
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`track_date`,`track_type`,`banner_id`),
  KEY `idx_track_date` (`track_date`),
  KEY `idx_track_type` (`track_type`),
  KEY `idx_banner_id` (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_categories`
--

DROP TABLE IF EXISTS `lekg5_categories`;
CREATE TABLE IF NOT EXISTS `lekg5_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `extension` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `metadesc` varchar(1024) NOT NULL COMMENT 'The meta description for the page.',
  `metakey` varchar(1024) NOT NULL COMMENT 'The meta keywords for the page.',
  `metadata` varchar(2048) NOT NULL COMMENT 'JSON encoded metadata properties.',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_idx` (`extension`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_path` (`path`),
  KEY `idx_left_right` (`lft`,`rgt`),
  KEY `idx_alias` (`alias`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `lekg5_categories`
--

INSERT INTO `lekg5_categories` (`id`, `asset_id`, `parent_id`, `lft`, `rgt`, `level`, `path`, `extension`, `title`, `alias`, `note`, `description`, `published`, `checked_out`, `checked_out_time`, `access`, `params`, `metadesc`, `metakey`, `metadata`, `created_user_id`, `created_time`, `modified_user_id`, `modified_time`, `hits`, `language`) VALUES
(1, 0, 0, 0, 13, 0, '', 'system', 'ROOT', 'root', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{}', '', '', '', 0, '2009-10-18 16:07:09', 0, '0000-00-00 00:00:00', 0, '*'),
(2, 27, 1, 1, 2, 1, 'uncategorised', 'com_content', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:26:37', 0, '0000-00-00 00:00:00', 0, '*'),
(3, 28, 1, 3, 4, 1, 'uncategorised', 'com_banners', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":"","foobar":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:27:35', 0, '0000-00-00 00:00:00', 0, '*'),
(4, 29, 1, 5, 6, 1, 'uncategorised', 'com_contact', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:27:57', 0, '0000-00-00 00:00:00', 0, '*'),
(5, 30, 1, 7, 8, 1, 'uncategorised', 'com_newsfeeds', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:28:15', 0, '0000-00-00 00:00:00', 0, '*'),
(6, 31, 1, 9, 10, 1, 'uncategorised', 'com_weblinks', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:28:33', 0, '0000-00-00 00:00:00', 0, '*'),
(7, 32, 1, 11, 12, 1, 'uncategorised', 'com_users', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:28:33', 0, '0000-00-00 00:00:00', 0, '*');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_contact_details`
--

DROP TABLE IF EXISTS `lekg5_contact_details`;
CREATE TABLE IF NOT EXISTS `lekg5_contact_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `con_position` varchar(255) DEFAULT NULL,
  `address` text,
  `suburb` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `misc` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `imagepos` varchar(20) DEFAULT NULL,
  `email_to` varchar(255) DEFAULT NULL,
  `default_con` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `catid` int(11) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `webpage` varchar(255) NOT NULL DEFAULT '',
  `sortname1` varchar(255) NOT NULL,
  `sortname2` varchar(255) NOT NULL,
  `sortname3` varchar(255) NOT NULL,
  `language` char(7) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if article is featured.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`published`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_featured_catid` (`featured`,`catid`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_content`
--

DROP TABLE IF EXISTS `lekg5_content`;
CREATE TABLE IF NOT EXISTS `lekg5_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `title_alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT 'Deprecated in Joomla! 3.0',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `sectionid` int(10) unsigned NOT NULL DEFAULT '0',
  `mask` int(10) unsigned NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` varchar(5120) NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if article is featured.',
  `language` char(7) NOT NULL COMMENT 'The language code for the article.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_featured_catid` (`featured`,`catid`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lekg5_content`
--

INSERT INTO `lekg5_content` (`id`, `asset_id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`, `featured`, `language`, `xreference`) VALUES
(1, 36, 'Donec ullamcorper auctor placerat. Nullam eu nunc se', 'donec-ullamcorper-auctor-placerat-nullam-eu-nunc-se', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae ligula eget turpis posuere vehicula. Duis facilisis egestas nisi, quis rutrum nibh feugiat non. Duis lobortis lobortis sem vel mattis. Fusce sed convallis lacus. Etiam hendrerit ante sit amet urna malesuada laoreet. Nulla tristique convallis metus, non gravida massa mattis non. Ut mollis tristique sem, eu fringilla dui ullamcorper nec. Donec non justo ut felis fringilla adipiscing in et ipsum. Sed luctus molestie consectetur. Phasellus neque eros, semper ac faucibus nec, pretium quis leo. Sed ullamcorper blandit scelerisque. Sed tincidunt tristique ornare. Sed urna ipsum, lacinia et cursus non, porttitor ut nisi. Suspendisse non ante sed nunc bibendum lacinia. Praesent varius, mi eu varius molestie, arcu risus consectetur nunc, at pretium est risus nec libero. Cras volutpat tellus aliquam erat lobortis ut venenatis massa egestas.</p>\r\n<p> </p>\r\n<p>Donec ullamcorper auctor placerat. Nullam eu nunc sem, nec condimentum eros. Pellentesque vitae iaculis lectus. Sed dictum tristique hendrerit. Etiam eu odio sapien, eget elementum purus. Integer commodo tristique lacus rutrum luctus. Curabitur posuere enim eget justo commodo ut condimentum sem commodo. Morbi sit amet pellentesque est. Vestibulum nunc risus, scelerisque nec vehicula a, pulvinar molestie nunc. Quisque accumsan, turpis eget elementum tincidunt, nisi tellus vehicula massa, ac dictum lacus nulla ac sem. Donec venenatis, sem sollicitudin elementum adipiscing, orci nisl tincidunt quam, at ornare justo nisi scelerisque turpis. Aliquam a neque at arcu malesuada tristique vitae vitae lacus. Suspendisse ac metus magna, vitae condimentum quam. Quisque sed facilisis elit. Sed at augue quis tellus semper ultricies in vitae metus. Proin et urna enim.</p>', '', 1, 0, 0, 2, '2013-01-05 09:53:04', 232, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2013-01-05 09:53:04', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":null,"urlatext":"","targeta":"","urlb":null,"urlbtext":"","targetb":"","urlc":null,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 1, 0, 0, '', '', 1, 119, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', '');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_content_frontpage`
--

DROP TABLE IF EXISTS `lekg5_content_frontpage`;
CREATE TABLE IF NOT EXISTS `lekg5_content_frontpage` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_content_rating`
--

DROP TABLE IF EXISTS `lekg5_content_rating`;
CREATE TABLE IF NOT EXISTS `lekg5_content_rating` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(10) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(10) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_core_log_searches`
--

DROP TABLE IF EXISTS `lekg5_core_log_searches`;
CREATE TABLE IF NOT EXISTS `lekg5_core_log_searches` (
  `search_term` varchar(128) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_dbcache`
--

DROP TABLE IF EXISTS `lekg5_dbcache`;
CREATE TABLE IF NOT EXISTS `lekg5_dbcache` (
  `id` varchar(32) NOT NULL DEFAULT '',
  `groupname` varchar(32) NOT NULL DEFAULT '',
  `expire` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `value` mediumblob NOT NULL,
  PRIMARY KEY (`id`,`groupname`),
  KEY `expire` (`expire`,`groupname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_extensions`
--

DROP TABLE IF EXISTS `lekg5_extensions`;
CREATE TABLE IF NOT EXISTS `lekg5_extensions` (
  `extension_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `element` varchar(100) NOT NULL,
  `folder` varchar(100) NOT NULL,
  `client_id` tinyint(3) NOT NULL,
  `enabled` tinyint(3) NOT NULL DEFAULT '1',
  `access` int(10) unsigned NOT NULL DEFAULT '1',
  `protected` tinyint(3) NOT NULL DEFAULT '0',
  `manifest_cache` text NOT NULL,
  `params` text NOT NULL,
  `custom_data` text NOT NULL,
  `system_data` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) DEFAULT '0',
  `state` int(11) DEFAULT '0',
  PRIMARY KEY (`extension_id`),
  KEY `element_clientid` (`element`,`client_id`),
  KEY `element_folder_clientid` (`element`,`folder`,`client_id`),
  KEY `extension` (`type`,`element`,`folder`,`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10054 ;

--
-- Dumping data for table `lekg5_extensions`
--

INSERT INTO `lekg5_extensions` (`extension_id`, `name`, `type`, `element`, `folder`, `client_id`, `enabled`, `access`, `protected`, `manifest_cache`, `params`, `custom_data`, `system_data`, `checked_out`, `checked_out_time`, `ordering`, `state`) VALUES
(1, 'com_mailto', 'component', 'com_mailto', '', 0, 1, 1, 1, '{"legacy":false,"name":"com_mailto","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_MAILTO_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(2, 'com_wrapper', 'component', 'com_wrapper', '', 0, 1, 1, 1, '{"legacy":false,"name":"com_wrapper","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_WRAPPER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(3, 'com_admin', 'component', 'com_admin', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_admin","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_ADMIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(4, 'com_banners', 'component', 'com_banners', '', 1, 1, 1, 0, '{"legacy":false,"name":"com_banners","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_BANNERS_XML_DESCRIPTION","group":""}', '{"purchase_type":"3","track_impressions":"0","track_clicks":"0","metakey_prefix":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(5, 'com_cache', 'component', 'com_cache', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_cache","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CACHE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(6, 'com_categories', 'component', 'com_categories', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_categories","type":"component","creationDate":"December 2007","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CATEGORIES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(7, 'com_checkin', 'component', 'com_checkin', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_checkin","type":"component","creationDate":"Unknown","author":"Joomla! Project","copyright":"(C) 2005 - 2008 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CHECKIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(8, 'com_contact', 'component', 'com_contact', '', 1, 1, 1, 0, '{"legacy":false,"name":"com_contact","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CONTACT_XML_DESCRIPTION","group":""}', '{"show_contact_category":"hide","show_contact_list":"0","presentation_style":"sliders","show_name":"1","show_position":"1","show_email":"0","show_street_address":"1","show_suburb":"1","show_state":"1","show_postcode":"1","show_country":"1","show_telephone":"1","show_mobile":"1","show_fax":"1","show_webpage":"1","show_misc":"1","show_image":"1","image":"","allow_vcard":"0","show_articles":"0","show_profile":"0","show_links":"0","linka_name":"","linkb_name":"","linkc_name":"","linkd_name":"","linke_name":"","contact_icons":"0","icon_address":"","icon_email":"","icon_telephone":"","icon_mobile":"","icon_fax":"","icon_misc":"","show_headings":"1","show_position_headings":"1","show_email_headings":"0","show_telephone_headings":"1","show_mobile_headings":"0","show_fax_headings":"0","allow_vcard_headings":"0","show_suburb_headings":"1","show_state_headings":"1","show_country_headings":"1","show_email_form":"1","show_email_copy":"1","banned_email":"","banned_subject":"","banned_text":"","validate_session":"1","custom_reply":"0","redirect":"","show_category_crumb":"0","metakey":"","metadesc":"","robots":"","author":"","rights":"","xreference":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(9, 'com_cpanel', 'component', 'com_cpanel', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_cpanel","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CPANEL_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10, 'com_installer', 'component', 'com_installer', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_installer","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_INSTALLER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(11, 'com_languages', 'component', 'com_languages', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_languages","type":"component","creationDate":"2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_LANGUAGES_XML_DESCRIPTION","group":""}', '{"administrator":"en-GB","site":"en-GB"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(12, 'com_login', 'component', 'com_login', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_login","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_LOGIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(13, 'com_media', 'component', 'com_media', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_media","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_MEDIA_XML_DESCRIPTION","group":""}', '{"upload_extensions":"bmp,csv,doc,gif,ico,jpg,jpeg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,GIF,ICO,JPG,JPEG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS","upload_maxsize":"10","file_path":"images","image_path":"images","restrict_uploads":"1","allowed_media_usergroup":"3","check_mime":"1","image_extensions":"bmp,gif,jpg,png","ignore_extensions":"","upload_mime":"image\\/jpeg,image\\/gif,image\\/png,image\\/bmp,application\\/x-shockwave-flash,application\\/msword,application\\/excel,application\\/pdf,application\\/powerpoint,text\\/plain,application\\/x-zip","upload_mime_illegal":"text\\/html","enable_flash":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(14, 'com_menus', 'component', 'com_menus', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_menus","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_MENUS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(15, 'com_messages', 'component', 'com_messages', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_messages","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_MESSAGES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(16, 'com_modules', 'component', 'com_modules', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_modules","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_MODULES_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(17, 'com_newsfeeds', 'component', 'com_newsfeeds', '', 1, 1, 1, 0, '{"legacy":false,"name":"com_newsfeeds","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_NEWSFEEDS_XML_DESCRIPTION","group":""}', '{"show_feed_image":"1","show_feed_description":"1","show_item_description":"1","feed_word_count":"0","show_headings":"1","show_name":"1","show_articles":"0","show_link":"1","show_description":"1","show_description_image":"1","display_num":"","show_pagination_limit":"1","show_pagination":"1","show_pagination_results":"1","show_cat_items":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(18, 'com_plugins', 'component', 'com_plugins', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_plugins","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_PLUGINS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(19, 'com_search', 'component', 'com_search', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_search","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_SEARCH_XML_DESCRIPTION","group":""}', '{"enabled":"0","show_date":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(20, 'com_templates', 'component', 'com_templates', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_templates","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_TEMPLATES_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(21, 'com_weblinks', 'component', 'com_weblinks', '', 1, 1, 1, 0, '{"legacy":false,"name":"com_weblinks","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_WEBLINKS_XML_DESCRIPTION","group":""}', '{"show_comp_description":"1","comp_description":"","show_link_hits":"1","show_link_description":"1","show_other_cats":"0","show_headings":"0","show_numbers":"0","show_report":"1","count_clicks":"1","target":"0","link_icons":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(22, 'com_content', 'component', 'com_content', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_content","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CONTENT_XML_DESCRIPTION","group":""}', '{"article_layout":"_:default","show_title":"1","link_titles":"1","show_intro":"1","show_category":"1","link_category":"1","show_parent_category":"0","link_parent_category":"0","show_author":"1","link_author":"0","show_create_date":"0","show_modify_date":"0","show_publish_date":"1","show_item_navigation":"1","show_vote":"0","show_readmore":"1","show_readmore_title":"1","readmore_limit":"100","show_icons":"1","show_print_icon":"1","show_email_icon":"1","show_hits":"1","show_noauth":"0","show_publishing_options":"1","show_article_options":"1","show_urls_images_frontend":"0","show_urls_images_backend":"1","targeta":0,"targetb":0,"targetc":0,"float_intro":"left","float_fulltext":"left","category_layout":"_:blog","show_category_title":"0","show_description":"0","show_description_image":"0","maxLevel":"1","show_empty_categories":"0","show_no_articles":"1","show_subcat_desc":"1","show_cat_num_articles":"0","show_base_description":"1","maxLevelcat":"-1","show_empty_categories_cat":"0","show_subcat_desc_cat":"1","show_cat_num_articles_cat":"1","num_leading_articles":"1","num_intro_articles":"4","num_columns":"2","num_links":"4","multi_column_order":"0","show_subcategory_content":"0","show_pagination_limit":"1","filter_field":"hide","show_headings":"1","list_show_date":"0","date_format":"","list_show_hits":"1","list_show_author":"1","orderby_pri":"order","orderby_sec":"rdate","order_date":"published","show_pagination":"2","show_pagination_results":"1","show_feed_link":"1","feed_summary":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(23, 'com_config', 'component', 'com_config', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_config","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CONFIG_XML_DESCRIPTION","group":""}', '{"filters":{"1":{"filter_type":"NH","filter_tags":"","filter_attributes":""},"6":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"7":{"filter_type":"NONE","filter_tags":"","filter_attributes":""},"2":{"filter_type":"NH","filter_tags":"","filter_attributes":""},"3":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"4":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"5":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"10":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"12":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"8":{"filter_type":"NONE","filter_tags":"","filter_attributes":""}}}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(24, 'com_redirect', 'component', 'com_redirect', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_redirect","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_REDIRECT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(25, 'com_users', 'component', 'com_users', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_users","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_USERS_XML_DESCRIPTION","group":""}', '{"allowUserRegistration":"1","new_usertype":"2","useractivation":"1","frontend_userparams":"1","mailSubjectPrefix":"","mailBodySuffix":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(27, 'com_finder', 'component', 'com_finder', '', 1, 1, 0, 0, '{"legacy":false,"name":"com_finder","type":"component","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_FINDER_XML_DESCRIPTION","group":""}', '{"show_description":"1","description_length":255,"allow_empty_query":"0","show_url":"1","show_advanced":"1","expand_advanced":"0","show_date_filters":"0","highlight_terms":"1","opensearch_name":"","opensearch_description":"","batch_size":"50","memory_table_limit":30000,"title_multiplier":"1.7","text_multiplier":"0.7","meta_multiplier":"1.2","path_multiplier":"2.0","misc_multiplier":"0.3","stemmer":"snowball"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(28, 'com_joomlaupdate', 'component', 'com_joomlaupdate', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_joomlaupdate","type":"component","creationDate":"February 2012","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_JOOMLAUPDATE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(100, 'PHPMailer', 'library', 'phpmailer', '', 0, 1, 1, 1, '{"legacy":false,"name":"PHPMailer","type":"library","creationDate":"2001","author":"PHPMailer","copyright":"(c) 2001-2003, Brent R. Matzelle, (c) 2004-2009, Andy Prevost. All Rights Reserved., (c) 2010-2011, Jim Jagielski. All Rights Reserved.","authorEmail":"jimjag@gmail.com","authorUrl":"https:\\/\\/code.google.com\\/a\\/apache-extras.org\\/p\\/phpmailer\\/","version":"5.2","description":"LIB_PHPMAILER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(101, 'SimplePie', 'library', 'simplepie', '', 0, 1, 1, 1, '{"legacy":false,"name":"SimplePie","type":"library","creationDate":"2004","author":"SimplePie","copyright":"Copyright (c) 2004-2009, Ryan Parman and Geoffrey Sneddon","authorEmail":"","authorUrl":"http:\\/\\/simplepie.org\\/","version":"1.2","description":"LIB_SIMPLEPIE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(102, 'phputf8', 'library', 'phputf8', '', 0, 1, 1, 1, '{"legacy":false,"name":"phputf8","type":"library","creationDate":"2006","author":"Harry Fuecks","copyright":"Copyright various authors","authorEmail":"hfuecks@gmail.com","authorUrl":"http:\\/\\/sourceforge.net\\/projects\\/phputf8","version":"0.5","description":"LIB_PHPUTF8_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(103, 'Joomla! Platform', 'library', 'joomla', '', 0, 1, 1, 1, '{"legacy":false,"name":"Joomla! Platform","type":"library","creationDate":"2008","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"http:\\/\\/www.joomla.org","version":"11.4","description":"LIB_JOOMLA_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(200, 'mod_articles_archive', 'module', 'mod_articles_archive', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_articles_archive","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters.\\n\\t\\tAll rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_ARTICLES_ARCHIVE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(201, 'mod_articles_latest', 'module', 'mod_articles_latest', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_articles_latest","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LATEST_NEWS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(202, 'mod_articles_popular', 'module', 'mod_articles_popular', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_articles_popular","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_POPULAR_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(203, 'mod_banners', 'module', 'mod_banners', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_banners","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_BANNERS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(204, 'mod_breadcrumbs', 'module', 'mod_breadcrumbs', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_breadcrumbs","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_BREADCRUMBS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(205, 'mod_custom', 'module', 'mod_custom', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_custom","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_CUSTOM_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(206, 'mod_feed', 'module', 'mod_feed', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_feed","type":"module","creationDate":"July 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_FEED_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(207, 'mod_footer', 'module', 'mod_footer', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_footer","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_FOOTER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(208, 'mod_login', 'module', 'mod_login', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_login","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LOGIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(209, 'mod_menu', 'module', 'mod_menu', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_menu","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_MENU_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(210, 'mod_articles_news', 'module', 'mod_articles_news', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_articles_news","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_ARTICLES_NEWS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(211, 'mod_random_image', 'module', 'mod_random_image', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_random_image","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_RANDOM_IMAGE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(212, 'mod_related_items', 'module', 'mod_related_items', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_related_items","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_RELATED_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(213, 'mod_search', 'module', 'mod_search', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_search","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_SEARCH_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(214, 'mod_stats', 'module', 'mod_stats', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_stats","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_STATS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(215, 'mod_syndicate', 'module', 'mod_syndicate', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_syndicate","type":"module","creationDate":"May 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_SYNDICATE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(216, 'mod_users_latest', 'module', 'mod_users_latest', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_users_latest","type":"module","creationDate":"December 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_USERS_LATEST_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(217, 'mod_weblinks', 'module', 'mod_weblinks', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_weblinks","type":"module","creationDate":"July 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_WEBLINKS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(218, 'mod_whosonline', 'module', 'mod_whosonline', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_whosonline","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_WHOSONLINE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(219, 'mod_wrapper', 'module', 'mod_wrapper', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_wrapper","type":"module","creationDate":"October 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_WRAPPER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(220, 'mod_articles_category', 'module', 'mod_articles_category', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_articles_category","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_ARTICLES_CATEGORY_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(221, 'mod_articles_categories', 'module', 'mod_articles_categories', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_articles_categories","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_ARTICLES_CATEGORIES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(222, 'mod_languages', 'module', 'mod_languages', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_languages","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LANGUAGES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(223, 'mod_finder', 'module', 'mod_finder', '', 0, 1, 0, 0, '{"legacy":false,"name":"mod_finder","type":"module","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_FINDER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(300, 'mod_custom', 'module', 'mod_custom', '', 1, 1, 1, 1, '{"legacy":false,"name":"mod_custom","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_CUSTOM_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(301, 'mod_feed', 'module', 'mod_feed', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_feed","type":"module","creationDate":"July 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_FEED_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(302, 'mod_latest', 'module', 'mod_latest', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_latest","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LATEST_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(303, 'mod_logged', 'module', 'mod_logged', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_logged","type":"module","creationDate":"January 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LOGGED_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(304, 'mod_login', 'module', 'mod_login', '', 1, 1, 1, 1, '{"legacy":false,"name":"mod_login","type":"module","creationDate":"March 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LOGIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(305, 'mod_menu', 'module', 'mod_menu', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_menu","type":"module","creationDate":"March 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_MENU_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(307, 'mod_popular', 'module', 'mod_popular', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_popular","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_POPULAR_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(308, 'mod_quickicon', 'module', 'mod_quickicon', '', 1, 1, 1, 1, '{"legacy":false,"name":"mod_quickicon","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_QUICKICON_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(309, 'mod_status', 'module', 'mod_status', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_status","type":"module","creationDate":"Feb 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_STATUS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(310, 'mod_submenu', 'module', 'mod_submenu', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_submenu","type":"module","creationDate":"Feb 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_SUBMENU_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(311, 'mod_title', 'module', 'mod_title', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_title","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_TITLE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(312, 'mod_toolbar', 'module', 'mod_toolbar', '', 1, 1, 1, 1, '{"legacy":false,"name":"mod_toolbar","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_TOOLBAR_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(313, 'mod_multilangstatus', 'module', 'mod_multilangstatus', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_multilangstatus","type":"module","creationDate":"September 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_MULTILANGSTATUS_XML_DESCRIPTION","group":""}', '{"cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(314, 'mod_version', 'module', 'mod_version', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_version","type":"module","creationDate":"January 2012","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_VERSION_XML_DESCRIPTION","group":""}', '{"format":"short","product":"1","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(400, 'plg_authentication_gmail', 'plugin', 'gmail', 'authentication', 0, 0, 1, 0, '{"legacy":false,"name":"plg_authentication_gmail","type":"plugin","creationDate":"February 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_GMAIL_XML_DESCRIPTION","group":""}', '{"applysuffix":"0","suffix":"","verifypeer":"1","user_blacklist":""}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(401, 'plg_authentication_joomla', 'plugin', 'joomla', 'authentication', 0, 1, 1, 1, '{"legacy":false,"name":"plg_authentication_joomla","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_AUTH_JOOMLA_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(402, 'plg_authentication_ldap', 'plugin', 'ldap', 'authentication', 0, 0, 1, 0, '{"legacy":false,"name":"plg_authentication_ldap","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_LDAP_XML_DESCRIPTION","group":""}', '{"host":"","port":"389","use_ldapV3":"0","negotiate_tls":"0","no_referrals":"0","auth_method":"bind","base_dn":"","search_string":"","users_dn":"","username":"admin","password":"bobby7","ldap_fullname":"fullName","ldap_email":"mail","ldap_uid":"uid"}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(404, 'plg_content_emailcloak', 'plugin', 'emailcloak', 'content', 0, 1, 1, 0, '{"legacy":false,"name":"plg_content_emailcloak","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CONTENT_EMAILCLOAK_XML_DESCRIPTION","group":""}', '{"mode":"1"}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(405, 'plg_content_geshi', 'plugin', 'geshi', 'content', 0, 0, 1, 0, '{"legacy":false,"name":"plg_content_geshi","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"","authorUrl":"qbnz.com\\/highlighter","version":"2.5.0","description":"PLG_CONTENT_GESHI_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(406, 'plg_content_loadmodule', 'plugin', 'loadmodule', 'content', 0, 1, 1, 0, '{"legacy":false,"name":"plg_content_loadmodule","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_LOADMODULE_XML_DESCRIPTION","group":""}', '{"style":"xhtml"}', '', '', 0, '2011-09-18 15:22:50', 0, 0),
(407, 'plg_content_pagebreak', 'plugin', 'pagebreak', 'content', 0, 1, 1, 1, '{"legacy":false,"name":"plg_content_pagebreak","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CONTENT_PAGEBREAK_XML_DESCRIPTION","group":""}', '{"title":"1","multipage_toc":"1","showall":"1"}', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(408, 'plg_content_pagenavigation', 'plugin', 'pagenavigation', 'content', 0, 1, 1, 1, '{"legacy":false,"name":"plg_content_pagenavigation","type":"plugin","creationDate":"January 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_PAGENAVIGATION_XML_DESCRIPTION","group":""}', '{"position":"1"}', '', '', 0, '0000-00-00 00:00:00', 5, 0),
(409, 'plg_content_vote', 'plugin', 'vote', 'content', 0, 1, 1, 1, '{"legacy":false,"name":"plg_content_vote","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_VOTE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 6, 0),
(410, 'plg_editors_codemirror', 'plugin', 'codemirror', 'editors', 0, 1, 1, 1, '{"legacy":false,"name":"plg_editors_codemirror","type":"plugin","creationDate":"28 March 2011","author":"Marijn Haverbeke","copyright":"","authorEmail":"N\\/A","authorUrl":"","version":"1.0","description":"PLG_CODEMIRROR_XML_DESCRIPTION","group":""}', '{"linenumbers":"0","tabmode":"indent"}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(411, 'plg_editors_none', 'plugin', 'none', 'editors', 0, 1, 1, 1, '{"legacy":false,"name":"plg_editors_none","type":"plugin","creationDate":"August 2004","author":"Unknown","copyright":"","authorEmail":"N\\/A","authorUrl":"","version":"2.5.0","description":"PLG_NONE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(412, 'plg_editors_tinymce', 'plugin', 'tinymce', 'editors', 0, 1, 1, 1, '{"legacy":false,"name":"plg_editors_tinymce","type":"plugin","creationDate":"2005-2012","author":"Moxiecode Systems AB","copyright":"Moxiecode Systems AB","authorEmail":"N\\/A","authorUrl":"tinymce.moxiecode.com\\/","version":"3.5.4.1","description":"PLG_TINY_XML_DESCRIPTION","group":""}', '{"mode":"1","skin":"0","entity_encoding":"raw","lang_mode":"0","lang_code":"en","text_direction":"ltr","content_css":"1","content_css_custom":"","relative_urls":"1","newlines":"0","invalid_elements":"script,applet,iframe","extended_elements":"","toolbar":"top","toolbar_align":"left","html_height":"550","html_width":"750","resizing":"true","resize_horizontal":"false","element_path":"1","fonts":"1","paste":"1","searchreplace":"1","insertdate":"1","format_date":"%Y-%m-%d","inserttime":"1","format_time":"%H:%M:%S","colors":"1","table":"1","smilies":"1","media":"1","hr":"1","directionality":"1","fullscreen":"1","style":"1","layer":"1","xhtmlxtras":"1","visualchars":"1","nonbreaking":"1","template":"1","blockquote":"1","wordcount":"1","advimage":"1","advlink":"1","advlist":"1","autosave":"1","contextmenu":"1","inlinepopups":"1","custom_plugin":"","custom_button":""}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(413, 'plg_editors-xtd_article', 'plugin', 'article', 'editors-xtd', 0, 1, 1, 1, '{"legacy":false,"name":"plg_editors-xtd_article","type":"plugin","creationDate":"October 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_ARTICLE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(414, 'plg_editors-xtd_image', 'plugin', 'image', 'editors-xtd', 0, 1, 1, 0, '{"legacy":false,"name":"plg_editors-xtd_image","type":"plugin","creationDate":"August 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_IMAGE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(415, 'plg_editors-xtd_pagebreak', 'plugin', 'pagebreak', 'editors-xtd', 0, 1, 1, 0, '{"legacy":false,"name":"plg_editors-xtd_pagebreak","type":"plugin","creationDate":"August 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_EDITORSXTD_PAGEBREAK_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(416, 'plg_editors-xtd_readmore', 'plugin', 'readmore', 'editors-xtd', 0, 1, 1, 0, '{"legacy":false,"name":"plg_editors-xtd_readmore","type":"plugin","creationDate":"March 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_READMORE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(417, 'plg_search_categories', 'plugin', 'categories', 'search', 0, 1, 1, 0, '{"legacy":false,"name":"plg_search_categories","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEARCH_CATEGORIES_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(418, 'plg_search_contacts', 'plugin', 'contacts', 'search', 0, 1, 1, 0, '{"legacy":false,"name":"plg_search_contacts","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEARCH_CONTACTS_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(419, 'plg_search_content', 'plugin', 'content', 'search', 0, 1, 1, 0, '{"legacy":false,"name":"plg_search_content","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEARCH_CONTENT_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(420, 'plg_search_newsfeeds', 'plugin', 'newsfeeds', 'search', 0, 1, 1, 0, '{"legacy":false,"name":"plg_search_newsfeeds","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEARCH_NEWSFEEDS_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(421, 'plg_search_weblinks', 'plugin', 'weblinks', 'search', 0, 1, 1, 0, '{"legacy":false,"name":"plg_search_weblinks","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEARCH_WEBLINKS_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(422, 'plg_system_languagefilter', 'plugin', 'languagefilter', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_languagefilter","type":"plugin","creationDate":"July 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SYSTEM_LANGUAGEFILTER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(423, 'plg_system_p3p', 'plugin', 'p3p', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_p3p","type":"plugin","creationDate":"September 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_P3P_XML_DESCRIPTION","group":""}', '{"headers":"NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(424, 'plg_system_cache', 'plugin', 'cache', 'system', 0, 0, 1, 1, '{"legacy":false,"name":"plg_system_cache","type":"plugin","creationDate":"February 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CACHE_XML_DESCRIPTION","group":""}', '{"browsercache":"0","cachetime":"15"}', '', '', 0, '0000-00-00 00:00:00', 9, 0),
(425, 'plg_system_debug', 'plugin', 'debug', 'system', 0, 1, 1, 0, '{"legacy":false,"name":"plg_system_debug","type":"plugin","creationDate":"December 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_DEBUG_XML_DESCRIPTION","group":""}', '{"profile":"1","queries":"1","memory":"1","language_files":"1","language_strings":"1","strip-first":"1","strip-prefix":"","strip-suffix":""}', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(426, 'plg_system_log', 'plugin', 'log', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_log","type":"plugin","creationDate":"April 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_LOG_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 5, 0),
(427, 'plg_system_redirect', 'plugin', 'redirect', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_redirect","type":"plugin","creationDate":"April 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_REDIRECT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 6, 0);
INSERT INTO `lekg5_extensions` (`extension_id`, `name`, `type`, `element`, `folder`, `client_id`, `enabled`, `access`, `protected`, `manifest_cache`, `params`, `custom_data`, `system_data`, `checked_out`, `checked_out_time`, `ordering`, `state`) VALUES
(428, 'plg_system_remember', 'plugin', 'remember', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_remember","type":"plugin","creationDate":"April 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_REMEMBER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 7, 0),
(429, 'plg_system_sef', 'plugin', 'sef', 'system', 0, 1, 1, 0, '{"legacy":false,"name":"plg_system_sef","type":"plugin","creationDate":"December 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEF_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 8, 0),
(430, 'plg_system_logout', 'plugin', 'logout', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_logout","type":"plugin","creationDate":"April 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SYSTEM_LOGOUT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(431, 'plg_user_contactcreator', 'plugin', 'contactcreator', 'user', 0, 0, 1, 1, '{"legacy":false,"name":"plg_user_contactcreator","type":"plugin","creationDate":"August 2009","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CONTACTCREATOR_XML_DESCRIPTION","group":""}', '{"autowebpage":"","category":"34","autopublish":"0"}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(432, 'plg_user_joomla', 'plugin', 'joomla', 'user', 0, 1, 1, 0, '{"legacy":false,"name":"plg_user_joomla","type":"plugin","creationDate":"December 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2009 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_USER_JOOMLA_XML_DESCRIPTION","group":""}', '{"autoregister":"1"}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(433, 'plg_user_profile', 'plugin', 'profile', 'user', 0, 0, 1, 1, '{"legacy":false,"name":"plg_user_profile","type":"plugin","creationDate":"January 2008","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_USER_PROFILE_XML_DESCRIPTION","group":""}', '{"register-require_address1":"1","register-require_address2":"1","register-require_city":"1","register-require_region":"1","register-require_country":"1","register-require_postal_code":"1","register-require_phone":"1","register-require_website":"1","register-require_favoritebook":"1","register-require_aboutme":"1","register-require_tos":"1","register-require_dob":"1","profile-require_address1":"1","profile-require_address2":"1","profile-require_city":"1","profile-require_region":"1","profile-require_country":"1","profile-require_postal_code":"1","profile-require_phone":"1","profile-require_website":"1","profile-require_favoritebook":"1","profile-require_aboutme":"1","profile-require_tos":"1","profile-require_dob":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(434, 'plg_extension_joomla', 'plugin', 'joomla', 'extension', 0, 1, 1, 1, '{"legacy":false,"name":"plg_extension_joomla","type":"plugin","creationDate":"May 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_EXTENSION_JOOMLA_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(435, 'plg_content_joomla', 'plugin', 'joomla', 'content', 0, 1, 1, 0, '{"legacy":false,"name":"plg_content_joomla","type":"plugin","creationDate":"November 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CONTENT_JOOMLA_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(436, 'plg_system_languagecode', 'plugin', 'languagecode', 'system', 0, 0, 1, 0, '{"legacy":false,"name":"plg_system_languagecode","type":"plugin","creationDate":"November 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SYSTEM_LANGUAGECODE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 10, 0),
(437, 'plg_quickicon_joomlaupdate', 'plugin', 'joomlaupdate', 'quickicon', 0, 1, 1, 1, '{"legacy":false,"name":"plg_quickicon_joomlaupdate","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_QUICKICON_JOOMLAUPDATE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(438, 'plg_quickicon_extensionupdate', 'plugin', 'extensionupdate', 'quickicon', 0, 1, 1, 1, '{"legacy":false,"name":"plg_quickicon_extensionupdate","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_QUICKICON_EXTENSIONUPDATE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(439, 'plg_captcha_recaptcha', 'plugin', 'recaptcha', 'captcha', 0, 1, 1, 0, '{"legacy":false,"name":"plg_captcha_recaptcha","type":"plugin","creationDate":"December 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CAPTCHA_RECAPTCHA_XML_DESCRIPTION","group":""}', '{"public_key":"","private_key":"","theme":"clean"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(440, 'plg_system_highlight', 'plugin', 'highlight', 'system', 0, 1, 1, 0, '{"legacy":false,"name":"plg_system_highlight","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SYSTEM_HIGHLIGHT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 7, 0),
(441, 'plg_content_finder', 'plugin', 'finder', 'content', 0, 0, 1, 0, '{"legacy":false,"name":"plg_content_finder","type":"plugin","creationDate":"December 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CONTENT_FINDER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(442, 'plg_finder_categories', 'plugin', 'categories', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_categories","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_FINDER_CATEGORIES_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(443, 'plg_finder_contacts', 'plugin', 'contacts', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_contacts","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_FINDER_CONTACTS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(444, 'plg_finder_content', 'plugin', 'content', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_content","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_FINDER_CONTENT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(445, 'plg_finder_newsfeeds', 'plugin', 'newsfeeds', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_newsfeeds","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_FINDER_NEWSFEEDS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(446, 'plg_finder_weblinks', 'plugin', 'weblinks', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_weblinks","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_FINDER_WEBLINKS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 5, 0),
(500, 'atomic', 'template', 'atomic', '', 0, 1, 1, 0, '{"legacy":false,"name":"atomic","type":"template","creationDate":"10\\/10\\/09","author":"Ron Severdia","copyright":"Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.","authorEmail":"contact@kontentdesign.com","authorUrl":"http:\\/\\/www.kontentdesign.com","version":"2.5.0","description":"TPL_ATOMIC_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(502, 'bluestork', 'template', 'bluestork', '', 1, 1, 1, 0, '{"legacy":false,"name":"bluestork","type":"template","creationDate":"07\\/02\\/09","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"TPL_BLUESTORK_XML_DESCRIPTION","group":""}', '{"useRoundedCorners":"1","showSiteName":"0","textBig":"0","highContrast":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(503, 'beez_20', 'template', 'beez_20', '', 0, 1, 1, 0, '{"legacy":false,"name":"beez_20","type":"template","creationDate":"25 November 2009","author":"Angie Radtke","copyright":"Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.","authorEmail":"a.radtke@derauftritt.de","authorUrl":"http:\\/\\/www.der-auftritt.de","version":"2.5.0","description":"TPL_BEEZ2_XML_DESCRIPTION","group":""}', '{"wrapperSmall":"53","wrapperLarge":"72","sitetitle":"","sitedescription":"","navposition":"center","templatecolor":"nature"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(504, 'hathor', 'template', 'hathor', '', 1, 1, 1, 0, '{"legacy":false,"name":"hathor","type":"template","creationDate":"May 2010","author":"Andrea Tarr","copyright":"Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.","authorEmail":"hathor@tarrconsulting.com","authorUrl":"http:\\/\\/www.tarrconsulting.com","version":"2.5.0","description":"TPL_HATHOR_XML_DESCRIPTION","group":""}', '{"showSiteName":"0","colourChoice":"0","boldText":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(505, 'beez5', 'template', 'beez5', '', 0, 1, 1, 0, '{"legacy":false,"name":"beez5","type":"template","creationDate":"21 May 2010","author":"Angie Radtke","copyright":"Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.","authorEmail":"a.radtke@derauftritt.de","authorUrl":"http:\\/\\/www.der-auftritt.de","version":"2.5.0","description":"TPL_BEEZ5_XML_DESCRIPTION","group":""}', '{"wrapperSmall":"53","wrapperLarge":"72","sitetitle":"","sitedescription":"","navposition":"center","html5":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(600, 'English (United Kingdom)', 'language', 'en-GB', '', 0, 1, 1, 1, '{"legacy":false,"name":"English (United Kingdom)","type":"language","creationDate":"2008-03-15","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.5","description":"en-GB site language","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(601, 'English (United Kingdom)', 'language', 'en-GB', '', 1, 1, 1, 1, '{"legacy":false,"name":"English (United Kingdom)","type":"language","creationDate":"2008-03-15","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.5","description":"en-GB administrator language","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(700, 'files_joomla', 'file', 'joomla', '', 0, 1, 1, 1, '{"legacy":false,"name":"files_joomla","type":"file","creationDate":"November 2012","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.8","description":"FILES_JOOMLA_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(800, 'PKG_JOOMLA', 'package', 'pkg_joomla', '', 0, 1, 1, 1, '{"legacy":false,"name":"PKG_JOOMLA","type":"package","creationDate":"2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"http:\\/\\/www.joomla.org","version":"2.5.0","description":"PKG_JOOMLA_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10000, 'com_falang', 'component', 'com_falang', '', 1, 1, 0, 0, '{"legacy":false,"name":"com_falang","type":"component","creationDate":"August 2011","author":"St\\u00e9phane Bouey","copyright":"2011, Faboba","authorEmail":"stephane.bouey@faboba.com","authorUrl":"www.faboba.com","version":"1.1.4","description":"COM_FALANG_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10001, 'mod_falang', 'module', 'mod_falang', '', 0, 1, 0, 0, '{"legacy":false,"name":"mod_falang","type":"module","creationDate":"August 2011","author":"St\\u00e9phane Bouey","copyright":"2011, Faboba","authorEmail":"stephane.bouey@faboba.com","authorUrl":"www.faboba.com","version":"1.0.3","description":"MOD_FALANG_XML_DESCRIPTION","group":""}', '{"dropdown":"0","image":"1","inline":"1","show_active":"1","full_name":"1","cache":"1","cache_time":"900","cachemode":"itemid"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10002, 'plg_system_falangdriver', 'plugin', 'falangdriver', 'system', 0, 1, 1, 0, '{"legacy":false,"name":"plg_system_falangdriver","type":"plugin","creationDate":"August 2011","author":"St\\u00e9phane Bouey","copyright":" Copyright (C) 2011 faboba.com. All rights reserved.","authorEmail":"stephane.bouey@faboba.com","authorUrl":"http:\\/\\/www.faboba.com","version":"1.0.6","description":"PLG_SYSTEM_FALANGDRIVER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10003, 'falang', 'package', 'pkg_falang', '', 0, 1, 1, 0, '{"legacy":false,"name":"FaLang Package","type":"package","creationDate":"December 2011","author":"St\\u00e9phane Bouey","copyright":"","authorEmail":"","authorUrl":"","version":"1.1.7","description":"FaLang! Installer Package.","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10004, 'VietnameseVitNam', 'language', 'vi-VN', '', 0, 1, 0, 0, '{"legacy":false,"name":"Vietnamese (Vi\\u1ec7t Nam)","type":"language","creationDate":"2012-06-20","author":"www.buaxua.vn","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"contact@buaxua.vn","authorUrl":"www.buaxua.vn","version":"2.5.6v1","description":"Ng\\u00f4n ng\\u1eef ti\\u1ebfng Vi\\u1ec7t cho Joomla 2.5 (Front-end)","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10005, 'VietnameseVitNam', 'language', 'vi-VN', '', 1, 1, 0, 0, '{"legacy":false,"name":"Vietnamese (Vi\\u1ec7t Nam)","type":"language","creationDate":"2012-06-20","author":"www.buaxua.vn","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"contact@buaxua.vn","authorUrl":"www.buaxua.vn","version":"2.5.6v1","description":"Ng\\u00f4n ng\\u1eef ti\\u1ebfng Vi\\u1ec7t cho Joomla 2.5 (Admin)","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10006, 'vi-VN', 'package', 'pkg_vi-VN', '', 0, 1, 1, 0, '{"legacy":false,"name":"Vietnamese Language Pack","type":"package","creationDate":"Unknown","author":"Unknown","copyright":"","authorEmail":"","authorUrl":"","version":"2.5.6v1","description":"Joomla! 2.5 Vietnamese Language Pack - Download latest package at http:\\/\\/www.buaxua.vn","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10023, 'acymailing', 'component', 'com_acymailing', '', 1, 1, 0, 0, '{"legacy":true,"name":"AcyMailing","type":"component","creationDate":"May 2012","author":"Acyba","copyright":"Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.","authorEmail":"dev@acyba.com","authorUrl":"http:\\/\\/www.acyba.com","version":"3.7.0","description":"Manage your Mailing lists, Newsletters, e-mail marketing campaigns","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10024, 'AcyMailing : trigger Joomla Content plugins', 'plugin', 'contentplugin', 'acymailing', 0, 0, 1, 0, '', '', '', '', 0, '0000-00-00 00:00:00', 15, 0),
(10025, 'AcyMailing Manage text', 'plugin', 'managetext', 'acymailing', 0, 1, 1, 0, '', '', '', '', 0, '0000-00-00 00:00:00', 10, 0),
(10026, 'AcyMailing Tag : Website links', 'plugin', 'online', 'acymailing', 0, 1, 1, 0, '', '', '', '', 0, '0000-00-00 00:00:00', 6, 0),
(10027, 'AcyMailing : share on social networks', 'plugin', 'share', 'acymailing', 0, 1, 1, 0, '', '', '', '', 0, '0000-00-00 00:00:00', 20, 0),
(10028, 'AcyMailing : Statistics Plugin', 'plugin', 'stats', 'acymailing', 0, 1, 1, 0, '', '', '', '', 0, '0000-00-00 00:00:00', 50, 0),
(10029, 'AcyMailing table of contents generator', 'plugin', 'tablecontents', 'acymailing', 0, 1, 1, 0, '', '', '', '', 0, '0000-00-00 00:00:00', 5, 0),
(10030, 'AcyMailing Tag : CB User information', 'plugin', 'tagcbuser', 'acymailing', 0, 0, 1, 0, '', '', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(10031, 'AcyMailing Tag : content insertion', 'plugin', 'tagcontent', 'acymailing', 0, 1, 1, 0, '', '', '', '', 0, '0000-00-00 00:00:00', 11, 0),
(10032, 'AcyMailing Tag : Subscriber information', 'plugin', 'tagsubscriber', 'acymailing', 0, 1, 1, 0, '', '', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(10033, 'AcyMailing Tag : Manage the Subscription', 'plugin', 'tagsubscription', 'acymailing', 0, 1, 1, 0, '', '', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(10034, 'AcyMailing Tag : Date / Time', 'plugin', 'tagtime', 'acymailing', 0, 1, 1, 0, '', '', '', '', 0, '0000-00-00 00:00:00', 5, 0),
(10035, 'AcyMailing Tag : Joomla User Information', 'plugin', 'taguser', 'acymailing', 0, 1, 1, 0, '', '', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(10036, 'AcyMailing Template Class Replacer', 'plugin', 'template', 'acymailing', 0, 1, 1, 0, '', '', '', '', 0, '0000-00-00 00:00:00', 25, 0),
(10037, 'AcyMailing : (auto)Subscribe during Joomla registration', 'plugin', 'regacymailing', 'system', 0, 1, 1, 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10038, 'AcyMailing Module', 'module', 'mod_acymailing', '', 0, 1, 1, 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10039, 'com_k2', 'component', 'com_k2', '', 1, 1, 0, 0, '{"legacy":false,"name":"COM_K2","type":"component","creationDate":"November 23rd, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.6.2","description":"Thank you for installing K2 by JoomlaWorks, the powerful content extension for Joomla!","group":""}', '{"enable_css":"1","jQueryHandling":"1.8remote","backendJQueryHandling":"remote","userName":"1","userImage":"1","userDescription":"1","userURL":"1","userEmail":"0","userFeedLink":"1","userFeedIcon":"1","userItemCount":"10","userItemTitle":"1","userItemTitleLinked":"1","userItemDateCreated":"1","userItemImage":"1","userItemIntroText":"1","userItemCategory":"1","userItemTags":"1","userItemCommentsAnchor":"1","userItemReadMore":"1","userItemK2Plugins":"1","tagItemCount":"10","tagItemTitle":"1","tagItemTitleLinked":"1","tagItemDateCreated":"1","tagItemImage":"1","tagItemIntroText":"1","tagItemCategory":"1","tagItemReadMore":"1","tagItemExtraFields":"0","tagOrdering":"","tagFeedLink":"1","tagFeedIcon":"1","genericItemCount":"10","genericItemTitle":"1","genericItemTitleLinked":"1","genericItemDateCreated":"1","genericItemImage":"1","genericItemIntroText":"1","genericItemCategory":"1","genericItemReadMore":"1","genericItemExtraFields":"0","genericFeedLink":"1","genericFeedIcon":"1","feedLimit":"10","feedItemImage":"1","feedImgSize":"S","feedItemIntroText":"1","feedTextWordLimit":"","feedItemFullText":"1","feedItemTags":"0","feedItemVideo":"0","feedItemGallery":"0","feedItemAttachments":"0","feedBogusEmail":"","introTextCleanup":"0","introTextCleanupExcludeTags":"","introTextCleanupTagAttr":"","fullTextCleanup":"0","fullTextCleanupExcludeTags":"","fullTextCleanupTagAttr":"","xssFiltering":"0","linkPopupWidth":"900","linkPopupHeight":"600","imagesQuality":"100","itemImageXS":"100","itemImageS":"200","itemImageM":"400","itemImageL":"600","itemImageXL":"900","itemImageGeneric":"300","catImageWidth":"100","catImageDefault":"1","userImageWidth":"100","userImageDefault":"1","commenterImgWidth":"48","onlineImageEditor":"splashup","imageTimestamp":"0","imageMemoryLimit":"","socialButtonCode":"","twitterUsername":"","facebookImage":"Small","comments":"1","commentsOrdering":"DESC","commentsLimit":"10","commentsFormPosition":"below","commentsPublishing":"1","commentsReporting":"2","commentsReportRecipient":"","inlineCommentsModeration":"0","gravatar":"1","recaptcha":"0","commentsFormNotes":"1","commentsFormNotesText":"","frontendEditing":"1","showImageTab":"1","showImageGalleryTab":"1","showVideoTab":"1","showExtraFieldsTab":"1","showAttachmentsTab":"1","showK2Plugins":"1","sideBarDisplayFrontend":"0","mergeEditors":"1","sideBarDisplay":"1","attachmentsFolder":"","hideImportButton":"0","taggingSystem":"1","lockTags":"0","showTagFilter":"0","googleSearch":"0","googleSearchContainer":"k2Container","K2UserProfile":"1","K2UserGroup":"","redirect":"","adminSearch":"simple","cookieDomain":"","recaptcha_public_key":"","recaptcha_private_key":"","recaptcha_theme":"clean","recaptchaOnRegistration":"0","showItemsCounterAdmin":"1","showChildCatItems":"1","disableCompactOrdering":"0","metaDescLimit":"150","SEFReplacements":"","sh404SefLabelCat":"","sh404SefLabelUser":"blog","sh404SefLabelItem":"2","sh404SefTitleAlias":"alias","sh404SefModK2ContentFeedAlias":"feed","cbIntegration":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10040, 'plg_finder_k2', 'plugin', 'k2', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_k2","type":"plugin","creationDate":"November 23rd, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.6.2","description":"PLG_FINDER_K2_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10041, 'Search - K2', 'plugin', 'k2', 'search', 0, 1, 1, 0, '{"legacy":false,"name":"Search - K2","type":"plugin","creationDate":"November 23rd, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.6.2","description":"K2_THIS_PLUGIN_EXTENDS_THE_DEFAULT_JOOMLA_SEARCH_FUNCTIONALITY_TO_K2_CONTENT","group":""}', '{"search_limit":"50","search_tags":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10042, 'System - K2', 'plugin', 'k2', 'system', 0, 1, 1, 0, '{"legacy":false,"name":"System - K2","type":"plugin","creationDate":"November 23rd, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.6.2","description":"K2_THE_K2_SYSTEM_PLUGIN_IS_USED_TO_ASSIST_THE_PROPER_FUNCTIONALITY_OF_THE_K2_COMPONENT_SITE_WIDE_MAKE_SURE_ITS_ALWAYS_PUBLISHED_WHEN_THE_K2_COMPONENT_IS_INSTALLED","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10043, 'User - K2', 'plugin', 'k2', 'user', 0, 1, 1, 0, '{"legacy":false,"name":"User - K2","type":"plugin","creationDate":"November 23rd, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.6.2","description":"K2_A_USER_SYNCHRONIZATION_PLUGIN_FOR_K2","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10044, 'Josetta - K2 Categories', 'plugin', 'k2category', 'josetta_ext', 0, 1, 1, 0, '{"legacy":false,"name":"Josetta - K2 Categories","type":"plugin","creationDate":"November 23rd, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.6.2","description":"","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10045, 'Josetta - K2 Items', 'plugin', 'k2item', 'josetta_ext', 0, 1, 1, 0, '{"legacy":false,"name":"Josetta - K2 Items","type":"plugin","creationDate":"June 7th, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.6.2","description":"","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10046, 'K2 Comments', 'module', 'mod_k2_comments', '', 0, 1, 0, 0, '{"legacy":false,"name":"K2 Comments","type":"module","creationDate":"November 23rd, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.6.2","description":"MOD_K2_COMMENTS_DESCRIPTION","group":""}', '{"moduleclass_sfx":"","module_usage":"","":"K2_TOP_COMMENTERS","catfilter":"0","category_id":"","comments_limit":"5","comments_word_limit":"10","commenterName":"1","commentAvatar":"1","commentAvatarWidthSelect":"custom","commentAvatarWidth":"50","commentDate":"1","commentDateFormat":"absolute","commentLink":"1","itemTitle":"1","itemCategory":"1","feed":"1","commenters_limit":"5","commenterNameOrUsername":"1","commenterAvatar":"1","commenterAvatarWidthSelect":"custom","commenterAvatarWidth":"50","commenterLink":"1","commenterCommentsCounter":"1","commenterLatestComment":"1","cache":"1","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10047, 'K2 Content', 'module', 'mod_k2_content', '', 0, 1, 0, 0, '{"legacy":false,"name":"K2 Content","type":"module","creationDate":"November 23rd, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.6.2","description":"K2_MOD_K2_CONTENT_DESCRIPTION","group":""}', '{"moduleclass_sfx":"","getTemplate":"Default","source":"filter","":"K2_OTHER_OPTIONS","catfilter":"0","category_id":"","getChildren":"0","itemCount":"5","itemsOrdering":"","FeaturedItems":"1","popularityRange":"","videosOnly":"0","item":"","items":"","itemTitle":"1","itemAuthor":"1","itemAuthorAvatar":"1","itemAuthorAvatarWidthSelect":"custom","itemAuthorAvatarWidth":"50","userDescription":"1","itemIntroText":"1","itemIntroTextWordLimit":"","itemImage":"1","itemImgSize":"Small","itemVideo":"1","itemVideoCaption":"1","itemVideoCredits":"1","itemAttachments":"1","itemTags":"1","itemCategory":"1","itemDateCreated":"1","itemHits":"1","itemReadMore":"1","itemExtraFields":"0","itemCommentsCounter":"1","feed":"1","itemPreText":"","itemCustomLink":"0","itemCustomLinkTitle":"","itemCustomLinkURL":"http:\\/\\/","itemCustomLinkMenuItem":"","K2Plugins":"1","JPlugins":"1","cache":"1","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10048, 'K2 Tools', 'module', 'mod_k2_tools', '', 0, 1, 0, 0, '{"legacy":false,"name":"K2 Tools","type":"module","creationDate":"November 23rd, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.6.2","description":"K2_TOOLS","group":""}', '{"moduleclass_sfx":"","module_usage":"0","":"K2_CUSTOM_CODE_SETTINGS","archiveItemsCounter":"1","archiveCategory":"","authors_module_category":"","authorItemsCounter":"1","authorAvatar":"1","authorAvatarWidthSelect":"custom","authorAvatarWidth":"50","authorLatestItem":"1","calendarCategory":"","home":"","seperator":"","root_id":"","end_level":"","categoriesListOrdering":"","categoriesListItemsCounter":"1","root_id2":"","catfilter":"0","category_id":"","getChildren":"0","liveSearch":"","width":"20","text":"","button":"","imagebutton":"","button_text":"","min_size":"75","max_size":"300","cloud_limit":"30","cloud_category":"0","cloud_category_recursive":"0","customCode":"","parsePhp":"0","K2Plugins":"0","JPlugins":"0","cache":"1","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10049, 'K2 Users', 'module', 'mod_k2_users', '', 0, 1, 0, 0, '{"legacy":false,"name":"K2 Users","type":"module","creationDate":"November 23rd, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.6.2","description":"K2_MOD_K2_USERS_DESCRTIPTION","group":""}', '{"moduleclass_sfx":"","getTemplate":"Default","source":"0","":"K2_DISPLAY_OPTIONS","filter":"1","K2UserGroup":"","ordering":"1","limit":"4","userIDs":"","userName":"1","userAvatar":"1","userAvatarWidthSelect":"custom","userAvatarWidth":"50","userDescription":"1","userDescriptionWordLimit":"","userURL":"1","userEmail":"0","userFeed":"1","userItemCount":"1","cache":"1","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10050, 'K2 User', 'module', 'mod_k2_user', '', 0, 1, 0, 0, '{"legacy":false,"name":"K2 User","type":"module","creationDate":"November 23rd, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.6.2","description":"K2_MOD_K2_USER_DESCRIPTION","group":""}', '{"moduleclass_sfx":"","pretext":"","":"K2_LOGIN_LOGOUT_REDIRECTION","name":"1","userAvatar":"1","userAvatarWidthSelect":"custom","userAvatarWidth":"50","menu":"","login":"","logout":"","usesecure":"0","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10051, 'K2 Quick Icons (admin)', 'module', 'mod_k2_quickicons', '', 1, 1, 2, 0, '{"legacy":false,"name":"K2 Quick Icons (admin)","type":"module","creationDate":"November 23rd, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.6.2","description":"K2_QUICKICONS_FOR_USE_IN_THE_JOOMLA_CONTROL_PANEL_DASHBOARD_PAGE","group":""}', '{"modCSSStyling":"1","modLogo":"1","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10052, 'K2 Stats (admin)', 'module', 'mod_k2_stats', '', 1, 1, 2, 0, '{"legacy":false,"name":"K2 Stats (admin)","type":"module","creationDate":"November 23rd, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.6.2","description":"K2_STATS_FOR_USE_IN_THE_K2_DASHBOARD_PAGE","group":""}', '{"latestItems":"1","popularItems":"1","mostCommentedItems":"1","latestComments":"1","statistics":"1","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10053, 'projectfork', 'component', 'com_projectfork', '', 1, 1, 0, 0, '{"legacy":true,"name":"Projectfork","type":"component","creationDate":"2012\\/06","author":"Tobias Kuhn","copyright":"Copyright 2006-2012 Tobias Kuhn","authorEmail":"support@projectfork.net","authorUrl":"http:\\/\\/www.projectfork.net","version":"3.0.10 Stable","description":"","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_falang_content`
--

DROP TABLE IF EXISTS `lekg5_falang_content`;
CREATE TABLE IF NOT EXISTS `lekg5_falang_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `reference_id` int(11) NOT NULL DEFAULT '0',
  `reference_table` varchar(100) NOT NULL DEFAULT '',
  `reference_field` varchar(100) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `original_value` varchar(255) DEFAULT NULL,
  `original_text` mediumtext NOT NULL,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `combo` (`reference_id`,`reference_field`,`reference_table`),
  KEY `falangContent` (`language_id`,`reference_id`,`reference_table`),
  KEY `falangContentLanguage` (`reference_id`,`reference_field`,`reference_table`,`language_id`),
  KEY `reference_id` (`reference_id`),
  KEY `language_id` (`language_id`),
  KEY `reference_table` (`reference_table`),
  KEY `reference_field` (`reference_field`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `lekg5_falang_content`
--

INSERT INTO `lekg5_falang_content` (`id`, `language_id`, `reference_id`, `reference_table`, `reference_field`, `value`, `original_value`, `original_text`, `modified`, `modified_by`, `published`) VALUES
(26, 2, 2, 'categories', 'title', 'Danh mục khác', '671fdee4789681821d9457f232c83f2e', 'Uncategorised', '2013-01-05 10:27:02', 232, 1),
(27, 2, 2, 'categories', 'alias', 'uncategorised', '9cff408b8e93fea0d4348929f675e33b', 'uncategorised', '2013-01-05 10:27:02', 232, 1),
(8, 2, 101, 'menu', 'title', 'Trang chủ', '8cf04a9734132302f96da8e113e80ce5', 'Home', '2013-01-05 10:04:16', 232, 1),
(9, 2, 101, 'menu', 'link', 'index.php?option=com_content&view=article&id=1', 'dcef15d57ac1cffe1d547c1e97d4ab5a', 'index.php?option=com_content&view=article&id=1', '2013-01-05 10:04:16', 232, 1),
(10, 2, 101, 'menu', 'params', '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":"1","page_title":"","show_page_heading":"1","page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":"0"}', 'b199e56cbffaaeafde68508d64103b62', '', '2013-01-05 10:04:16', 232, 1),
(11, 2, 101, 'menu', 'alias', 'trang-chu', '106a6c241b8797f52e1e77317b96a201', 'home', '2013-01-05 10:04:16', 232, 1),
(12, 2, 1, 'modules', 'title', 'Trình đơn chính', 'e404dd0bece5f7c53d80edaa70513eec', 'Main Menu', '2013-01-05 10:06:02', 232, 1),
(13, 2, 1, 'modules', 'params', '{"menutype":"mainmenu","startLevel":"1","endLevel":"0","showAllChildren":"0","tag_id":"","class_sfx":"","window_open":"","layout":"_:default","moduleclass_sfx":"_menu","cache":"1","cache_time":"900","cachemode":"itemid"}', '222b0f974df9260e875707baf2cc6443', '', '2013-01-05 10:06:02', 232, 1),
(14, 2, 1, 'content', 'title', 'Bài viết hay của Xavi', 'edfff563c4967f543689c1c453f5452e', 'Donec ullamcorper auctor placerat. Nullam eu nunc se', '2013-01-05 10:07:21', 232, 1),
(15, 2, 1, 'content', 'alias', 'bai-viet-tot', '26c6ebe7cb971470fa80396ee0926e44', 'donec-ullamcorper-auctor-placerat-nullam-eu-nunc-se', '2013-01-05 10:07:21', 232, 1),
(16, 2, 1, 'content', 'introtext', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae ligula eget turpis posuere vehicula. Duis facilisis egestas nisi, quis rutrum nibh feugiat non. Duis lobortis lobortis sem vel mattis. Fusce sed convallis lacus. Etiam hendrerit ante sit amet urna malesuada laoreet. Nulla tristique convallis metus, non gravida massa mattis non. Ut mollis tristique sem, eu fringilla dui ullamcorper nec. Donec non justo ut felis fringilla adipiscing in et ipsum. Sed luctus molestie consectetur. Phasellus neque eros, semper ac faucibus nec, pretium quis leo. Sed ullamcorper blandit scelerisque. Sed tincidunt tristique ornare. Sed urna ipsum, lacinia et cursus non, porttitor ut nisi. Suspendisse non ante sed nunc bibendum lacinia. Praesent varius, mi eu varius molestie, arcu risus consectetur nunc, at pretium est risus nec libero. Cras volutpat tellus aliquam erat lobortis ut venenatis massa egestas.</p>\r\n<p> </p>\r\n<p>Donec ullamcorper auctor placerat. Nullam eu nunc sem, nec condimentum eros. Pellentesque vitae iaculis lectus. Sed dictum tristique hendrerit. Etiam eu odio sapien, eget elementum purus. Integer commodo tristique lacus rutrum luctus. Curabitur posuere enim eget justo commodo ut condimentum sem commodo. Morbi sit amet pellentesque est. Vestibulum nunc risus, scelerisque nec vehicula a, pulvinar molestie nunc. Quisque accumsan, turpis eget elementum tincidunt, nisi tellus vehicula massa, ac dictum lacus nulla ac sem. Donec venenatis, sem sollicitudin elementum adipiscing, orci nisl tincidunt quam, at ornare justo nisi scelerisque turpis. Aliquam a neque at arcu malesuada tristique vitae vitae lacus. Suspendisse ac metus magna, vitae condimentum quam. Quisque sed facilisis elit. Sed at augue quis tellus semper ultricies in vitae metus. Proin et urna enim.</p>', '5d2f95557b402a3d1f0570104e67e6e3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae ligula eget turpis posuere vehicula. Duis facilisis egestas nisi, quis rutrum nibh feugiat non. Duis lobortis lobortis sem vel mattis. Fusce sed convallis lacus. Etiam hendrerit ante sit amet urna malesuada laoreet. Nulla tristique convallis metus, non gravida massa mattis non. Ut mollis tristique sem, eu fringilla dui ullamcorper nec. Donec non justo ut felis fringilla adipiscing in et ipsum. Sed luctus molestie consectetur. Phasellus neque eros, semper ac faucibus nec, pretium quis leo. Sed ullamcorper blandit scelerisque. Sed tincidunt tristique ornare. Sed urna ipsum, lacinia et cursus non, porttitor ut nisi. Suspendisse non ante sed nunc bibendum lacinia. Praesent varius, mi eu varius molestie, arcu risus consectetur nunc, at pretium est risus nec libero. Cras volutpat tellus aliquam erat lobortis ut venenatis massa egestas.</p>\r\n<p> </p>\r\n<p>Donec ullamcorper auctor placerat. Nullam eu nunc sem, nec condimentum eros. Pellentesque vitae iaculis lectus. Sed dictum tristique hendrerit. Etiam eu odio sapien, eget elementum purus. Integer commodo tristique lacus rutrum luctus. Curabitur posuere enim eget justo commodo ut condimentum sem commodo. Morbi sit amet pellentesque est. Vestibulum nunc risus, scelerisque nec vehicula a, pulvinar molestie nunc. Quisque accumsan, turpis eget elementum tincidunt, nisi tellus vehicula massa, ac dictum lacus nulla ac sem. Donec venenatis, sem sollicitudin elementum adipiscing, orci nisl tincidunt quam, at ornare justo nisi scelerisque turpis. Aliquam a neque at arcu malesuada tristique vitae vitae lacus. Suspendisse ac metus magna, vitae condimentum quam. Quisque sed facilisis elit. Sed at augue quis tellus semper ultricies in vitae metus. Proin et urna enim.</p>', '2013-01-05 10:07:21', 232, 1),
(17, 2, 1, 'content', 'fulltext', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '2013-01-05 10:07:21', 232, 1),
(18, 2, 103, 'menu', 'title', 'Đăng nhập', '99dea78007133396a7b8ed70578ac6ae', 'Login', '2013-01-05 10:08:14', 232, 1),
(19, 2, 103, 'menu', 'alias', 'dang-nhap', 'd56b699830e77ba53855679cb1d252da', 'login', '2013-01-05 10:08:14', 232, 1),
(20, 2, 103, 'menu', 'link', 'index.php?option=com_users&view=login', 'e14a8df99bf1f06c60a0d4d302cde664', 'index.php?option=com_users&view=login', '2013-01-05 10:08:14', 232, 1),
(21, 2, 103, 'menu', 'params', '{"login_redirect_url":"","logindescription_show":"1","login_description":"","login_image":"","logout_redirect_url":"","logoutdescription_show":"1","logout_description":"","logout_image":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":"1","page_title":"","show_page_heading":"0","page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":"0"}', 'fcc9a9f5f01f6720fd44559968356c49', '', '2013-01-05 10:08:14', 232, 1),
(22, 2, 16, 'modules', 'title', 'Đăng nhập', '5a51395c0a2c6a14de05f99326b91565', 'Login Form', '2013-01-05 10:09:34', 232, 1),
(23, 2, 16, 'modules', 'params', '{"pretext":"","posttext":"","login":"","logout":"","greeting":"1","name":"0","usesecure":"0","layout":"_:default","moduleclass_sfx":"","cache":"0"}', 'fdecb0c8d7bed54ed7303d2a44381686', '', '2013-01-05 10:09:34', 232, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_falang_tableinfo`
--

DROP TABLE IF EXISTS `lekg5_falang_tableinfo`;
CREATE TABLE IF NOT EXISTS `lekg5_falang_tableinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `joomlatablename` varchar(100) NOT NULL DEFAULT '',
  `tablepkID` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=403 ;

--
-- Dumping data for table `lekg5_falang_tableinfo`
--

INSERT INTO `lekg5_falang_tableinfo` (`id`, `joomlatablename`, `tablepkID`) VALUES
(397, 'categories', 'id'),
(398, 'contact_details', 'id'),
(399, 'content', 'id'),
(400, 'menu', 'id'),
(401, 'modules', 'id'),
(402, 'weblinks', 'id');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_filters`
--

DROP TABLE IF EXISTS `lekg5_finder_filters`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_filters` (
  `filter_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL,
  `created_by_alias` varchar(255) NOT NULL,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `map_count` int(10) unsigned NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  `params` mediumtext,
  PRIMARY KEY (`filter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links`
--

DROP TABLE IF EXISTS `lekg5_finder_links`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `indexdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `md5sum` varchar(32) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `state` int(5) DEFAULT '1',
  `access` int(5) DEFAULT '0',
  `language` varchar(8) NOT NULL,
  `publish_start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `list_price` double unsigned NOT NULL DEFAULT '0',
  `sale_price` double unsigned NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL,
  `object` mediumblob NOT NULL,
  PRIMARY KEY (`link_id`),
  KEY `idx_type` (`type_id`),
  KEY `idx_title` (`title`),
  KEY `idx_md5` (`md5sum`),
  KEY `idx_url` (`url`(75)),
  KEY `idx_published_list` (`published`,`state`,`access`,`publish_start_date`,`publish_end_date`,`list_price`),
  KEY `idx_published_sale` (`published`,`state`,`access`,`publish_start_date`,`publish_end_date`,`sale_price`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links_terms0`
--

DROP TABLE IF EXISTS `lekg5_finder_links_terms0`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links_terms0` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links_terms1`
--

DROP TABLE IF EXISTS `lekg5_finder_links_terms1`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links_terms1` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links_terms2`
--

DROP TABLE IF EXISTS `lekg5_finder_links_terms2`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links_terms2` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links_terms3`
--

DROP TABLE IF EXISTS `lekg5_finder_links_terms3`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links_terms3` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links_terms4`
--

DROP TABLE IF EXISTS `lekg5_finder_links_terms4`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links_terms4` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links_terms5`
--

DROP TABLE IF EXISTS `lekg5_finder_links_terms5`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links_terms5` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links_terms6`
--

DROP TABLE IF EXISTS `lekg5_finder_links_terms6`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links_terms6` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links_terms7`
--

DROP TABLE IF EXISTS `lekg5_finder_links_terms7`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links_terms7` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links_terms8`
--

DROP TABLE IF EXISTS `lekg5_finder_links_terms8`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links_terms8` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links_terms9`
--

DROP TABLE IF EXISTS `lekg5_finder_links_terms9`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links_terms9` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links_termsa`
--

DROP TABLE IF EXISTS `lekg5_finder_links_termsa`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links_termsa` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links_termsb`
--

DROP TABLE IF EXISTS `lekg5_finder_links_termsb`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links_termsb` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links_termsc`
--

DROP TABLE IF EXISTS `lekg5_finder_links_termsc`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links_termsc` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links_termsd`
--

DROP TABLE IF EXISTS `lekg5_finder_links_termsd`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links_termsd` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links_termse`
--

DROP TABLE IF EXISTS `lekg5_finder_links_termse`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links_termse` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_links_termsf`
--

DROP TABLE IF EXISTS `lekg5_finder_links_termsf`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_links_termsf` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_taxonomy`
--

DROP TABLE IF EXISTS `lekg5_finder_taxonomy`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_taxonomy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `state` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `access` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `state` (`state`),
  KEY `ordering` (`ordering`),
  KEY `access` (`access`),
  KEY `idx_parent_published` (`parent_id`,`state`,`access`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lekg5_finder_taxonomy`
--

INSERT INTO `lekg5_finder_taxonomy` (`id`, `parent_id`, `title`, `state`, `access`, `ordering`) VALUES
(1, 0, 'ROOT', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_taxonomy_map`
--

DROP TABLE IF EXISTS `lekg5_finder_taxonomy_map`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_taxonomy_map` (
  `link_id` int(10) unsigned NOT NULL,
  `node_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`node_id`),
  KEY `link_id` (`link_id`),
  KEY `node_id` (`node_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_terms`
--

DROP TABLE IF EXISTS `lekg5_finder_terms`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_terms` (
  `term_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weight` float unsigned NOT NULL DEFAULT '0',
  `soundex` varchar(75) NOT NULL,
  `links` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `idx_term` (`term`),
  KEY `idx_term_phrase` (`term`,`phrase`),
  KEY `idx_stem_phrase` (`stem`,`phrase`),
  KEY `idx_soundex_phrase` (`soundex`,`phrase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_terms_common`
--

DROP TABLE IF EXISTS `lekg5_finder_terms_common`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_terms_common` (
  `term` varchar(75) NOT NULL,
  `language` varchar(3) NOT NULL,
  KEY `idx_word_lang` (`term`,`language`),
  KEY `idx_lang` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lekg5_finder_terms_common`
--

INSERT INTO `lekg5_finder_terms_common` (`term`, `language`) VALUES
('a', 'en'),
('about', 'en'),
('after', 'en'),
('ago', 'en'),
('all', 'en'),
('am', 'en'),
('an', 'en'),
('and', 'en'),
('ani', 'en'),
('any', 'en'),
('are', 'en'),
('aren''t', 'en'),
('as', 'en'),
('at', 'en'),
('be', 'en'),
('but', 'en'),
('by', 'en'),
('for', 'en'),
('from', 'en'),
('get', 'en'),
('go', 'en'),
('how', 'en'),
('if', 'en'),
('in', 'en'),
('into', 'en'),
('is', 'en'),
('isn''t', 'en'),
('it', 'en'),
('its', 'en'),
('me', 'en'),
('more', 'en'),
('most', 'en'),
('must', 'en'),
('my', 'en'),
('new', 'en'),
('no', 'en'),
('none', 'en'),
('not', 'en'),
('noth', 'en'),
('nothing', 'en'),
('of', 'en'),
('off', 'en'),
('often', 'en'),
('old', 'en'),
('on', 'en'),
('onc', 'en'),
('once', 'en'),
('onli', 'en'),
('only', 'en'),
('or', 'en'),
('other', 'en'),
('our', 'en'),
('ours', 'en'),
('out', 'en'),
('over', 'en'),
('page', 'en'),
('she', 'en'),
('should', 'en'),
('small', 'en'),
('so', 'en'),
('some', 'en'),
('than', 'en'),
('thank', 'en'),
('that', 'en'),
('the', 'en'),
('their', 'en'),
('theirs', 'en'),
('them', 'en'),
('then', 'en'),
('there', 'en'),
('these', 'en'),
('they', 'en'),
('this', 'en'),
('those', 'en'),
('thus', 'en'),
('time', 'en'),
('times', 'en'),
('to', 'en'),
('too', 'en'),
('true', 'en'),
('under', 'en'),
('until', 'en'),
('up', 'en'),
('upon', 'en'),
('use', 'en'),
('user', 'en'),
('users', 'en'),
('veri', 'en'),
('version', 'en'),
('very', 'en'),
('via', 'en'),
('want', 'en'),
('was', 'en'),
('way', 'en'),
('were', 'en'),
('what', 'en'),
('when', 'en'),
('where', 'en'),
('whi', 'en'),
('which', 'en'),
('who', 'en'),
('whom', 'en'),
('whose', 'en'),
('why', 'en'),
('wide', 'en'),
('will', 'en'),
('with', 'en'),
('within', 'en'),
('without', 'en'),
('would', 'en'),
('yes', 'en'),
('yet', 'en'),
('you', 'en'),
('your', 'en'),
('yours', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_tokens`
--

DROP TABLE IF EXISTS `lekg5_finder_tokens`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_tokens` (
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weight` float unsigned NOT NULL DEFAULT '1',
  `context` tinyint(1) unsigned NOT NULL DEFAULT '2',
  KEY `idx_word` (`term`),
  KEY `idx_context` (`context`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_tokens_aggregate`
--

DROP TABLE IF EXISTS `lekg5_finder_tokens_aggregate`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_tokens_aggregate` (
  `term_id` int(10) unsigned NOT NULL,
  `map_suffix` char(1) NOT NULL,
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `term_weight` float unsigned NOT NULL,
  `context` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `context_weight` float unsigned NOT NULL,
  `total_weight` float unsigned NOT NULL,
  KEY `token` (`term`),
  KEY `keyword_id` (`term_id`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_finder_types`
--

DROP TABLE IF EXISTS `lekg5_finder_types`;
CREATE TABLE IF NOT EXISTS `lekg5_finder_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `mime` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lekg5_finder_types`
--

INSERT INTO `lekg5_finder_types` (`id`, `title`, `mime`) VALUES
(1, 'K2 Item', ''),
(2, 'Category', ''),
(3, 'Contact', ''),
(4, 'Article', ''),
(5, 'News Feed', ''),
(6, 'Web Link', '');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_jf_content`
--

DROP TABLE IF EXISTS `lekg5_jf_content`;
CREATE TABLE IF NOT EXISTS `lekg5_jf_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `reference_id` int(11) NOT NULL DEFAULT '0',
  `reference_table` varchar(100) NOT NULL DEFAULT '',
  `reference_field` varchar(100) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `original_value` varchar(255) DEFAULT NULL,
  `original_text` mediumtext NOT NULL,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `combo` (`reference_id`,`reference_field`,`reference_table`),
  KEY `jfContent` (`language_id`,`reference_id`,`reference_table`),
  KEY `jfContentLanguage` (`reference_id`,`reference_field`,`reference_table`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `lekg5_jf_languages`
--
DROP VIEW IF EXISTS `lekg5_jf_languages`;
CREATE TABLE IF NOT EXISTS `lekg5_jf_languages` (
`lang_id` int(11) unsigned
,`lang_code` char(7)
,`title` varchar(50)
,`title_native` varchar(50)
,`sef` varchar(50)
,`description` varchar(512)
,`published` int(11)
,`image` varchar(50)
,`image_ext` varchar(100)
,`fallback_code` varchar(20)
,`params` text
,`ordering` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `lekg5_jf_languages_ext`
--

DROP TABLE IF EXISTS `lekg5_jf_languages_ext`;
CREATE TABLE IF NOT EXISTS `lekg5_jf_languages_ext` (
  `lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_ext` varchar(100) DEFAULT NULL,
  `fallback_code` varchar(20) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lang_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_jf_tableinfo`
--

DROP TABLE IF EXISTS `lekg5_jf_tableinfo`;
CREATE TABLE IF NOT EXISTS `lekg5_jf_tableinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `joomlatablename` varchar(100) NOT NULL DEFAULT '',
  `tablepkID` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_k2_attachments`
--

DROP TABLE IF EXISTS `lekg5_k2_attachments`;
CREATE TABLE IF NOT EXISTS `lekg5_k2_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemID` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `titleAttribute` text NOT NULL,
  `hits` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `itemID` (`itemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_k2_categories`
--

DROP TABLE IF EXISTS `lekg5_k2_categories`;
CREATE TABLE IF NOT EXISTS `lekg5_k2_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `parent` int(11) DEFAULT '0',
  `extraFieldsGroup` int(11) NOT NULL,
  `published` smallint(6) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `params` text NOT NULL,
  `trash` smallint(6) NOT NULL DEFAULT '0',
  `plugins` text NOT NULL,
  `language` char(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`published`,`access`,`trash`),
  KEY `parent` (`parent`),
  KEY `ordering` (`ordering`),
  KEY `published` (`published`),
  KEY `access` (`access`),
  KEY `trash` (`trash`),
  KEY `language` (`language`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lekg5_k2_categories`
--

INSERT INTO `lekg5_k2_categories` (`id`, `name`, `alias`, `description`, `parent`, `extraFieldsGroup`, `published`, `access`, `ordering`, `image`, `params`, `trash`, `plugins`, `language`) VALUES
(1, 'Donec ullamcorper auctor placerat', 'donec-ullamcorper-auctor-placerat', '<p>Donec ullamcorper auctor placerat. Nullam eu nunc sem, nec condimentum eros. Pellentesque vitae iaculis lectus. Sed dictum tristique hendrerit. Etiam eu odio sapien, eget elementum purus. Integer commodo tristique lacus rutrum luctus. Curabitur posuere enim eget justo commodo ut condimentum sem commodo. Morbi sit amet pellentesque est. Vestibulum nunc risus, scelerisque nec vehicula a, pulvinar molestie nunc. Quisque accumsan, turpis eget elementum tincidunt, nisi tellus vehicula massa, ac dictum lacus nulla ac sem. Donec venenatis, sem sollicitudin elementum adipiscing, orci nisl tincidunt quam, at ornare justo nisi scelerisque turpis. Aliquam a neque at arcu malesuada tristique vitae vitae lacus. Suspendisse ac metus magna, vitae condimentum quam. Quisque sed facilisis elit. Sed at augue quis tellus semper ultricies in vitae metus. Proin et urna enim.</p>', 0, 0, 1, 1, 1, '', '{"inheritFrom":"0","theme":"","num_leading_items":"2","num_leading_columns":"1","leadingImgSize":"Large","num_primary_items":"4","num_primary_columns":"2","primaryImgSize":"Medium","num_secondary_items":"4","num_secondary_columns":"1","secondaryImgSize":"Small","num_links":"4","num_links_columns":"1","linksImgSize":"XSmall","catCatalogMode":"0","catFeaturedItems":"1","catOrdering":"","catPagination":"2","catPaginationResults":"1","catTitle":"1","catTitleItemCounter":"1","catDescription":"1","catImage":"1","catFeedLink":"1","catFeedIcon":"1","subCategories":"1","subCatColumns":"2","subCatOrdering":"","subCatTitle":"1","subCatTitleItemCounter":"1","subCatDescription":"1","subCatImage":"1","itemImageXS":"","itemImageS":"","itemImageM":"","itemImageL":"","itemImageXL":"","catItemTitle":"1","catItemTitleLinked":"1","catItemFeaturedNotice":"0","catItemAuthor":"1","catItemDateCreated":"1","catItemRating":"0","catItemImage":"1","catItemIntroText":"1","catItemIntroTextWordLimit":"","catItemExtraFields":"0","catItemHits":"0","catItemCategory":"1","catItemTags":"1","catItemAttachments":"0","catItemAttachmentsCounter":"0","catItemVideo":"0","catItemVideoWidth":"","catItemVideoHeight":"","catItemAudioWidth":"","catItemAudioHeight":"","catItemVideoAutoPlay":"0","catItemImageGallery":"0","catItemDateModified":"0","catItemReadMore":"1","catItemCommentsAnchor":"1","catItemK2Plugins":"1","itemDateCreated":"1","itemTitle":"1","itemFeaturedNotice":"1","itemAuthor":"1","itemFontResizer":"1","itemPrintButton":"1","itemEmailButton":"1","itemSocialButton":"1","itemVideoAnchor":"1","itemImageGalleryAnchor":"1","itemCommentsAnchor":"1","itemRating":"1","itemImage":"1","itemImgSize":"Large","itemImageMainCaption":"1","itemImageMainCredits":"1","itemIntroText":"1","itemFullText":"1","itemExtraFields":"1","itemDateModified":"1","itemHits":"1","itemCategory":"1","itemTags":"1","itemAttachments":"1","itemAttachmentsCounter":"1","itemVideo":"1","itemVideoWidth":"","itemVideoHeight":"","itemAudioWidth":"","itemAudioHeight":"","itemVideoAutoPlay":"0","itemVideoCaption":"1","itemVideoCredits":"1","itemImageGallery":"1","itemNavigation":"1","itemComments":"1","itemTwitterButton":"1","itemFacebookButton":"1","itemGooglePlusOneButton":"1","itemAuthorBlock":"1","itemAuthorImage":"1","itemAuthorDescription":"1","itemAuthorURL":"1","itemAuthorEmail":"0","itemAuthorLatest":"1","itemAuthorLatestLimit":"5","itemRelated":"1","itemRelatedLimit":"5","itemRelatedTitle":"1","itemRelatedCategory":"0","itemRelatedImageSize":"0","itemRelatedIntrotext":"0","itemRelatedFulltext":"0","itemRelatedAuthor":"0","itemRelatedMedia":"0","itemRelatedImageGallery":"0","itemK2Plugins":"1","catMetaDesc":"","catMetaKey":"","catMetaRobots":"","catMetaAuthor":""}', 0, '', '*');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_k2_comments`
--

DROP TABLE IF EXISTS `lekg5_k2_comments`;
CREATE TABLE IF NOT EXISTS `lekg5_k2_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `commentDate` datetime NOT NULL,
  `commentText` text NOT NULL,
  `commentEmail` varchar(255) NOT NULL,
  `commentURL` varchar(255) NOT NULL,
  `published` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `itemID` (`itemID`),
  KEY `userID` (`userID`),
  KEY `published` (`published`),
  KEY `latestComments` (`published`,`commentDate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_k2_extra_fields`
--

DROP TABLE IF EXISTS `lekg5_k2_extra_fields`;
CREATE TABLE IF NOT EXISTS `lekg5_k2_extra_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `group` int(11) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group` (`group`),
  KEY `published` (`published`),
  KEY `ordering` (`ordering`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_k2_extra_fields_groups`
--

DROP TABLE IF EXISTS `lekg5_k2_extra_fields_groups`;
CREATE TABLE IF NOT EXISTS `lekg5_k2_extra_fields_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_k2_items`
--

DROP TABLE IF EXISTS `lekg5_k2_items`;
CREATE TABLE IF NOT EXISTS `lekg5_k2_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `catid` int(11) NOT NULL,
  `published` smallint(6) NOT NULL DEFAULT '0',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `video` text,
  `gallery` varchar(255) DEFAULT NULL,
  `extra_fields` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `extra_fields_search` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL,
  `checked_out` int(10) unsigned NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `publish_up` datetime NOT NULL,
  `publish_down` datetime NOT NULL,
  `trash` smallint(6) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `featured` smallint(6) NOT NULL DEFAULT '0',
  `featured_ordering` int(11) NOT NULL DEFAULT '0',
  `image_caption` text NOT NULL,
  `image_credits` varchar(255) NOT NULL,
  `video_caption` text NOT NULL,
  `video_credits` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL,
  `params` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `metakey` text NOT NULL,
  `plugins` text NOT NULL,
  `language` char(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item` (`published`,`publish_up`,`publish_down`,`trash`,`access`),
  KEY `catid` (`catid`),
  KEY `created_by` (`created_by`),
  KEY `ordering` (`ordering`),
  KEY `featured` (`featured`),
  KEY `featured_ordering` (`featured_ordering`),
  KEY `hits` (`hits`),
  KEY `created` (`created`),
  KEY `language` (`language`),
  FULLTEXT KEY `search` (`title`,`introtext`,`fulltext`,`extra_fields_search`,`image_caption`,`image_credits`,`video_caption`,`video_credits`,`metadesc`,`metakey`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_k2_rating`
--

DROP TABLE IF EXISTS `lekg5_k2_rating`;
CREATE TABLE IF NOT EXISTS `lekg5_k2_rating` (
  `itemID` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(11) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(11) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_k2_tags`
--

DROP TABLE IF EXISTS `lekg5_k2_tags`;
CREATE TABLE IF NOT EXISTS `lekg5_k2_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `published` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `published` (`published`),
  FULLTEXT KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_k2_tags_xref`
--

DROP TABLE IF EXISTS `lekg5_k2_tags_xref`;
CREATE TABLE IF NOT EXISTS `lekg5_k2_tags_xref` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tagID` (`tagID`),
  KEY `itemID` (`itemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_k2_users`
--

DROP TABLE IF EXISTS `lekg5_k2_users`;
CREATE TABLE IF NOT EXISTS `lekg5_k2_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `gender` enum('m','f') NOT NULL DEFAULT 'm',
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `group` int(11) NOT NULL DEFAULT '0',
  `plugins` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `hostname` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userID` (`userID`),
  KEY `group` (`group`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lekg5_k2_users`
--

INSERT INTO `lekg5_k2_users` (`id`, `userID`, `userName`, `gender`, `description`, `image`, `url`, `group`, `plugins`, `ip`, `hostname`, `notes`) VALUES
(1, 0, NULL, 'm', '', NULL, NULL, 1, '', '127.0.0.1', 'activate.adobe.com', ''),
(2, 0, NULL, 'm', '', NULL, NULL, 1, '', '127.0.0.1', 'activate.adobe.com', ''),
(3, 0, NULL, 'm', '', NULL, NULL, 1, '', '127.0.0.1', 'activate.adobe.com', ''),
(4, 0, NULL, 'm', '', NULL, NULL, 1, '', '127.0.0.1', 'activate.adobe.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_k2_user_groups`
--

DROP TABLE IF EXISTS `lekg5_k2_user_groups`;
CREATE TABLE IF NOT EXISTS `lekg5_k2_user_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_languages`
--

DROP TABLE IF EXISTS `lekg5_languages`;
CREATE TABLE IF NOT EXISTS `lekg5_languages` (
  `lang_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lang_code` char(7) NOT NULL,
  `title` varchar(50) NOT NULL,
  `title_native` varchar(50) NOT NULL,
  `sef` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(512) NOT NULL,
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `sitename` varchar(1024) NOT NULL DEFAULT '',
  `published` int(11) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lang_id`),
  UNIQUE KEY `idx_sef` (`sef`),
  UNIQUE KEY `idx_image` (`image`),
  UNIQUE KEY `idx_langcode` (`lang_code`),
  KEY `idx_access` (`access`),
  KEY `idx_ordering` (`ordering`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lekg5_languages`
--

INSERT INTO `lekg5_languages` (`lang_id`, `lang_code`, `title`, `title_native`, `sef`, `image`, `description`, `metakey`, `metadesc`, `sitename`, `published`, `access`, `ordering`) VALUES
(1, 'en-GB', 'English (UK)', 'English (UK)', 'en', 'en', '', '', '', '', 1, 0, 1),
(2, 'vi-VN', 'vietnam', 'vietnam', 'vi', 'vi', '', '', '', '', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_menu`
--

DROP TABLE IF EXISTS `lekg5_menu`;
CREATE TABLE IF NOT EXISTS `lekg5_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menutype` varchar(24) NOT NULL COMMENT 'The type of menu this item belongs to. FK to #__menu_types.menutype',
  `title` varchar(255) NOT NULL COMMENT 'The display title of the menu item.',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'The SEF alias of the menu item.',
  `note` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(1024) NOT NULL COMMENT 'The computed path of the menu item based on the alias field.',
  `link` varchar(1024) NOT NULL COMMENT 'The actually link the menu item refers to.',
  `type` varchar(16) NOT NULL COMMENT 'The type of link: Component, URL, Alias, Separator',
  `published` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The published state of the menu link.',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'The parent menu item in the menu tree.',
  `level` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The relative level in the tree.',
  `component_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to #__extensions.id',
  `ordering` int(11) NOT NULL DEFAULT '0' COMMENT 'The relative ordering of the menu item in the tree.',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to #__users.id',
  `checked_out_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'The time the menu item was checked out.',
  `browserNav` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The click behaviour of the link.',
  `access` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The access level required to view the menu item.',
  `img` varchar(255) NOT NULL COMMENT 'The image of the menu item.',
  `template_style_id` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL COMMENT 'JSON encoded data for the menu item.',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `home` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Indicates if this menu item is the home or default page.',
  `language` char(7) NOT NULL DEFAULT '',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_client_id_parent_id_alias_language` (`client_id`,`parent_id`,`alias`,`language`),
  KEY `idx_componentid` (`component_id`,`menutype`,`published`,`access`),
  KEY `idx_menutype` (`menutype`),
  KEY `idx_left_right` (`lft`,`rgt`),
  KEY `idx_alias` (`alias`),
  KEY `idx_path` (`path`(255)),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=135 ;

--
-- Dumping data for table `lekg5_menu`
--

INSERT INTO `lekg5_menu` (`id`, `menutype`, `title`, `alias`, `note`, `path`, `link`, `type`, `published`, `parent_id`, `level`, `component_id`, `ordering`, `checked_out`, `checked_out_time`, `browserNav`, `access`, `img`, `template_style_id`, `params`, `lft`, `rgt`, `home`, `language`, `client_id`) VALUES
(1, '', 'Menu_Item_Root', 'root', '', '', '', '', 1, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 93, 0, '*', 0),
(2, 'menu', 'com_banners', 'Banners', '', 'Banners', 'index.php?option=com_banners', 'component', 0, 1, 1, 4, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners', 0, '', 1, 10, 0, '*', 1),
(3, 'menu', 'com_banners', 'Banners', '', 'Banners/Banners', 'index.php?option=com_banners', 'component', 0, 2, 2, 4, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners', 0, '', 2, 3, 0, '*', 1),
(4, 'menu', 'com_banners_categories', 'Categories', '', 'Banners/Categories', 'index.php?option=com_categories&extension=com_banners', 'component', 0, 2, 2, 6, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-cat', 0, '', 4, 5, 0, '*', 1),
(5, 'menu', 'com_banners_clients', 'Clients', '', 'Banners/Clients', 'index.php?option=com_banners&view=clients', 'component', 0, 2, 2, 4, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-clients', 0, '', 6, 7, 0, '*', 1),
(6, 'menu', 'com_banners_tracks', 'Tracks', '', 'Banners/Tracks', 'index.php?option=com_banners&view=tracks', 'component', 0, 2, 2, 4, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-tracks', 0, '', 8, 9, 0, '*', 1),
(7, 'menu', 'com_contact', 'Contacts', '', 'Contacts', 'index.php?option=com_contact', 'component', 0, 1, 1, 8, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact', 0, '', 11, 16, 0, '*', 1),
(8, 'menu', 'com_contact', 'Contacts', '', 'Contacts/Contacts', 'index.php?option=com_contact', 'component', 0, 7, 2, 8, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact', 0, '', 12, 13, 0, '*', 1),
(9, 'menu', 'com_contact_categories', 'Categories', '', 'Contacts/Categories', 'index.php?option=com_categories&extension=com_contact', 'component', 0, 7, 2, 6, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact-cat', 0, '', 14, 15, 0, '*', 1),
(10, 'menu', 'com_messages', 'Messaging', '', 'Messaging', 'index.php?option=com_messages', 'component', 0, 1, 1, 15, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages', 0, '', 17, 22, 0, '*', 1),
(11, 'menu', 'com_messages_add', 'New Private Message', '', 'Messaging/New Private Message', 'index.php?option=com_messages&task=message.add', 'component', 0, 10, 2, 15, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages-add', 0, '', 18, 19, 0, '*', 1),
(12, 'menu', 'com_messages_read', 'Read Private Message', '', 'Messaging/Read Private Message', 'index.php?option=com_messages', 'component', 0, 10, 2, 15, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages-read', 0, '', 20, 21, 0, '*', 1),
(13, 'menu', 'com_newsfeeds', 'News Feeds', '', 'News Feeds', 'index.php?option=com_newsfeeds', 'component', 0, 1, 1, 17, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds', 0, '', 23, 28, 0, '*', 1),
(14, 'menu', 'com_newsfeeds_feeds', 'Feeds', '', 'News Feeds/Feeds', 'index.php?option=com_newsfeeds', 'component', 0, 13, 2, 17, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds', 0, '', 24, 25, 0, '*', 1),
(15, 'menu', 'com_newsfeeds_categories', 'Categories', '', 'News Feeds/Categories', 'index.php?option=com_categories&extension=com_newsfeeds', 'component', 0, 13, 2, 6, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds-cat', 0, '', 26, 27, 0, '*', 1),
(16, 'menu', 'com_redirect', 'Redirect', '', 'Redirect', 'index.php?option=com_redirect', 'component', 0, 1, 1, 24, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:redirect', 0, '', 41, 42, 0, '*', 1),
(17, 'menu', 'com_search', 'Basic Search', '', 'Basic Search', 'index.php?option=com_search', 'component', 0, 1, 1, 19, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:search', 0, '', 33, 34, 0, '*', 1),
(18, 'menu', 'com_weblinks', 'Weblinks', '', 'Weblinks', 'index.php?option=com_weblinks', 'component', 0, 1, 1, 21, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:weblinks', 0, '', 35, 40, 0, '*', 1),
(19, 'menu', 'com_weblinks_links', 'Links', '', 'Weblinks/Links', 'index.php?option=com_weblinks', 'component', 0, 18, 2, 21, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:weblinks', 0, '', 36, 37, 0, '*', 1),
(20, 'menu', 'com_weblinks_categories', 'Categories', '', 'Weblinks/Categories', 'index.php?option=com_categories&extension=com_weblinks', 'component', 0, 18, 2, 6, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:weblinks-cat', 0, '', 38, 39, 0, '*', 1),
(21, 'menu', 'com_finder', 'Smart Search', '', 'Smart Search', 'index.php?option=com_finder', 'component', 0, 1, 1, 27, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:finder', 0, '', 31, 32, 0, '*', 1),
(22, 'menu', 'com_joomlaupdate', 'Joomla! Update', '', 'Joomla! Update', 'index.php?option=com_joomlaupdate', 'component', 0, 1, 1, 28, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:joomlaupdate', 0, '', 41, 42, 0, '*', 1),
(101, 'mainmenu', 'Home', 'home', '', 'home', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":1,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 29, 30, 1, '*', 0),
(102, 'main', 'COM_FALANG_MENU', 'com-falang-menu', '', 'com-falang-menu', 'index.php?option=com_falang', 'component', 0, 1, 1, 10000, 0, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_falang/assets/images/icon-16-falang.png', 0, '', 43, 44, 0, '', 1),
(103, 'mainmenu', 'Login', 'login', '', 'login', 'index.php?option=com_users&view=login', 'component', 1, 1, 1, 25, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"login_redirect_url":"","logindescription_show":"1","login_description":"","login_image":"","logout_redirect_url":"","logoutdescription_show":"1","logout_description":"","logout_image":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 45, 46, 0, '*', 0),
(113, 'main', 'AcyMailing', 'acymailing', '', 'acymailing', 'index.php?option=com_acymailing', 'component', 0, 1, 1, 10023, 0, 0, '0000-00-00 00:00:00', 0, 1, '../media/com_acymailing/images/icons/icon-16-acymailing.png', 0, '', 49, 66, 0, '', 1),
(114, 'main', 'Users', 'users', '', 'acymailing/users', 'index.php?option=com_acymailing&ctrl=subscriber', 'component', 0, 113, 2, 10023, 0, 0, '0000-00-00 00:00:00', 0, 1, '../media/com_acymailing/images/icons/icon-16-users.png', 0, '', 50, 51, 0, '', 1),
(115, 'main', 'Lists', 'lists', '', 'acymailing/lists', 'index.php?option=com_acymailing&ctrl=list', 'component', 0, 113, 2, 10023, 0, 0, '0000-00-00 00:00:00', 0, 1, '../media/com_acymailing/images/icons/icon-16-acylist.png', 0, '', 52, 53, 0, '', 1),
(116, 'main', 'Newsletters', 'newsletters', '', 'acymailing/newsletters', 'index.php?option=com_acymailing&ctrl=newsletter', 'component', 0, 113, 2, 10023, 0, 0, '0000-00-00 00:00:00', 0, 1, '../media/com_acymailing/images/icons/icon-16-newsletter.png', 0, '', 54, 55, 0, '', 1),
(117, 'main', 'Templates', 'templates', '', 'acymailing/templates', 'index.php?option=com_acymailing&ctrl=template', 'component', 0, 113, 2, 10023, 0, 0, '0000-00-00 00:00:00', 0, 1, '../media/com_acymailing/images/icons/icon-16-acytemplate.png', 0, '', 56, 57, 0, '', 1),
(118, 'main', 'Queue', 'queue', '', 'acymailing/queue', 'index.php?option=com_acymailing&ctrl=queue', 'component', 0, 113, 2, 10023, 0, 0, '0000-00-00 00:00:00', 0, 1, '../media/com_acymailing/images/icons/icon-16-process.png', 0, '', 58, 59, 0, '', 1),
(119, 'main', 'Statistics', 'statistics', '', 'acymailing/statistics', 'index.php?option=com_acymailing&ctrl=stats', 'component', 0, 113, 2, 10023, 0, 0, '0000-00-00 00:00:00', 0, 1, '../media/com_acymailing/images/icons/icon-16-stats.png', 0, '', 60, 61, 0, '', 1),
(120, 'main', 'Configuration', 'configuration', '', 'acymailing/configuration', 'index.php?option=com_acymailing&ctrl=cpanel', 'component', 0, 113, 2, 10023, 0, 0, '0000-00-00 00:00:00', 0, 1, '../media/com_acymailing/images/icons/icon-16-acyconfig.png', 0, '', 62, 63, 0, '', 1),
(121, 'main', 'Update_About', 'update-about', '', 'acymailing/update-about', 'index.php?option=com_acymailing&ctrl=update', 'component', 0, 113, 2, 10023, 0, 0, '0000-00-00 00:00:00', 0, 1, '../media/com_acymailing/images/icons/icon-16-update.png', 0, '', 64, 65, 0, '', 1),
(122, 'main', 'COM_K2', 'com-k2', '', 'com-k2', 'index.php?option=com_k2', 'component', 0, 1, 1, 10039, 0, 0, '0000-00-00 00:00:00', 0, 1, '../media/k2/assets/images/system/k2_16x16.png', 0, '', 67, 88, 0, '', 1),
(123, 'main', 'K2_ITEMS', 'k2-items', '', 'com-k2/k2-items', 'index.php?option=com_k2&view=items', 'component', 0, 122, 2, 10039, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 68, 69, 0, '', 1),
(124, 'main', 'K2_CATEGORIES', 'k2-categories', '', 'com-k2/k2-categories', 'index.php?option=com_k2&view=categories', 'component', 0, 122, 2, 10039, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 70, 71, 0, '', 1),
(125, 'main', 'K2_TAGS', 'k2-tags', '', 'com-k2/k2-tags', 'index.php?option=com_k2&view=tags', 'component', 0, 122, 2, 10039, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 72, 73, 0, '', 1),
(126, 'main', 'K2_COMMENTS', 'k2-comments', '', 'com-k2/k2-comments', 'index.php?option=com_k2&view=comments', 'component', 0, 122, 2, 10039, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 74, 75, 0, '', 1),
(127, 'main', 'K2_USERS', 'k2-users', '', 'com-k2/k2-users', 'index.php?option=com_k2&view=users', 'component', 0, 122, 2, 10039, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 76, 77, 0, '', 1),
(128, 'main', 'K2_USER_GROUPS', 'k2-user-groups', '', 'com-k2/k2-user-groups', 'index.php?option=com_k2&view=usergroups', 'component', 0, 122, 2, 10039, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 78, 79, 0, '', 1),
(129, 'main', 'K2_EXTRA_FIELDS', 'k2-extra-fields', '', 'com-k2/k2-extra-fields', 'index.php?option=com_k2&view=extrafields', 'component', 0, 122, 2, 10039, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 80, 81, 0, '', 1),
(130, 'main', 'K2_EXTRA_FIELD_GROUPS', 'k2-extra-field-groups', '', 'com-k2/k2-extra-field-groups', 'index.php?option=com_k2&view=extrafieldsgroups', 'component', 0, 122, 2, 10039, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 82, 83, 0, '', 1),
(131, 'main', 'K2_MEDIA_MANAGER', 'k2-media-manager', '', 'com-k2/k2-media-manager', 'index.php?option=com_k2&view=media', 'component', 0, 122, 2, 10039, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 84, 85, 0, '', 1),
(132, 'main', 'K2_INFORMATION', 'k2-information', '', 'com-k2/k2-information', 'index.php?option=com_k2&view=info', 'component', 0, 122, 2, 10039, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 86, 87, 0, '', 1),
(133, 'main', 'Projectfork', 'projectfork', '', 'projectfork', 'index.php?option=com_projectfork', 'component', 0, 1, 1, 10053, 0, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_projectfork/_core/images/16_projectfork.png', 0, '', 89, 90, 0, '', 1),
(134, 'mainmenu', 'Time tracking', 'time-tracking', '', 'time-tracking', 'index.php?option=com_projectfork&view=projectfork', 'component', 1, 1, 1, 10053, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 91, 92, 0, '*', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_menu_types`
--

DROP TABLE IF EXISTS `lekg5_menu_types`;
CREATE TABLE IF NOT EXISTS `lekg5_menu_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menutype` varchar(24) NOT NULL,
  `title` varchar(48) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_menutype` (`menutype`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lekg5_menu_types`
--

INSERT INTO `lekg5_menu_types` (`id`, `menutype`, `title`, `description`) VALUES
(1, 'mainmenu', 'Main Menu', 'The main menu for the site');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_messages`
--

DROP TABLE IF EXISTS `lekg5_messages`;
CREATE TABLE IF NOT EXISTS `lekg5_messages` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id_from` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id_to` int(10) unsigned NOT NULL DEFAULT '0',
  `folder_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `priority` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_messages_cfg`
--

DROP TABLE IF EXISTS `lekg5_messages_cfg`;
CREATE TABLE IF NOT EXISTS `lekg5_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cfg_name` varchar(100) NOT NULL DEFAULT '',
  `cfg_value` varchar(255) NOT NULL DEFAULT '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_modules`
--

DROP TABLE IF EXISTS `lekg5_modules`;
CREATE TABLE IF NOT EXISTS `lekg5_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `position` varchar(50) NOT NULL DEFAULT '',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `showtitle` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `lekg5_modules`
--

INSERT INTO `lekg5_modules` (`id`, `title`, `note`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `published`, `module`, `access`, `showtitle`, `params`, `client_id`, `language`) VALUES
(1, 'Main Menu', '', '', 1, 'position-7', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 1, 1, '{"menutype":"mainmenu","startLevel":"0","endLevel":"0","showAllChildren":"0","tag_id":"","class_sfx":"","window_open":"","layout":"","moduleclass_sfx":"_menu","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*'),
(2, 'Login', '', '', 1, 'login', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_login', 1, 1, '', 1, '*'),
(3, 'Popular Articles', '', '', 3, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_popular', 3, 1, '{"count":"5","catid":"","user_id":"0","layout":"_:default","moduleclass_sfx":"","cache":"0","automatic_title":"1"}', 1, '*'),
(4, 'Recently Added Articles', '', '', 4, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_latest', 3, 1, '{"count":"5","ordering":"c_dsc","catid":"","user_id":"0","layout":"_:default","moduleclass_sfx":"","cache":"0","automatic_title":"1"}', 1, '*'),
(8, 'Toolbar', '', '', 1, 'toolbar', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_toolbar', 3, 1, '', 1, '*'),
(9, 'Quick Icons', '', '', 1, 'icon', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_quickicon', 3, 1, '', 1, '*'),
(10, 'Logged-in Users', '', '', 2, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_logged', 3, 1, '{"count":"5","name":"1","layout":"_:default","moduleclass_sfx":"","cache":"0","automatic_title":"1"}', 1, '*'),
(12, 'Admin Menu', '', '', 1, 'menu', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 3, 1, '{"layout":"","moduleclass_sfx":"","shownew":"1","showhelp":"1","cache":"0"}', 1, '*'),
(13, 'Admin Submenu', '', '', 1, 'submenu', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_submenu', 3, 1, '', 1, '*'),
(14, 'User Status', '', '', 2, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_status', 3, 1, '', 1, '*'),
(15, 'Title', '', '', 1, 'title', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_title', 3, 1, '', 1, '*'),
(16, 'Login Form', '', '', 7, 'position-7', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_login', 1, 1, '{"greeting":"1","name":"0"}', 0, '*'),
(17, 'Breadcrumbs', '', '', 1, 'position-2', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_breadcrumbs', 1, 1, '{"showHere":"1","showHome":"0","homeText":"Home","showLast":"1","separator":"","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*'),
(79, 'Multilanguage status', '', '', 1, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_multilangstatus', 3, 1, '{"layout":"_:default","moduleclass_sfx":"","cache":"0"}', 1, '*'),
(86, 'Joomla Version', '', '', 1, 'footer', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_version', 3, 1, '{"format":"short","product":"1","layout":"_:default","moduleclass_sfx":"","cache":"0"}', 1, '*'),
(87, 'FaLang Language Switcher', '', '', 1, 'position-4', 232, '2013-01-05 10:20:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_falang', 1, 1, '{"header_text":"","footer_text":"","dropdown":"0","image":"1","inline":"1","show_active":"1","full_name":"1","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*'),
(89, 'AcyMailing Module', '', '', 0, 'position-7', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_acymailing', 1, 1, '', 0, '*'),
(90, 'K2 Comments', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_k2_comments', 1, 1, '', 0, '*'),
(91, 'K2 Content', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_k2_content', 1, 1, '', 0, '*'),
(92, 'K2 Tools', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_k2_tools', 1, 1, '', 0, '*'),
(93, 'K2 Users', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_k2_users', 1, 1, '', 0, '*'),
(94, 'K2 User', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_k2_user', 1, 1, '', 0, '*'),
(95, 'K2 Quick Icons (admin)', '', '', 0, 'icon', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_k2_quickicons', 1, 1, '', 1, '*'),
(96, 'K2 Stats (admin)', '', '', 0, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_k2_stats', 1, 1, '', 1, '*');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_modules_menu`
--

DROP TABLE IF EXISTS `lekg5_modules_menu`;
CREATE TABLE IF NOT EXISTS `lekg5_modules_menu` (
  `moduleid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`moduleid`,`menuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lekg5_modules_menu`
--

INSERT INTO `lekg5_modules_menu` (`moduleid`, `menuid`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(79, 0),
(86, 0),
(87, 0),
(89, 0),
(95, 0),
(96, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_newsfeeds`
--

DROP TABLE IF EXISTS `lekg5_newsfeeds`;
CREATE TABLE IF NOT EXISTS `lekg5_newsfeeds` (
  `catid` int(11) NOT NULL DEFAULT '0',
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `link` varchar(200) NOT NULL DEFAULT '',
  `filename` varchar(200) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `numarticles` int(10) unsigned NOT NULL DEFAULT '1',
  `cache_time` int(10) unsigned NOT NULL DEFAULT '3600',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rtl` tinyint(4) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`published`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_overrider`
--

DROP TABLE IF EXISTS `lekg5_overrider`;
CREATE TABLE IF NOT EXISTS `lekg5_overrider` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `constant` varchar(255) NOT NULL,
  `string` text NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_access_flags`
--

DROP TABLE IF EXISTS `lekg5_pf_access_flags`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_access_flags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(124) NOT NULL,
  `title` varchar(124) NOT NULL,
  `project` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project` (`project`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lekg5_pf_access_flags`
--

INSERT INTO `lekg5_pf_access_flags` (`id`, `name`, `title`, `project`) VALUES
(1, 'project_administrator', 'PFL_PROJECT_ADMIN', 0),
(2, 'system_administrator', 'PFL_SYSTEM_ADMIN', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_access_levels`
--

DROP TABLE IF EXISTS `lekg5_pf_access_levels`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_access_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(124) NOT NULL,
  `score` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `flag` varchar(124) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project` (`project`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `lekg5_pf_access_levels`
--

INSERT INTO `lekg5_pf_access_levels` (`id`, `title`, `score`, `project`, `flag`) VALUES
(1, 'PFL_ACL_VISITOR', 0, 0, ''),
(2, 'PFL_ACL_REGISTERED', 1, 0, ''),
(3, 'PFL_ACL_AUTHOR', 2, 0, ''),
(4, 'PFL_ACL_EDITOR', 3, 0, ''),
(5, 'PFL_ACL_PUBLISHER', 4, 0, ''),
(6, 'PFL_ACL_MANAGER', 5, 0, 'system_administrator'),
(7, 'PFL_ACL_ADMINISTRATOR', 999, 0, 'system_administrator'),
(8, 'PFL_ACL_SADMINISTRATOR', 999, 0, 'system_administrator'),
(9, 'PFL_ACL_PA', 6, 0, 'project_administrator'),
(10, 'PFL_ACL_PM', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_comments`
--

DROP TABLE IF EXISTS `lekg5_pf_comments`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `scope` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `cdate` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_author` (`author`),
  KEY `idx_scopeid` (`scope`(12),`item_id`),
  KEY `idx_scope` (`scope`(12)),
  KEY `idx_itemid` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_events`
--

DROP TABLE IF EXISTS `lekg5_pf_events`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(56) NOT NULL,
  `content` text NOT NULL,
  `author` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `cdate` int(11) NOT NULL,
  `sdate` int(11) NOT NULL,
  `edate` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project` (`project`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lekg5_pf_events`
--

INSERT INTO `lekg5_pf_events` (`id`, `title`, `content`, `author`, `project`, `cdate`, `sdate`, `edate`) VALUES
(1, 'Kickoff Meeting', '', 232, 1, 1357800209, 1357800209, 1358405009);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_files`
--

DROP TABLE IF EXISTS `lekg5_pf_files`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `description` varchar(128) NOT NULL,
  `author` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `dir` int(11) NOT NULL,
  `filesize` int(11) NOT NULL,
  `cdate` int(11) NOT NULL,
  `edate` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_project` (`project`),
  KEY `idx_author` (`author`),
  KEY `idx_dir` (`dir`),
  KEY `idx_projectdir` (`project`,`dir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_folders`
--

DROP TABLE IF EXISTS `lekg5_pf_folders`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(56) NOT NULL,
  `description` varchar(128) NOT NULL,
  `author` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `cdate` int(11) NOT NULL,
  `edate` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_project` (`project`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lekg5_pf_folders`
--

INSERT INTO `lekg5_pf_folders` (`id`, `title`, `description`, `author`, `project`, `cdate`, `edate`) VALUES
(1, 'Design Files', 'Source Artwork', 232, 1, 1357800209, 1357800209),
(2, 'Development Files', 'Extensions, etc.', 232, 1, 1357800209, 1357800209);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_folder_tree`
--

DROP TABLE IF EXISTS `lekg5_pf_folder_tree`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_folder_tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folder_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_parentid` (`parent_id`),
  KEY `idx_folderid` (`folder_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lekg5_pf_folder_tree`
--

INSERT INTO `lekg5_pf_folder_tree` (`id`, `folder_id`, `parent_id`) VALUES
(1, 1, 0),
(2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_groups`
--

DROP TABLE IF EXISTS `lekg5_pf_groups`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(124) NOT NULL,
  `description` varchar(255) NOT NULL,
  `project` int(11) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project` (`project`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `lekg5_pf_groups`
--

INSERT INTO `lekg5_pf_groups` (`id`, `title`, `description`, `project`, `permissions`) VALUES
(1, 'GROUP_VISITOR', 'GROUP_VISITOR_DESC', 0, 'a:3:{s:8:"sections";a:2:{i:0;s:12:"controlpanel";i:1;s:8:"projects";}s:12:"controlpanel";a:0:{}s:8:"projects";a:2:{i:0;s:13:"accept_invite";i:1;s:14:"decline_invite";}}'),
(2, 'GROUP_REGISTERED', 'GROUP_REGISTERED_DESC', 0, 'a:4:{s:8:"sections";a:3:{i:0;s:12:"controlpanel";i:1;s:8:"projects";i:2;s:7:"profile";}s:12:"controlpanel";a:0:{}s:8:"projects";a:6:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:15:"display_details";i:3;s:17:"task_request_join";i:4;s:13:"accept_invite";i:5;s:14:"decline_invite";}s:7:"profile";a:2:{i:0;s:15:"display_details";i:1;s:11:"task_update";}}'),
(3, 'GROUP_AUTHOR', 'GROUP_AUTHOR_DESC', 0, 'a:4:{s:8:"sections";a:3:{i:0;s:12:"controlpanel";i:1;s:8:"projects";i:2;s:7:"profile";}s:12:"controlpanel";a:0:{}s:8:"projects";a:6:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:15:"display_details";i:3;s:17:"task_request_join";i:4;s:13:"accept_invite";i:5;s:14:"decline_invite";}s:7:"profile";a:2:{i:0;s:15:"display_details";i:1;s:11:"task_update";}}'),
(4, 'GROUP_EDITOR', 'GROUP_EDITOR_DESC', 0, 'a:4:{s:8:"sections";a:3:{i:0;s:12:"controlpanel";i:1;s:8:"projects";i:2;s:7:"profile";}s:12:"controlpanel";a:0:{}s:8:"projects";a:6:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:15:"display_details";i:3;s:17:"task_request_join";i:4;s:13:"accept_invite";i:5;s:14:"decline_invite";}s:7:"profile";a:2:{i:0;s:15:"display_details";i:1;s:11:"task_update";}}'),
(5, 'GROUP_PUBLISHER', 'GROUP_PUBLISHER_DESC', 0, 'a:4:{s:8:"sections";a:3:{i:0;s:12:"controlpanel";i:1;s:8:"projects";i:2;s:7:"profile";}s:12:"controlpanel";a:0:{}s:8:"projects";a:6:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:15:"display_details";i:3;s:17:"task_request_join";i:4;s:13:"accept_invite";i:5;s:14:"decline_invite";}s:7:"profile";a:2:{i:0;s:15:"display_details";i:1;s:11:"task_update";}}'),
(6, 'GROUP_MANAGER', 'GROUP_MANAGER_DESC', 0, 'a:12:{s:8:"sections";a:11:{i:0;s:12:"controlpanel";i:1;s:8:"projects";i:2;s:5:"tasks";i:3;s:11:"filemanager";i:4;s:8:"calendar";i:5;s:5:"board";i:6;s:4:"time";i:7;s:7:"profile";i:8;s:6:"groups";i:9;s:5:"users";i:10;s:6:"config";}s:12:"controlpanel";a:0:{}s:8:"projects";a:12:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:9:"form_edit";i:3;s:11:"task_update";i:4;s:15:"display_details";i:5;s:11:"task_delete";i:6;s:9:"task_copy";i:7;s:17:"task_request_join";i:8;s:13:"task_activate";i:9;s:12:"task_approve";i:10;s:13:"accept_invite";i:11;s:14:"decline_invite";}s:5:"tasks";a:17:{i:0;s:13:"form_new_task";i:1;s:14:"task_save_task";i:2;s:14:"form_edit_task";i:3;s:16:"task_update_task";i:4;s:20:"task_update_progress";i:5;s:15:"display_details";i:6;s:18:"form_new_milestone";i:7;s:19:"task_save_milestone";i:8;s:19:"form_edit_milestone";i:9;s:21:"task_update_milestone";i:10;s:11:"task_delete";i:11;s:12:"task_reorder";i:12;s:17:"task_save_comment";i:13;s:17:"form_edit_comment";i:14;s:19:"task_update_comment";i:15;s:19:"task_delete_comment";i:16;s:9:"task_copy";}s:11:"filemanager";a:21:{i:0;s:15:"form_new_folder";i:1;s:16:"task_save_folder";i:2;s:13:"form_new_file";i:3;s:14:"task_save_file";i:4;s:13:"form_new_note";i:5;s:14:"task_save_note";i:6;s:16:"form_edit_folder";i:7;s:18:"task_update_folder";i:8;s:14:"form_edit_note";i:9;s:16:"task_update_note";i:10;s:14:"form_edit_file";i:11;s:16:"task_update_file";i:12;s:11:"task_delete";i:13;s:13:"task_download";i:14;s:12:"display_note";i:15;s:17:"task_save_comment";i:16;s:19:"task_update_comment";i:17;s:17:"form_edit_comment";i:18;s:19:"task_delete_comment";i:19;s:9:"list_move";i:20;s:9:"task_move";}s:8:"calendar";a:8:{i:0;s:13:"display_month";i:1;s:12:"display_week";i:2;s:11:"display_day";i:3;s:8:"form_new";i:4;s:9:"task_save";i:5;s:9:"form_edit";i:6;s:11:"task_update";i:7;s:11:"task_delete";}s:5:"board";a:12:{i:0;s:15:"display_details";i:1;s:14:"form_new_topic";i:2;s:15:"task_save_topic";i:3;s:15:"form_edit_topic";i:4;s:17:"task_update_topic";i:5;s:15:"form_edit_reply";i:6;s:17:"task_update_reply";i:7;s:15:"task_save_reply";i:8;s:17:"task_delete_topic";i:9;s:17:"task_delete_reply";i:10;s:14:"task_subscribe";i:11;s:16:"task_unsubscribe";}s:4:"time";a:5:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:9:"form_edit";i:3;s:11:"task_update";i:4;s:11:"task_delete";}s:7:"profile";a:2:{i:0;s:15:"display_details";i:1;s:11:"task_update";}s:6:"groups";a:6:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:9:"form_edit";i:3;s:11:"task_update";i:4;s:11:"task_delete";i:5;s:9:"task_copy";}s:5:"users";a:17:{i:0;s:14:"list_accesslvl";i:1;s:13:"list_requests";i:2;s:19:"form_accept_request";i:3;s:20:"task_accept_requests";i:4;s:9:"task_deny";i:5;s:18:"form_new_accesslvl";i:6;s:19:"task_save_accesslvl";i:7;s:9:"form_edit";i:8;s:11:"task_update";i:9;s:19:"form_edit_accesslvl";i:10;s:21:"task_update_accesslvl";i:11;s:21:"task_delete_accesslvl";i:12;s:11:"task_delete";i:13;s:11:"form_invite";i:14;s:11:"task_invite";i:15;s:8:"form_new";i:16;s:9:"task_save";}s:6:"config";a:25:{i:0;s:13:"list_sections";i:1;s:11:"list_panels";i:2;s:14:"list_processes";i:3;s:9:"list_mods";i:4;s:14:"list_languages";i:5;s:11:"list_themes";i:6;s:17:"form_edit_section";i:7;s:19:"task_update_section";i:8;s:15:"form_edit_panel";i:9;s:17:"task_update_panel";i:10;s:17:"form_edit_process";i:11;s:19:"task_update_process";i:12;s:16:"task_save_global";i:13;s:12:"task_reorder";i:14;s:12:"task_publish";i:15;s:14:"task_unpublish";i:16;s:20:"task_default_section";i:17;s:21:"task_default_language";i:18;s:18:"task_default_theme";i:19;s:12:"task_install";i:20;s:14:"task_uninstall";i:21;s:13:"form_edit_mod";i:22;s:15:"task_update_mod";i:23;s:15:"form_edit_theme";i:24;s:17:"task_update_theme";}}'),
(7, 'GROUP_ADMINISTRATOR', 'GROUP_ADMINISTRATOR_DESC', 0, 'a:12:{s:8:"sections";a:11:{i:0;s:12:"controlpanel";i:1;s:8:"projects";i:2;s:5:"tasks";i:3;s:11:"filemanager";i:4;s:8:"calendar";i:5;s:5:"board";i:6;s:4:"time";i:7;s:7:"profile";i:8;s:6:"groups";i:9;s:5:"users";i:10;s:6:"config";}s:12:"controlpanel";a:0:{}s:8:"projects";a:12:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:9:"form_edit";i:3;s:11:"task_update";i:4;s:15:"display_details";i:5;s:11:"task_delete";i:6;s:9:"task_copy";i:7;s:17:"task_request_join";i:8;s:13:"task_activate";i:9;s:12:"task_approve";i:10;s:13:"accept_invite";i:11;s:14:"decline_invite";}s:5:"tasks";a:17:{i:0;s:13:"form_new_task";i:1;s:14:"task_save_task";i:2;s:14:"form_edit_task";i:3;s:16:"task_update_task";i:4;s:20:"task_update_progress";i:5;s:15:"display_details";i:6;s:18:"form_new_milestone";i:7;s:19:"task_save_milestone";i:8;s:19:"form_edit_milestone";i:9;s:21:"task_update_milestone";i:10;s:11:"task_delete";i:11;s:12:"task_reorder";i:12;s:17:"task_save_comment";i:13;s:17:"form_edit_comment";i:14;s:19:"task_update_comment";i:15;s:19:"task_delete_comment";i:16;s:9:"task_copy";}s:11:"filemanager";a:21:{i:0;s:15:"form_new_folder";i:1;s:16:"task_save_folder";i:2;s:13:"form_new_file";i:3;s:14:"task_save_file";i:4;s:13:"form_new_note";i:5;s:14:"task_save_note";i:6;s:16:"form_edit_folder";i:7;s:18:"task_update_folder";i:8;s:14:"form_edit_note";i:9;s:16:"task_update_note";i:10;s:14:"form_edit_file";i:11;s:16:"task_update_file";i:12;s:11:"task_delete";i:13;s:13:"task_download";i:14;s:12:"display_note";i:15;s:17:"task_save_comment";i:16;s:19:"task_update_comment";i:17;s:17:"form_edit_comment";i:18;s:19:"task_delete_comment";i:19;s:9:"list_move";i:20;s:9:"task_move";}s:8:"calendar";a:8:{i:0;s:13:"display_month";i:1;s:12:"display_week";i:2;s:11:"display_day";i:3;s:8:"form_new";i:4;s:9:"task_save";i:5;s:9:"form_edit";i:6;s:11:"task_update";i:7;s:11:"task_delete";}s:5:"board";a:12:{i:0;s:15:"display_details";i:1;s:14:"form_new_topic";i:2;s:15:"task_save_topic";i:3;s:15:"form_edit_topic";i:4;s:17:"task_update_topic";i:5;s:15:"form_edit_reply";i:6;s:17:"task_update_reply";i:7;s:15:"task_save_reply";i:8;s:17:"task_delete_topic";i:9;s:17:"task_delete_reply";i:10;s:14:"task_subscribe";i:11;s:16:"task_unsubscribe";}s:4:"time";a:5:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:9:"form_edit";i:3;s:11:"task_update";i:4;s:11:"task_delete";}s:7:"profile";a:2:{i:0;s:15:"display_details";i:1;s:11:"task_update";}s:6:"groups";a:6:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:9:"form_edit";i:3;s:11:"task_update";i:4;s:11:"task_delete";i:5;s:9:"task_copy";}s:5:"users";a:17:{i:0;s:14:"list_accesslvl";i:1;s:13:"list_requests";i:2;s:19:"form_accept_request";i:3;s:20:"task_accept_requests";i:4;s:9:"task_deny";i:5;s:18:"form_new_accesslvl";i:6;s:19:"task_save_accesslvl";i:7;s:9:"form_edit";i:8;s:11:"task_update";i:9;s:19:"form_edit_accesslvl";i:10;s:21:"task_update_accesslvl";i:11;s:21:"task_delete_accesslvl";i:12;s:11:"task_delete";i:13;s:11:"form_invite";i:14;s:11:"task_invite";i:15;s:8:"form_new";i:16;s:9:"task_save";}s:6:"config";a:25:{i:0;s:13:"list_sections";i:1;s:11:"list_panels";i:2;s:14:"list_processes";i:3;s:9:"list_mods";i:4;s:14:"list_languages";i:5;s:11:"list_themes";i:6;s:17:"form_edit_section";i:7;s:19:"task_update_section";i:8;s:15:"form_edit_panel";i:9;s:17:"task_update_panel";i:10;s:17:"form_edit_process";i:11;s:19:"task_update_process";i:12;s:16:"task_save_global";i:13;s:12:"task_reorder";i:14;s:12:"task_publish";i:15;s:14:"task_unpublish";i:16;s:20:"task_default_section";i:17;s:21:"task_default_language";i:18;s:18:"task_default_theme";i:19;s:12:"task_install";i:20;s:14:"task_uninstall";i:21;s:13:"form_edit_mod";i:22;s:15:"task_update_mod";i:23;s:15:"form_edit_theme";i:24;s:17:"task_update_theme";}}'),
(8, 'GROUP_SADMINISTRATOR', 'GROUP_SADMINISTRATOR_DESC', 0, 'a:12:{s:8:"sections";a:11:{i:0;s:12:"controlpanel";i:1;s:8:"projects";i:2;s:5:"tasks";i:3;s:11:"filemanager";i:4;s:8:"calendar";i:5;s:5:"board";i:6;s:4:"time";i:7;s:7:"profile";i:8;s:6:"groups";i:9;s:5:"users";i:10;s:6:"config";}s:12:"controlpanel";a:0:{}s:8:"projects";a:13:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:9:"form_edit";i:3;s:11:"task_update";i:4;s:15:"display_details";i:5;s:11:"task_delete";i:6;s:9:"task_copy";i:7;s:17:"task_request_join";i:8;s:12:"task_archive";i:9;s:13:"task_activate";i:10;s:12:"task_approve";i:11;s:13:"accept_invite";i:12;s:14:"decline_invite";}s:5:"tasks";a:17:{i:0;s:13:"form_new_task";i:1;s:14:"task_save_task";i:2;s:14:"form_edit_task";i:3;s:16:"task_update_task";i:4;s:20:"task_update_progress";i:5;s:15:"display_details";i:6;s:18:"form_new_milestone";i:7;s:19:"task_save_milestone";i:8;s:19:"form_edit_milestone";i:9;s:21:"task_update_milestone";i:10;s:11:"task_delete";i:11;s:12:"task_reorder";i:12;s:17:"task_save_comment";i:13;s:17:"form_edit_comment";i:14;s:19:"task_update_comment";i:15;s:19:"task_delete_comment";i:16;s:9:"task_copy";}s:11:"filemanager";a:21:{i:0;s:15:"form_new_folder";i:1;s:16:"task_save_folder";i:2;s:13:"form_new_file";i:3;s:14:"task_save_file";i:4;s:13:"form_new_note";i:5;s:14:"task_save_note";i:6;s:16:"form_edit_folder";i:7;s:18:"task_update_folder";i:8;s:14:"form_edit_note";i:9;s:16:"task_update_note";i:10;s:14:"form_edit_file";i:11;s:16:"task_update_file";i:12;s:11:"task_delete";i:13;s:13:"task_download";i:14;s:12:"display_note";i:15;s:17:"task_save_comment";i:16;s:19:"task_update_comment";i:17;s:17:"form_edit_comment";i:18;s:19:"task_delete_comment";i:19;s:9:"list_move";i:20;s:9:"task_move";}s:8:"calendar";a:8:{i:0;s:13:"display_month";i:1;s:12:"display_week";i:2;s:11:"display_day";i:3;s:8:"form_new";i:4;s:9:"task_save";i:5;s:9:"form_edit";i:6;s:11:"task_update";i:7;s:11:"task_delete";}s:5:"board";a:12:{i:0;s:15:"display_details";i:1;s:14:"form_new_topic";i:2;s:15:"task_save_topic";i:3;s:15:"form_edit_topic";i:4;s:17:"task_update_topic";i:5;s:15:"form_edit_reply";i:6;s:17:"task_update_reply";i:7;s:15:"task_save_reply";i:8;s:17:"task_delete_topic";i:9;s:17:"task_delete_reply";i:10;s:14:"task_subscribe";i:11;s:16:"task_unsubscribe";}s:4:"time";a:5:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:9:"form_edit";i:3;s:11:"task_update";i:4;s:11:"task_delete";}s:7:"profile";a:2:{i:0;s:15:"display_details";i:1;s:11:"task_update";}s:6:"groups";a:6:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:9:"form_edit";i:3;s:11:"task_update";i:4;s:11:"task_delete";i:5;s:9:"task_copy";}s:5:"users";a:17:{i:0;s:14:"list_accesslvl";i:1;s:13:"list_requests";i:2;s:19:"form_accept_request";i:3;s:20:"task_accept_requests";i:4;s:9:"task_deny";i:5;s:18:"form_new_accesslvl";i:6;s:19:"task_save_accesslvl";i:7;s:9:"form_edit";i:8;s:11:"task_update";i:9;s:19:"form_edit_accesslvl";i:10;s:21:"task_update_accesslvl";i:11;s:21:"task_delete_accesslvl";i:12;s:11:"task_delete";i:13;s:11:"form_invite";i:14;s:11:"task_invite";i:15;s:8:"form_new";i:16;s:9:"task_save";}s:6:"config";a:25:{i:0;s:13:"list_sections";i:1;s:11:"list_panels";i:2;s:14:"list_processes";i:3;s:9:"list_mods";i:4;s:14:"list_languages";i:5;s:11:"list_themes";i:6;s:17:"form_edit_section";i:7;s:19:"task_update_section";i:8;s:15:"form_edit_panel";i:9;s:17:"task_update_panel";i:10;s:17:"form_edit_process";i:11;s:19:"task_update_process";i:12;s:16:"task_save_global";i:13;s:12:"task_reorder";i:14;s:12:"task_publish";i:15;s:14:"task_unpublish";i:16;s:20:"task_default_section";i:17;s:21:"task_default_language";i:18;s:18:"task_default_theme";i:19;s:12:"task_install";i:20;s:14:"task_uninstall";i:21;s:13:"form_edit_mod";i:22;s:15:"task_update_mod";i:23;s:15:"form_edit_theme";i:24;s:17:"task_update_theme";}}'),
(9, 'GROUP_FOUNDER', 'GROUP_FOUNDER_DESC', 0, 'a:11:{s:8:"sections";a:10:{i:0;s:12:"controlpanel";i:1;s:8:"projects";i:2;s:5:"tasks";i:3;s:11:"filemanager";i:4;s:8:"calendar";i:5;s:5:"board";i:6;s:4:"time";i:7;s:7:"profile";i:8;s:6:"groups";i:9;s:5:"users";}s:12:"controlpanel";a:0:{}s:8:"projects";a:8:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:9:"form_edit";i:3;s:11:"task_update";i:4;s:15:"display_details";i:5;s:17:"task_request_join";i:6;s:13:"accept_invite";i:7;s:14:"decline_invite";}s:5:"tasks";a:17:{i:0;s:13:"form_new_task";i:1;s:14:"task_save_task";i:2;s:14:"form_edit_task";i:3;s:16:"task_update_task";i:4;s:20:"task_update_progress";i:5;s:15:"display_details";i:6;s:18:"form_new_milestone";i:7;s:19:"task_save_milestone";i:8;s:19:"form_edit_milestone";i:9;s:21:"task_update_milestone";i:10;s:11:"task_delete";i:11;s:12:"task_reorder";i:12;s:17:"task_save_comment";i:13;s:17:"form_edit_comment";i:14;s:19:"task_update_comment";i:15;s:19:"task_delete_comment";i:16;s:9:"task_copy";}s:11:"filemanager";a:21:{i:0;s:15:"form_new_folder";i:1;s:16:"task_save_folder";i:2;s:13:"form_new_file";i:3;s:14:"task_save_file";i:4;s:13:"form_new_note";i:5;s:14:"task_save_note";i:6;s:16:"form_edit_folder";i:7;s:18:"task_update_folder";i:8;s:14:"form_edit_note";i:9;s:16:"task_update_note";i:10;s:14:"form_edit_file";i:11;s:16:"task_update_file";i:12;s:11:"task_delete";i:13;s:13:"task_download";i:14;s:12:"display_note";i:15;s:17:"task_save_comment";i:16;s:19:"task_update_comment";i:17;s:17:"form_edit_comment";i:18;s:19:"task_delete_comment";i:19;s:9:"list_move";i:20;s:9:"task_move";}s:8:"calendar";a:8:{i:0;s:13:"display_month";i:1;s:12:"display_week";i:2;s:11:"display_day";i:3;s:8:"form_new";i:4;s:9:"task_save";i:5;s:9:"form_edit";i:6;s:11:"task_update";i:7;s:11:"task_delete";}s:5:"board";a:12:{i:0;s:15:"display_details";i:1;s:14:"form_new_topic";i:2;s:15:"task_save_topic";i:3;s:15:"form_edit_topic";i:4;s:17:"task_update_topic";i:5;s:15:"form_edit_reply";i:6;s:17:"task_update_reply";i:7;s:15:"task_save_reply";i:8;s:17:"task_delete_topic";i:9;s:17:"task_delete_reply";i:10;s:14:"task_subscribe";i:11;s:16:"task_unsubscribe";}s:4:"time";a:5:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:9:"form_edit";i:3;s:11:"task_update";i:4;s:11:"task_delete";}s:7:"profile";a:2:{i:0;s:15:"display_details";i:1;s:11:"task_update";}s:6:"groups";a:6:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:9:"form_edit";i:3;s:11:"task_update";i:4;s:11:"task_delete";i:5;s:9:"task_copy";}s:5:"users";a:13:{i:0;s:14:"list_accesslvl";i:1;s:13:"list_requests";i:2;s:19:"form_accept_request";i:3;s:20:"task_accept_requests";i:4;s:9:"task_deny";i:5;s:18:"form_new_accesslvl";i:6;s:19:"task_save_accesslvl";i:7;s:19:"form_edit_accesslvl";i:8;s:21:"task_update_accesslvl";i:9;s:21:"task_delete_accesslvl";i:10;s:11:"task_delete";i:11;s:11:"form_invite";i:12;s:11:"task_invite";}}'),
(10, 'GROUP_MEMBER', 'GROUP_MEMBER_DESC', 0, 'a:9:{s:8:"sections";a:8:{i:0;s:12:"controlpanel";i:1;s:8:"projects";i:2;s:5:"tasks";i:3;s:11:"filemanager";i:4;s:8:"calendar";i:5;s:5:"board";i:6;s:4:"time";i:7;s:7:"profile";}s:12:"controlpanel";a:0:{}s:8:"projects";a:6:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:15:"display_details";i:3;s:17:"task_request_join";i:4;s:13:"accept_invite";i:5;s:14:"decline_invite";}s:5:"tasks";a:16:{i:0;s:13:"form_new_task";i:1;s:14:"task_save_task";i:2;s:14:"form_edit_task";i:3;s:16:"task_update_task";i:4;s:20:"task_update_progress";i:5;s:15:"display_details";i:6;s:18:"form_new_milestone";i:7;s:19:"task_save_milestone";i:8;s:19:"form_edit_milestone";i:9;s:21:"task_update_milestone";i:10;s:12:"task_reorder";i:11;s:17:"task_save_comment";i:12;s:17:"form_edit_comment";i:13;s:19:"task_update_comment";i:14;s:19:"task_delete_comment";i:15;s:9:"task_copy";}s:11:"filemanager";a:20:{i:0;s:15:"form_new_folder";i:1;s:16:"task_save_folder";i:2;s:13:"form_new_file";i:3;s:14:"task_save_file";i:4;s:13:"form_new_note";i:5;s:14:"task_save_note";i:6;s:16:"form_edit_folder";i:7;s:18:"task_update_folder";i:8;s:14:"form_edit_note";i:9;s:16:"task_update_note";i:10;s:14:"form_edit_file";i:11;s:16:"task_update_file";i:12;s:13:"task_download";i:13;s:12:"display_note";i:14;s:17:"task_save_comment";i:15;s:19:"task_update_comment";i:16;s:17:"form_edit_comment";i:17;s:19:"task_delete_comment";i:18;s:9:"list_move";i:19;s:9:"task_move";}s:8:"calendar";a:8:{i:0;s:13:"display_month";i:1;s:12:"display_week";i:2;s:11:"display_day";i:3;s:8:"form_new";i:4;s:9:"task_save";i:5;s:9:"form_edit";i:6;s:11:"task_update";i:7;s:11:"task_delete";}s:5:"board";a:10:{i:0;s:15:"display_details";i:1;s:14:"form_new_topic";i:2;s:15:"task_save_topic";i:3;s:15:"form_edit_topic";i:4;s:17:"task_update_topic";i:5;s:15:"form_edit_reply";i:6;s:17:"task_update_reply";i:7;s:15:"task_save_reply";i:8;s:14:"task_subscribe";i:9;s:16:"task_unsubscribe";}s:4:"time";a:5:{i:0;s:8:"form_new";i:1;s:9:"task_save";i:2;s:9:"form_edit";i:3;s:11:"task_update";i:4;s:11:"task_delete";}s:7:"profile";a:2:{i:0;s:15:"display_details";i:1;s:11:"task_update";}}');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_group_users`
--

DROP TABLE IF EXISTS `lekg5_pf_group_users`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_group_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_groupid` (`group_id`),
  KEY `idx_userid` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_languages`
--

DROP TABLE IF EXISTS `lekg5_pf_languages`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `published` int(1) NOT NULL,
  `is_default` int(1) NOT NULL,
  `author` varchar(56) NOT NULL,
  `email` varchar(124) NOT NULL,
  `website` varchar(255) NOT NULL,
  `version` varchar(24) NOT NULL,
  `license` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `create_date` varchar(56) NOT NULL,
  `install_date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `published` (`published`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lekg5_pf_languages`
--

INSERT INTO `lekg5_pf_languages` (`id`, `name`, `title`, `published`, `is_default`, `author`, `email`, `website`, `version`, `license`, `copyright`, `create_date`, `install_date`) VALUES
(1, 'english', 'English', 1, 1, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_milestones`
--

DROP TABLE IF EXISTS `lekg5_pf_milestones`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_milestones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(124) NOT NULL,
  `content` varchar(255) NOT NULL,
  `project` int(11) NOT NULL,
  `priority` int(1) NOT NULL,
  `author` int(11) NOT NULL,
  `cdate` int(11) NOT NULL,
  `edate` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project` (`project`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lekg5_pf_milestones`
--

INSERT INTO `lekg5_pf_milestones` (`id`, `title`, `content`, `project`, `priority`, `author`, `cdate`, `edate`, `ordering`) VALUES
(1, 'Project Kickoff', 'Get everything started', 1, 0, 232, 1357800209, 0, 1),
(2, 'Website Design', 'Design Phase of project', 1, 0, 232, 1357800209, 0, 2),
(3, 'Create Joomla! Template', 'Construct template based off design', 1, 0, 232, 1357800209, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_mods`
--

DROP TABLE IF EXISTS `lekg5_pf_mods`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_mods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `enabled` int(1) NOT NULL,
  `author` varchar(56) NOT NULL,
  `email` varchar(124) NOT NULL,
  `website` varchar(255) NOT NULL,
  `version` varchar(24) NOT NULL,
  `license` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `create_date` varchar(56) NOT NULL,
  `install_date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `published` (`enabled`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_mod_files`
--

DROP TABLE IF EXISTS `lekg5_pf_mod_files`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_mod_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `filepath` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`(6))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_notes`
--

DROP TABLE IF EXISTS `lekg5_pf_notes`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(56) NOT NULL,
  `description` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `author` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `dir` int(11) NOT NULL,
  `cdate` int(11) NOT NULL,
  `edate` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_project` (`project`),
  KEY `idx_author` (`author`),
  KEY `idx_dir` (`dir`),
  KEY `idx_projectdir` (`project`,`dir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_panels`
--

DROP TABLE IF EXISTS `lekg5_pf_panels`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_panels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `flag` varchar(124) NOT NULL,
  `enabled` int(1) NOT NULL,
  `position` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL,
  `author` varchar(56) NOT NULL,
  `email` varchar(124) NOT NULL,
  `website` varchar(255) NOT NULL,
  `version` varchar(24) NOT NULL,
  `license` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `create_date` varchar(56) NOT NULL,
  `install_date` int(11) NOT NULL,
  `caching` tinyint(1) NOT NULL,
  `cache_trigger` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `lekg5_pf_panels`
--

INSERT INTO `lekg5_pf_panels` (`id`, `name`, `title`, `score`, `flag`, `enabled`, `position`, `ordering`, `author`, `email`, `website`, `version`, `license`, `copyright`, `create_date`, `install_date`, `caching`, `cache_trigger`) VALUES
(1, 'nav_section', 'SECTION_NAV', 0, '', 1, 'theme_header', 1, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'user_id,project'),
(2, 'system_console', 'DEBUG_CONSOLE', 0, '', 0, 'theme_footer', 2, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 0, ''),
(3, 'system_messages', 'MESSAGES', 0, '', 1, 'theme_pos2', 1, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 0, ''),
(4, 'theme_logo', 'LOGO', 0, '', 1, 'theme_sidebar', 2, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'project'),
(5, 'quicklink_project', 'SYSTEM_PROJECT', 1, '', 1, 'theme_sidebar', 1, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 0, ''),
(6, 'nav_section_subnav', 'PFL_SECTION_SUBNAV', 0, '', 1, 'theme_pos1', 1, 'Tobias Kuhn', '', 'http://projectfork.net', '3000', 'GNU/General Public License', 'Copyright 2006-2010 Tobias Kuhn', '2010', 0, 0, ''),
(7, 'cp_welcome', 'WELCOME', 0, '', 1, 'theme_header', 2, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'user_id'),
(8, 'cp_news', 'CP_NEWS', 0, '', 0, 'controlpanel_right', 2, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, ''),
(9, 'cp_events', 'CP_EVENTS', 1, '', 1, 'controlpanel_main', 1, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'project,user_id'),
(10, 'cp_tasks', 'CP_TASKS', 1, '', 1, 'controlpanel_left', 2, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'project,user_id'),
(107, 'cp_installer', 'CP_INSTALLER', 999, 'system_administrator', 1, 'controlpanel_left', 0, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, ''),
(108, 'project_desc', 'PROJECT_DETAILS_DESC', 0, '', 1, 'project_details_left', 1, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'item_id'),
(109, 'project_logo', 'PROJECT_DETAILS_LOGO', 0, '', 1, 'project_details_right', 1, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'item_id'),
(110, 'project_details', 'PROJECT_DETAILS', 0, '', 1, 'project_details_right', 3, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'item_id,user_id'),
(111, 'task_comments', 'TASK_COMMENTS', 0, '', 1, 'task_details_left', 2, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 0, ''),
(112, 'task_content', 'TASK_CONTENT', 0, '', 1, 'task_details_left', 1, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'item_id'),
(113, 'task_details', 'TASK_DETAILS', 0, '', 1, 'task_details_right', 1, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'item_id'),
(114, 'task_attachments', 'TASK_ATTACHMENTS', 0, '', 1, 'task_details_right', 2, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'item_id,user_id'),
(115, 'project_tasks', 'PROJECT_TASKS', 1, '', 1, 'project_details_left', 2, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'item_id,user_id'),
(116, 'project_join', 'PROJECT_JOIN', 1, '', 1, 'project_details_right', 2, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 0, ''),
(117, 'cp_weblinks', 'WEBLINKS', 1, '', 0, 'controlpanel_right', 3, 'Tobias Kuhn', '', 'http://projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '', 0, 1, ''),
(118, 'profile_user', 'PROFILE_USER', 0, '', 1, 'profile_details_left', 1, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'item_id'),
(119, 'profile_contact', 'PROFILE_CONTACT', 0, '', 1, 'profile_details_left', 2, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'item_id'),
(120, 'profile_location', 'PROFILE_LOCATION', 0, '', 1, 'profile_details_left', 4, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'item_id'),
(121, 'note_info', 'NOTE_INFO', 0, '', 1, 'note_details_left', 1, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'item_id'),
(122, 'note_details', 'NOTE_DETAILS', 0, '', 1, 'note_details_right', 1, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'item_id'),
(123, 'note_comments', 'NOTE_COMMENTS', 0, '', 1, 'note_details_left', 2, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 0, ''),
(124, 'quicklink_version', 'Version Quicklink', 999, 'system_administrator', 1, 'theme_footer', 1, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 0, ''),
(125, 'time_tracking', 'PANEL_TIME_TRACKING', 1, '', 1, 'controlpanel_right', 1, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'project,user_id'),
(126, 'profile_networks', 'PROFILE_NETWORKS', 0, '', 1, 'profile_details_left', 3, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0, 1, 'item_id');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_processes`
--

DROP TABLE IF EXISTS `lekg5_pf_processes`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_processes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `flag` varchar(124) NOT NULL,
  `enabled` int(1) NOT NULL,
  `event` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL,
  `author` varchar(56) NOT NULL,
  `email` varchar(124) NOT NULL,
  `website` varchar(255) NOT NULL,
  `version` varchar(24) NOT NULL,
  `license` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `create_date` varchar(56) NOT NULL,
  `install_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lekg5_pf_processes`
--

INSERT INTO `lekg5_pf_processes` (`id`, `name`, `title`, `score`, `flag`, `enabled`, `event`, `ordering`, `author`, `email`, `website`, `version`, `license`, `copyright`, `create_date`, `install_date`) VALUES
(1, 'comments', 'PFL_COMMENTS', 1, '', 1, 'system_startup', 1, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0),
(2, 'demo', 'PFL_DEMO_PROCESS', 0, '', 0, 'system_startup', 2, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0),
(3, 'tasks_mailer', 'PFL_TASKS_MAILER', 0, '', 1, 'system_startup', 2, 'Tobias Kuhn', '', 'http://projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0),
(4, 'projects_mailer', 'PFL_PROJECTS_MAILER', 0, '', 1, 'system_startup', 3, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0),
(5, 'avatar', 'PFL_AVATAR_PROCESS', 0, '', 1, 'system_startup', 4, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0),
(6, 'dbopt', 'DBOPT_PROCESS', 0, '', 1, 'system_startup', 5, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright 2006-2010 Tobias Kuhn', '2010', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_projects`
--

DROP TABLE IF EXISTS `lekg5_pf_projects`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(124) NOT NULL,
  `content` text NOT NULL,
  `author` int(11) NOT NULL,
  `color` varchar(12) NOT NULL,
  `logo` varchar(124) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(124) NOT NULL,
  `category` varchar(124) NOT NULL,
  `is_public` int(1) NOT NULL,
  `allow_register` int(1) NOT NULL,
  `archived` int(1) NOT NULL,
  `approved` int(1) NOT NULL,
  `cdate` int(11) NOT NULL,
  `edate` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_approved` (`approved`),
  KEY `idx_archived` (`archived`),
  KEY `idx_author` (`author`),
  KEY `idx_ispublic` (`is_public`),
  KEY `idx_category` (`category`(12))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lekg5_pf_projects`
--

INSERT INTO `lekg5_pf_projects` (`id`, `title`, `content`, `author`, `color`, `logo`, `website`, `email`, `category`, `is_public`, `allow_register`, `archived`, `approved`, `cdate`, `edate`) VALUES
(1, 'Web Design Project', '<p>Working on a cool new design! </p>', 232, '', '', '', '', '', 0, 0, 0, 1, 1357800209, 0),
(2, 'fdgfdgfdg', '<p>dfgfgfgfdgf</p>', 233, '', '', '', '', '', 0, 0, 0, 1, 1358245475, 1358245500);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_project_invitations`
--

DROP TABLE IF EXISTS `lekg5_pf_project_invitations`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_project_invitations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `inv_id` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_project_members`
--

DROP TABLE IF EXISTS `lekg5_pf_project_members`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_project_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `approved` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_projectid` (`project_id`),
  KEY `idx_userapproved` (`user_id`,`approved`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lekg5_pf_project_members`
--

INSERT INTO `lekg5_pf_project_members` (`id`, `project_id`, `user_id`, `approved`) VALUES
(1, 1, 62, 1),
(2, 1, 233, 1),
(3, 2, 233, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_sections`
--

DROP TABLE IF EXISTS `lekg5_pf_sections`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `enabled` int(1) NOT NULL,
  `score` int(11) NOT NULL,
  `flag` varchar(124) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `is_default` int(1) NOT NULL,
  `ordering` int(11) NOT NULL,
  `author` varchar(56) NOT NULL,
  `email` varchar(124) NOT NULL,
  `website` varchar(255) NOT NULL,
  `version` varchar(24) NOT NULL,
  `license` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `create_date` varchar(56) NOT NULL,
  `install_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `lekg5_pf_sections`
--

INSERT INTO `lekg5_pf_sections` (`id`, `name`, `title`, `enabled`, `score`, `flag`, `tags`, `is_default`, `ordering`, `author`, `email`, `website`, `version`, `license`, `copyright`, `create_date`, `install_date`) VALUES
(1, 'controlpanel', 'PFL_CONTROLPANEL', 1, 0, '', '-p', 1, 1, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0),
(2, 'projects', 'PROJECTS', 1, 0, '', '-p', 0, 2, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0),
(3, 'tasks', 'TASKS', 1, 1, '', '-l', 0, 3, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0),
(4, 'filemanager', 'FILEMANAGER', 1, 1, '', '-l', 0, 4, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0),
(5, 'calendar', 'CALENDAR', 1, 1, '', '-l', 0, 5, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0),
(6, 'profile', 'PROFILE', 1, 1, '', '-l', 0, 8, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0),
(7, 'groups', 'GROUPS', 1, 3, 'project_administrator', '-l', 0, 9, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0),
(8, 'users', 'USERS', 1, 6, 'project_administrator', '-l', 0, 10, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0),
(9, 'config', 'CONFIG', 1, 999, 'system_administrator', '-l', 0, 11, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0),
(10, 'board', 'BOARD', 1, 1, '', '-l', 0, 6, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0),
(11, 'time', 'TIME_TRACKING', 1, 1, '', '-ws', 0, 7, 'Tobias Kuhn', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_section_tasks`
--

DROP TABLE IF EXISTS `lekg5_pf_section_tasks`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_section_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `score` int(11) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `lekg5_pf_section_tasks`
--

INSERT INTO `lekg5_pf_section_tasks` (`id`, `section`, `name`, `title`, `description`, `score`, `flag`, `tags`, `parent`, `ordering`) VALUES
(1, 'tasks', 'form_new_task', 'PFL_T_TASKS_FNT', 'PFL_T_TASKS_FNT_DESC', 1, 'project_administrator', '-ws', '', 1),
(2, 'tasks', 'task_save_task', '', '', 0, '', '', 'form_new_task', 0),
(3, 'tasks', 'form_edit_task', 'PFL_T_TASKS_FET', 'PFL_T_TASKS_FET_DESC', 1, 'project_administrator', '-ws', '', 2),
(4, 'tasks', 'display_details', 'PFL_T_TASKS_DD', 'PFL_T_TASKS_DD_DESC', 1, '', '-l', '', 4),
(5, 'tasks', 'form_new_milestone', 'PFL_T_TASKS_FNM', 'PFL_T_TASKS_FNM_DESC', 1, 'project_administrator', '-ws', '', 5),
(6, 'tasks', 'form_edit_milestone', 'PFL_T_TASKS_FEM', 'PFL_T_TASKS_FEM_DESC', 1, 'project_administrator', '-ws', '', 6),
(7, 'tasks', 'task_delete', 'PFL_T_TASKS_TD', 'PFL_T_TASKS_TD_DESC', 1, 'project_administrator', '-a', '', 7),
(8, 'tasks', 'task_reorder', 'PFL_T_TASKS_TR', 'PFL_T_TASKS_TR_DESC', 1, 'project_administrator', '-l', '', 8),
(9, 'tasks', 'task_save_milestone', '', '', 0, '', '', 'form_new_milestone', 0),
(10, 'tasks', 'task_update_milestone', '', '', 0, '', '', 'form_edit_milestone', 0),
(11, 'tasks', 'task_update_task', '', '', 0, '', '', 'form_edit_task', 0),
(12, 'tasks', 'task_save_comment', 'PFL_T_TASKS_TSC', 'PFL_T_TASKS_TSC_DESC', 1, '', '-l', '', 9),
(13, 'tasks', 'form_edit_comment', 'PFL_T_TASKS_TEC', 'PFL_T_TASKS_TEC_DESC', 1, '', '-a', '', 10),
(14, 'tasks', 'task_update_comment', '', '', 0, '', '', 'form_edit_comment', 0),
(15, 'tasks', 'task_update_progress', '', '', 0, '', '', 'form_edit_task', 0),
(16, 'tasks', 'task_delete_comment', 'PFL_T_TASKS_TDC', 'PFL_T_TASKS_TDC_DESC', 1, '', '-a', '', 11),
(17, 'projects', 'form_new', 'PFL_T_PROJECTS_FN', 'PFL_T_PROJECTS_FN_DESC', 0, 'system_administrator', '-l', '', 1),
(18, 'projects', 'form_edit', 'PFL_T_PROJECTS_FE', 'PFL_T_PROJECTS_FE_DESC', 1, '', '-a', '', 3),
(19, 'projects', 'display_details', 'PFL_T_PROJECTS_DD', 'PFL_T_PROJECTS_DD_DESC', 0, '', '-p', '', 2),
(20, 'projects', 'task_save', '', '', 0, '', '', 'form_new', 0),
(21, 'projects', 'task_delete', 'PFL_T_PROJECTS_TD', 'PFL_T_PROJECTS_TD_DESC', 999, 'system_administrator', '-l', '', 4),
(22, 'projects', 'task_update', '', '', 0, '', '', 'form_edit', 0),
(23, 'projects', 'task_copy', 'PFL_T_PROJECTS_TC', 'PFL_T_PROJECTS_TC_DESC', 999, 'system_administrator', '-l', '', 5),
(24, 'projects', 'task_request_join', 'PFL_T_PROJECTS_TRJ', 'PFL_T_PROJECTS_TRJ_DESC', 1, '', '-l', '', 8),
(25, 'projects', 'task_archive', 'PFL_T_PROJECTS_TA', 'PFL_T_PROJECTS_TA_DESC', 999, 'project_administrator', '-l', '', 6),
(26, 'projects', 'task_activate', 'PFL_T_PROJECTS_TAC', 'PFL_T_PROJECTS_TAC_DESC', 999, 'project_administrator', '-l', '', 7),
(27, 'projects', 'task_approve', 'PFL_T_PROJECTS_TAP', 'PFL_T_PROJECTS_TAP_DESC', 999, 'system_administrator', '-l', '', 9),
(28, 'filemanager', 'form_new_folder', 'PFL_T_FM_FNFO', 'PFL_T_FM_FNFO_DESC', 1, '', '-ws', '', 1),
(29, 'filemanager', 'form_new_file', 'PFL_T_FM_FNFI', 'PFL_T_FM_FNFI_DESC', 1, '', '-ws', '', 2),
(30, 'filemanager', 'form_new_note', 'PFL_T_FM_FNN', 'PFL_T_FM_FNN_DESC', 1, '', '-ws', '', 3),
(31, 'filemanager', 'form_edit_folder', 'PFL_T_FM_FEFO', 'PFL_T_FM_FEFO_DESC', 1, '', '-l', '', 4),
(32, 'filemanager', 'form_edit_note', 'PFL_T_FM_FEN', 'PFL_T_FM_FEN_DESC', 1, '', '-l', '', 5),
(33, 'filemanager', 'form_edit_file', 'PFL_T_FM_FEFI', 'PFL_T_FM_FEFI_DESC', 1, '', '-l', '', 6),
(34, 'filemanager', 'task_delete', 'PFL_T_FM_TD', 'PFL_T_FM_TD_DESC', 1, '', '-a', '', 7),
(35, 'filemanager', 'task_save_folder', '', '', 0, '', '', 'form_new_folder', 0),
(36, 'filemanager', 'task_save_note', '', '', 0, '', '', 'form_new_note', 0),
(37, 'filemanager', 'task_save_file', '', '', 0, '', '', 'form_new_file', 0),
(38, 'filemanager', 'task_update_folder', '', '', 0, '', '', 'form_edit_folder', 0),
(39, 'filemanager', 'task_update_note', '', '', 0, '', '', 'form_edit_note', 0),
(40, 'filemanager', 'task_update_file', '', '', 0, '', '', 'form_edit_file', 0),
(41, 'filemanager', 'task_download', 'PFL_T_FM_TDO', 'PFL_T_FM_TDO_DESC', 1, '', '-l', '', 8),
(42, 'filemanager', 'display_note', 'PFL_T_FM_DN', 'PFL_T_FM_DN_DESC', 1, '', '-l', '', 9),
(43, 'filemanager', 'task_save_comment', 'PFL_T_FM_TSC', 'PFL_T_FM_TSC_DESC', 1, '', '-ws', '', 12),
(44, 'filemanager', 'form_edit_comment', 'PFL_T_FM_FEC', 'PFL_T_FM_FEC_DESC', 1, '', '-a', '', 13),
(45, 'filemanager', 'task_update_comment', '', '', 0, '', '', 'task_save_comment', 0),
(46, 'filemanager', 'task_delete_comment', 'PFL_T_FM_TDC', 'PFL_T_FM_TDC_DESC', 1, '', '-a', '', 14),
(47, 'calendar', 'display_month', 'PFL_T_CALENDAR_DM', 'PFL_T_CALENDAR_DM_DESC', 1, '', '-l', '', 1),
(48, 'calendar', 'display_week', 'PFL_T_CALENDAR_DW', 'PFL_T_CALENDAR_DW_DESC', 1, '', '-l', '', 2),
(49, 'calendar', 'display_day', 'PFL_T_CALENDAR_DD', 'PFL_T_CALENDAR_DD_DESC', 1, '', '-l', '', 3),
(50, 'calendar', 'form_new', 'PFL_T_CALENDAR_FN', 'PFL_T_CALENDAR_FN_DESC', 1, '', '-ws', '', 4),
(51, 'calendar', 'form_edit', 'PFL_T_CALENDAR_FE', 'PFL_T_CALENDAR_FE_DESC', 1, '', '-ws', '', 5),
(52, 'calendar', 'task_save', '', '', 0, '', '', 'form_new', 0),
(53, 'calendar', 'task_update', '', '', 0, '', '', 'form_edit', 0),
(54, 'calendar', 'task_delete', 'PFL_T_CALENDAR_TD', 'PFL_T_CALENDAR_TD_DESC', 1, 'project_administrator', '-a', '', 6),
(55, 'config', 'list_sections', 'PFL_T_CONFIG_LS', 'PFL_T_CONFIG_LS_DESC', 999, 'system_administrator', '-l', '', 1),
(56, 'config', 'list_panels', 'PFL_T_CONFIG_LP', 'PFL_T_CONFIG_LP_DESC', 999, 'system_administrator', '-l', '', 2),
(57, 'config', 'list_processes', 'PFL_T_CONFIG_LPC', 'PFL_T_CONFIG_LPC_DESC', 999, 'system_administrator', '-l', '', 3),
(58, 'config', 'list_mods', 'PFL_T_CONFIG_LM', 'PFL_T_CONFIG_LM_DESC', 999, 'system_administrator', '-l', '', 4),
(59, 'config', 'list_languages', 'PFL_T_CONFIG_LL', 'PFL_T_CONFIG_LL_DESC', 999, 'system_administrator', '-l', '', 5),
(60, 'config', 'list_themes', 'PFL_T_CONFIG_LT', 'PFL_T_CONFIG_LT_DESC', 999, 'system_administrator', '-l', '', 6),
(61, 'config', 'form_edit_section', 'PFL_T_CONFIG_FES', 'PFL_T_CONFIG_FES_DESC', 999, 'system_administrator', '-l', '', 7),
(62, 'config', 'form_edit_panel', 'PFL_T_CONFIG_FEP', 'PFL_T_CONFIG_FEP_DESC', 999, 'system_administrator', '-l', '', 8),
(63, 'config', 'form_edit_process', 'PFL_T_CONFIG_FEPC', 'PFL_T_CONFIG_FEPC_DESC', 999, 'system_administrator', '-l', '', 9),
(64, 'config', 'task_save_global', 'PFL_T_CONFIG_TSG', 'PFL_T_CONFIG_TSG_DESC', 999, 'system_administrator', '-l', '', 10),
(65, 'config', 'task_reorder', 'PFL_T_CONFIG_TR', 'PFL_T_CONFIG_TR_DESC', 999, 'system_administrator', '-l', '', 11),
(66, 'config', 'task_publish', 'PFL_T_CONFIG_TP', 'PFL_T_CONFIG_TP_DESC', 999, 'system_administrator', '-l', '', 12),
(67, 'config', 'task_unpublish', 'PFL_T_CONFIG_TU', 'PFL_T_CONFIG_TU_DESC', 999, 'system_administrator', '-l', '', 13),
(68, 'config', 'task_default_section', 'PFL_T_CONFIG_TDS', 'PFL_T_CONFIG_TDS_DESC', 999, 'system_administrator', '-l', '', 14),
(69, 'config', 'task_default_language', 'PFL_T_CONFIG_TDL', 'PFL_T_CONFIG_TDL_DESC', 999, 'system_administrator', '-l', '', 15),
(70, 'config', 'task_default_theme', 'PFL_T_CONFIG_TDT', 'PFL_T_CONFIG_TDT_DESC', 999, 'system_administrator', '-l', '', 16),
(71, 'config', 'task_update_section', '', '', 0, '', '', 'form_edit_section', 0),
(72, 'config', 'task_update_panel', '', '', 0, '', '', 'form_edit_panel', 0),
(73, 'config', 'task_update_process', '', '', 0, '', '', 'form_edit_process', 0),
(74, 'config', 'task_install', 'PFL_T_CONFIG_TI', 'PFL_T_CONFIG_TI_DESC', 999, 'system_administrator', '-l', '', 17),
(75, 'config', 'task_uninstall', 'PFL_T_CONFIG_TUI', 'PFL_T_CONFIG_TUI_DESC', 999, 'system_administrator', '-l', '', 18),
(76, 'board', 'display_details', 'PFL_T_BOARD_DD', 'PFL_T_BOARD_DD_DESC', 1, '', '-l', '', 1),
(77, 'board', 'form_new_topic', 'PFL_T_BOARD_FNT', 'PFL_T_BOARD_FNT_DESC', 1, '', '-ws', '', 2),
(78, 'board', 'form_edit_topic', 'PFL_T_BOARD_FET', 'PFL_T_BOARD_FET_DESC', 1, '', '-a', '', 4),
(79, 'board', 'form_edit_reply', 'PFL_T_BOARD_FER', 'PFL_T_BOARD_FER_DESC', 1, '', '-a', '', 5),
(80, 'board', 'task_save_topic', '', '', 0, '', '', 'form_new_topic', 0),
(81, 'board', 'task_save_reply', 'PFL_T_BOARD_TSR', 'PFL_T_BOARD_TSR_DESC', 1, '', '-a', '', 3),
(82, 'board', 'task_update_topic', '', '', 0, '', '', 'form_edit_topic', 0),
(83, 'board', 'task_update_reply', '', '', 0, '', '', 'form_edit_reply', 0),
(84, 'board', 'task_delete_topic', 'PFL_T_BOARD_TDT', 'PFL_T_BOARD_TDT_DESC', 1, '', '-a', '', 6),
(85, 'board', 'task_delete_reply', 'PFL_T_BOARD_TDR', 'PFL_T_BOARD_TDR_DESC', 1, '', '-a', '', 7),
(86, 'groups', 'form_new', 'PFL_T_GROUPS_FN', 'PFL_T_GROUPS_FN_DESC', 6, 'project_administrator', '-ws', '', 1),
(87, 'groups', 'form_edit', 'PFL_T_GROUPS_FE', 'PFL_T_GROUPS_FE_DESC', 6, 'project_administrator', '-l', '', 2),
(88, 'groups', 'task_save', '', '', 0, '', '', 'form_new', 0),
(89, 'groups', 'task_update', '', '', 0, '', '', 'form_edit', 0),
(90, 'groups', 'task_delete', 'PFL_T_GROUPS_TD', 'PFL_T_GROUPS_TD_DESC', 6, 'project_administrator', '-ws', '', 4),
(91, 'groups', 'task_copy', 'PFL_T_GROUPS_TC', 'PFL_T_GROUPS_TC_DESC', 6, 'project_administrator', '-ws', '', 3),
(92, 'profile', 'display_details', 'PFL_T_PROFILE_DD', 'PFL_T_PROFILE_DD_DESC', 0, '', '-l', '', 2),
(93, 'profile', 'task_update', 'PFL_T_PROFILE_TU', 'PFL_T_PROFILE_TU_DESC', 1, '', '-l', '', 1),
(94, 'users', 'list_accesslvl', 'PFL_T_USERS_LA', 'PFL_T_USERS_LA_DESC', 6, 'project_administrator', '-l', '', 1),
(95, 'users', 'list_requests', 'PFL_T_USERS_LR', 'PFL_T_USERS_LR_DESC', 6, 'project_administrator', '-ws', '', 7),
(96, 'users', 'form_new_accesslvl', 'PFL_T_USERS_FNA', 'PFL_T_USERS_FNA_DESC', 6, 'project_administrator', '-ws', '', 2),
(97, 'users', 'form_edit', 'PFL_T_USERS_FE', 'PFL_T_USERS_FE_DESC', 999, 'system_administrator', '-l', '', 5),
(98, 'users', 'form_edit_accesslvl', 'PFL_T_USERS_FEA', 'PFL_T_USERS_FEA_DESC', 6, 'project_administrator', '-l', '', 3),
(99, 'users', 'form_accept_request', '', '', 0, '', '', 'list_requests', 0),
(100, 'users', 'task_update', '', '', 0, '', '', 'form_edit', 0),
(101, 'users', 'task_save_accesslvl', '', '', 0, '', '', 'form_new_accesslvl', 0),
(102, 'users', 'task_update_accesslvl', '', '', 0, '', '', 'form_edit_accesslvl', 0),
(103, 'users', 'task_delete_accesslvl', 'PFL_T_USERS_TDA', 'PFL_T_USERS_TDA_DESC', 6, 'project_administrator', '-l', '', 4),
(104, 'users', 'task_delete', 'PFL_T_USERS_TD', 'PFL_T_USERS_TD_DESC', 999, 'system_administrator', '-ws', '', 6),
(105, 'users', 'task_accept_requests', '', '', 0, '', '', 'list_requests', 0),
(106, 'users', 'task_deny', '', '', 0, '', '', 'list_requests', 0),
(107, 'tasks', 'task_copy', 'PFL_T_TASKS_TC', 'PFL_T_TASKS_TC_DESC', 1, '', '-l', '', 9),
(108, 'config', 'form_edit_mod', 'PFL_T_CONFIG_FEM', 'PFL_T_CONFIG_FEM_DESC', 999, 'system_administrator', '-l', '', 0),
(109, 'projects', 'accept_invite', 'PFL_T_PROJECTS_AI', 'PFL_T_PROJECTS_AI_DESC', 1, '', '-l', '', 10),
(110, 'projects', 'decline_invite', 'PFL_T_PROJECTS_DI', 'PFL_T_PROJECTS_DI_DESC', 0, '', '-p', '', 11),
(111, 'users', 'form_invite', 'PFL_T_USERS_FI', 'PFL_T_USERS_FI_DESC', 6, 'project_administrator', '-ws', '', 8),
(112, 'users', 'task_invite', '', '', 0, '', '', 'form_invite', 0),
(113, 'users', 'form_new', 'PFL_T_USERS_FN', 'PFL_T_USERS_FN_DESC', 999, 'system_administrator', '-ws', '', 9),
(114, 'users', 'task_save', '', '', 0, '', '', 'form_new', 0),
(115, 'board', 'task_subscribe', 'PFL_T_BOARD_TS', 'PFL_T_BOARD_TS_DESC', 1, '', '-l', '', 8),
(116, 'board', 'task_unsubscribe', 'PFL_T_BOARD_TU', 'PFL_T_BOARD_TU_DESC', 1, '', '-l', '', 9),
(117, 'filemanager', 'list_move', 'PFL_T_FM_LM', 'PFL_T_FM_LM_DESC', 1, '', '-l', '', 11),
(118, 'filemanager', 'task_move', '', '', 0, '', '', 'list_move', 0),
(119, 'time', 'form_new', 'PFL_TI_FN', 'PFL_TI_FN_DESC', 1, '', '-ws', '', 1),
(120, 'time', 'form_edit', 'PFL_TI_FE', 'PFL_TI_FE_DESC', 1, '', '-ws', '', 2),
(121, 'time', 'task_update', '', '', 0, '', '', 'form_edit', 0),
(122, 'time', 'task_save', '', '', 0, '', '', 'form_new', 0),
(123, 'time', 'task_delete', 'PFL_TI_TD', 'PFL_TI_TD_DESC', 1, '', '-ws', '', 3),
(124, 'config', 'form_edit_theme', 'PFL_T_CONFIG_FET', 'PFL_T_CONFIG_FET_DESC', 999, 'system_administrator', '-l', '', 19),
(125, 'config', 'task_update_theme', '', '', 0, '', '', 'form_edit_theme', 0),
(126, 'config', 'task_update_mod', '', '', 0, '', '', 'form_edit_mod', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_settings`
--

DROP TABLE IF EXISTS `lekg5_pf_settings`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parameter` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `scope` varchar(124) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_scope` (`scope`(12)),
  KEY `idx_paramscope` (`parameter`(12),`scope`(12)),
  KEY `idx_parameter` (`parameter`(12))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=196 ;

--
-- Dumping data for table `lekg5_pf_settings`
--

INSERT INTO `lekg5_pf_settings` (`id`, `parameter`, `content`, `scope`) VALUES
(1, 'debug', '', 'system'),
(2, 'debug_panels', '', 'system'),
(3, 'hide_template', '', 'system'),
(4, 'date_format', 'm/d/Y', 'system'),
(5, 'accesslevel_1', '1', 'system'),
(6, 'accesslevel_2', '2', 'system'),
(7, 'accesslevel_3', '3', 'system'),
(8, 'accesslevel_4', '4', 'system'),
(9, 'accesslevel_5', '5', 'system'),
(10, 'accesslevel_6', '6', 'system'),
(11, 'accesslevel_7', '7', 'system'),
(12, 'accesslevel_8', '8', 'system'),
(13, 'accesslevel_pa', '9', 'system'),
(14, 'accesslevel_pm', '10', 'system'),
(15, 'use_wizard', '1', 'system'),
(16, 'group_1', '1', 'system'),
(17, 'group_2', '2', 'system'),
(18, 'group_3', '3', 'system'),
(19, 'group_4', '4', 'system'),
(20, 'group_5', '5', 'system'),
(21, 'group_6', '6', 'system'),
(22, 'group_7', '7', 'system'),
(23, 'group_8', '8', 'system'),
(24, 'group_pa', '9', 'system'),
(25, 'group_pm', '10', 'system'),
(26, 'display_avatar', '1', 'system'),
(27, 'tooltip_restricted', '1', 'system'),
(28, 'panel_edit', '1', 'system'),
(29, '12hclock', '1', 'system'),
(30, 'edit_lightbox', '1', 'system'),
(31, 'upload_path', '/images/com_projectfork/filemanager', 'filemanager'),
(32, 'logo_save_path', '/images/com_projectfork/projects/logos', 'projects'),
(33, 'feed_url', 'http://feeds.feedburner.com/projectfork/blog', 'cp_news'),
(34, 'total', '4', 'cp_news'),
(35, 'read_more', '1', 'cp_news'),
(36, 'allow_color', '1', 'projects'),
(37, 'allow_logo', '1', 'projects'),
(38, 'max_w', '120', 'projects'),
(39, 'max_h', '30', 'projects'),
(40, 'default_logo', 'logo.png', 'theme_logo'),
(41, 'use_milestones', '1', 'tasks'),
(42, 'delete_ms_tasks', '1', 'tasks'),
(43, 'use_editor', '1', 'tasks'),
(44, 'uncat_tasks', '1', 'tasks'),
(45, 'use_editor', '1', 'projects'),
(46, 'use_editor', '1', 'calendar'),
(47, 'copy_milestone_tasks', '1', 'tasks'),
(48, 'use_editor', '1', 'filemanager'),
(49, 'attach_folders', '1', 'filemanager'),
(50, 'attach_files', '1', 'filemanager'),
(51, 'attach_notes', '1', 'filemanager'),
(52, 'notify_author', '1', 'tasks'),
(53, 'notify_assigned', '1', 'tasks'),
(54, 'notify_members', '1', 'tasks'),
(55, 'limit', '10', 'cp_tasks'),
(56, 'ob', 't.title', 'cp_tasks'),
(57, 'od', 'DESC', 'cp_tasks'),
(58, 'plink', '1', 'cp_tasks'),
(59, 'tlink', '1', 'cp_tasks'),
(60, 'use_comments', '1', 'tasks'),
(61, 'list_comments', '1', 'tasks'),
(62, 'list_quick_finish', '1', 'tasks'),
(63, 'list_quick_progress', '1', 'tasks'),
(64, 'use_progpercent', '0', 'tasks'),
(65, 'use_reset', '0', 'demo'),
(66, 'reset_intervall', '12', 'demo'),
(67, 'last_reset', '1223128181', 'demo'),
(68, 'display_projects', '1', 'calendar'),
(69, 'display_milestones', '1', 'calendar'),
(70, 'display_tasks', '1', 'calendar'),
(71, 'project_bg', 'D2E0FF', 'calendar'),
(72, 'milestone_bg', 'FFFD6F', 'calendar'),
(73, 'task_bg', 'A3FF91', 'calendar'),
(74, 'allow_phone', '1', 'profile'),
(75, 'allow_mphone', '1', 'profile'),
(76, 'allow_skype', '1', 'profile'),
(77, 'allow_msn', '1', 'profile'),
(78, 'allow_street', '1', 'profile'),
(79, 'allow_city', '1', 'profile'),
(80, 'allow_zip', '1', 'profile'),
(81, 'allow_upload', '1', 'profile'),
(82, 'upload_path', '/images/com_projectfork/profile', 'profile'),
(83, 'max_w', '80', 'profile'),
(84, 'max_h', '80', 'profile'),
(85, 'plink', '1', 'cp_events'),
(86, 'limit', '10', 'cp_events'),
(87, 'ob', 'e.edate', 'cp_events'),
(88, 'od', 'ASC', 'cp_events'),
(89, 'author', '1', 'cp_events'),
(90, 'use_editor', '1', 'board'),
(91, 'preview', '1', 'board'),
(92, 'approve_new', '0', 'projects'),
(93, 'copy_tasks', '1', 'projects'),
(94, 'copy_milestones', '1', 'projects'),
(95, 'copy_groups', '1', 'projects'),
(96, 'copy_users', '1', 'projects'),
(97, 'notify_on_create', '1', 'tasks'),
(98, 'notify_on_update', '1', 'tasks'),
(99, 'notify_on_comment', '1', 'tasks'),
(100, 'tlink', '1', 'project_tasks'),
(101, 'limit', '10', 'project_tasks'),
(102, 'ob', 't.cdate', 'project_tasks'),
(103, 'od', 'ASC', 'project_tasks'),
(104, 'assigned', '1', 'project_tasks'),
(105, 'status', '0', 'project_tasks'),
(106, 'priority', '0', 'project_tasks'),
(107, 'tooltip_help', '1', 'system'),
(108, 'assigned', '1', 'cp_tasks'),
(109, 'status', '0', 'cp_tasks'),
(110, 'priority', '0', 'cp_tasks'),
(111, 'use_ce', '0', 'comments'),
(112, 'html_emails', '1', 'system'),
(113, 'notify_new_task_subject', '', 'tasks'),
(114, 'notify_update_task_subject', '', 'tasks'),
(115, 'notify_new_ms_subject', '', 'tasks'),
(116, 'notify_update_ms_subject', '', 'tasks'),
(117, 'notify_new_comment_subject', '', 'tasks'),
(118, 'notify_task_body', '', 'tasks'),
(119, 'notify_ms_body', '', 'tasks'),
(120, 'notify_task_comment_body', '', 'tasks'),
(121, 'show_title', '1', 'system_console'),
(122, 'override_title', 'PFL_CONSOLE', 'system_console'),
(123, 'show_title', '1', 'cp_news'),
(124, 'override_title', 'PFL_NEWS', 'cp_news'),
(125, 'show_title', '1', 'cp_events'),
(126, 'override_title', 'PFL_EVENTS', 'cp_events'),
(127, 'show_title', '1', 'cp_tasks'),
(128, 'override_title', '', 'cp_tasks'),
(129, 'show_title', '1', 'note_info'),
(130, 'override_title', '', 'note_info'),
(131, 'show_title', '1', 'note_comments'),
(132, 'override_title', 'PFL_COMMENTS', 'note_comments'),
(133, 'show_title', '1', 'note_details'),
(134, 'override_title', '', 'note_details'),
(135, 'show_title', '1', 'profile_user'),
(136, 'override_title', '', 'profile_user'),
(137, 'show_title', '1', 'profile_contact'),
(138, 'override_title', '', 'profile_contact'),
(139, 'show_title', '1', 'profile_location'),
(140, 'override_title', '', 'profile_location'),
(141, 'show_title', '1', 'project_desc'),
(142, 'override_title', '', 'project_desc'),
(143, 'invite_select', '1', 'projects'),
(144, 'show_title', '1', 'task_tracking'),
(145, 'override_title', '', 'task_tracking'),
(146, 'show_title', '1', 'cp_project'),
(147, 'override_title', '', 'cp_project'),
(148, 'show_title', '0', 'quicklink_version'),
(149, 'override_title', 'PFL_VERSION', 'quicklink_version'),
(150, 'show_title', '0', 'quicklink_project'),
(151, 'override_title', 'PFL_YOUR_WORKSPACES', 'quicklink_project'),
(152, 'show_title', '0', 'theme_logo'),
(153, 'override_title', '', 'theme_logo'),
(154, 'show_title', '1', 'project_details'),
(155, 'override_title', '', 'project_details'),
(156, 'show_title', '1', 'project_tasks'),
(157, 'override_title', '', 'project_tasks'),
(158, 'show_title', '1', 'project_logo'),
(159, 'override_title', '', 'project_logo'),
(160, 'show_title', '1', 'project_join'),
(161, 'override_title', 'PFL_JOIN', 'project_join'),
(162, 'show_title', '1', 'task_content'),
(163, 'override_title', '', 'task_content'),
(164, 'show_title', '1', 'task_comments'),
(165, 'override_title', 'PFL_COMMENTS', 'task_comments'),
(166, 'show_title', '1', 'task_details'),
(167, 'override_title', '', 'task_details'),
(168, 'show_title', '1', 'task_attachments'),
(169, 'override_title', 'PFL_ATTACHMENTS', 'task_attachments'),
(170, 'show_title', '1', 'time_tracking'),
(171, 'override_title', 'PFL_TRACK_PANEL', 'time_tracking'),
(172, 'show_title', '1', 'cp_weblinks'),
(173, 'override_title', '', 'cp_weblinks'),
(174, 'clinks', 'Joomla Website | http://joomla.org', 'cp_weblinks'),
(175, 'pflinks', '1', 'cp_weblinks'),
(176, 'hide_sidebar', '0', 'theme_default'),
(177, 'switch_sidebar', '1', 'theme_default'),
(178, 'allow_twitter', '1', 'profile'),
(179, 'allow_friendfeed', '1', 'profile'),
(180, 'allow_linkedin', '1', 'profile'),
(181, 'allow_facebook', '1', 'profile'),
(182, 'allow_youtube', '1', 'profile'),
(183, 'allow_vimeo', '1', 'profile'),
(184, 'use_demo_sql', '0', 'demo'),
(185, 'demo_user', '63', 'demo'),
(186, 'interval', '7', 'dbopt'),
(187, 'show_title', '1', 'cp_installer'),
(188, 'version_num', '3010', 'system'),
(189, 'version_state', 'Stable', 'system'),
(190, 'secret_number', '649', 'system'),
(191, 'installed', '1', 'system'),
(192, 'optdate', '1357800213', 'dbopt'),
(193, 'use_cats', '1', 'projects'),
(194, 'cats', '', 'projects'),
(195, 'hide_ms_empty', '1', 'tasks');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_tasks`
--

DROP TABLE IF EXISTS `lekg5_pf_tasks`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(124) NOT NULL,
  `content` text NOT NULL,
  `author` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `cdate` int(11) NOT NULL,
  `mdate` int(11) NOT NULL,
  `sdate` int(11) NOT NULL,
  `edate` int(11) NOT NULL,
  `progress` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `milestone` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_project` (`project`),
  KEY `idx_author` (`author`),
  KEY `idx_progress` (`progress`),
  KEY `idx_priority` (`priority`),
  KEY `idx_milestone` (`milestone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `lekg5_pf_tasks`
--

INSERT INTO `lekg5_pf_tasks` (`id`, `title`, `content`, `author`, `project`, `cdate`, `mdate`, `sdate`, `edate`, `progress`, `priority`, `milestone`, `ordering`) VALUES
(1, 'Setup meeting', '', 232, 1, 1357800209, 1357800209, 1357800209, 0, 0, 0, 1, 1),
(2, 'Initial Statement of Work', '', 232, 1, 1357800209, 1357800209, 1357800209, 0, 0, 0, 1, 2),
(3, 'Finalize Statement of Work', '', 232, 1, 1357800209, 1357800209, 1357800209, 0, 0, 0, 1, 3),
(4, 'Invite team to project manager', '', 232, 1, 1357800209, 1357800209, 1357800209, 0, 0, 0, 1, 4),
(5, 'Define target audience', '', 232, 1, 1357800209, 1357800209, 1357800209, 0, 0, 0, 2, 1),
(6, 'Research competing sites and similar verticals', '', 232, 1, 1357800209, 1357800209, 1357800209, 0, 0, 0, 2, 2),
(7, 'Deliver preliminary design(s)', '', 232, 1, 1357800209, 1357800209, 1357800209, 1249686000, 0, 0, 2, 3),
(8, 'Revise design', '', 232, 1, 1248106627, 0, 1357800209, 1357800209, 1357800209, 0, 2, 4),
(9, 'Deliver final homepage design', '', 232, 1, 1357800209, 1357800209, 1357800209, 1250118000, 0, 0, 2, 5),
(10, 'Slice up html/css page', '', 232, 1, 1357800209, 1357800209, 1357800209, 0, 0, 0, 3, 1),
(11, 'Convert html page to template', '', 232, 1, 1357800209, 1357800209, 1357800209, 0, 0, 0, 3, 2),
(12, 'Add core Joomla! CSS', '', 232, 1, 1357800209, 1357800209, 1357800209, 1357800209, 0, 0, 3, 3),
(13, 'Add 3rd party extensions CSS', '', 232, 1, 1357800209, 0, 1248106827, 1357800209, 0, 0, 3, 4),
(14, 'Create conditionals for alternate homepage layout', '', 62, 1, 1357800209, 1357800209, 1248106848, 0, 0, 0, 3, 5),
(15, 'Deliver custom Joomla! template', '', 232, 1, 1357800209, 1357800209, 1357800209, 1251500400, 0, 0, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_task_attachments`
--

DROP TABLE IF EXISTS `lekg5_pf_task_attachments`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_task_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `attach_id` int(11) NOT NULL,
  `attach_type` varchar(24) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lekg5_pf_task_attachments`
--

INSERT INTO `lekg5_pf_task_attachments` (`id`, `task_id`, `attach_id`, `attach_type`) VALUES
(1, 16, 1, 'folder');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_task_users`
--

DROP TABLE IF EXISTS `lekg5_pf_task_users`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_task_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sdate` int(11) NOT NULL,
  `edate` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_userid` (`user_id`),
  KEY `idx_taskid` (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_themes`
--

DROP TABLE IF EXISTS `lekg5_pf_themes`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `enabled` int(1) NOT NULL,
  `is_default` int(1) NOT NULL,
  `author` varchar(56) NOT NULL,
  `email` varchar(124) NOT NULL,
  `website` varchar(255) NOT NULL,
  `version` varchar(24) NOT NULL,
  `license` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `create_date` varchar(56) NOT NULL,
  `install_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lekg5_pf_themes`
--

INSERT INTO `lekg5_pf_themes` (`id`, `name`, `title`, `enabled`, `is_default`, `author`, `email`, `website`, `version`, `license`, `copyright`, `create_date`, `install_date`) VALUES
(1, 'default', 'Default Theme', 1, 1, 'Kyle Ledbetter', '', 'http://www.projectfork.net', '3000', 'GNU/General Public License', 'Copyright (C) 2006-2010 Tobias Kuhn', '2010', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_time_tracking`
--

DROP TABLE IF EXISTS `lekg5_pf_time_tracking`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_time_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `cdate` int(11) NOT NULL,
  `timelog` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task` (`task_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lekg5_pf_time_tracking`
--

INSERT INTO `lekg5_pf_time_tracking` (`id`, `task_id`, `project_id`, `user_id`, `content`, `cdate`, `timelog`) VALUES
(1, 3, 1, 232, 'Core styles included', 1357800209, 60),
(2, 2, 1, 232, 'Rough pass', 1357800209, 120),
(3, 4, 1, 232, 'Projectfork made it easy!', 1357800209, 15),
(4, 5, 1, 232, 'Researching tons of sites', 1357800209, 140),
(5, 2, 1, 233, '', 1358182800, 720),
(6, 2, 1, 233, '', 1358182800, 195);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_topics`
--

DROP TABLE IF EXISTS `lekg5_pf_topics`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(124) NOT NULL,
  `content` text NOT NULL,
  `author` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `cdate` int(11) NOT NULL,
  `edate` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project` (`project`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lekg5_pf_topics`
--

INSERT INTO `lekg5_pf_topics` (`id`, `title`, `content`, `author`, `project`, `cdate`, `edate`) VALUES
(1, 'Functional Specs', '<p>Our understanding is that this Joomla! template must work with:</p><ul><li>Core Joomla! featureset</li><li>JCal Pro</li><li>Kunena</li><li>Community Builder</li><li>Phoca Gallery </li></ul> <p>If there are any others needed, please submit a change request. </p>', 232, 1, 1357800209, 1357800209);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_topic_replies`
--

DROP TABLE IF EXISTS `lekg5_pf_topic_replies`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_topic_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(124) NOT NULL,
  `content` text NOT NULL,
  `author` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `topic` int(11) NOT NULL,
  `cdate` int(11) NOT NULL,
  `edate` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project` (`project`,`topic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_topic_subscriptions`
--

DROP TABLE IF EXISTS `lekg5_pf_topic_subscriptions`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_topic_subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_user_access_level`
--

DROP TABLE IF EXISTS `lekg5_pf_user_access_level`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_user_access_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accesslvl` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lekg5_pf_user_access_level`
--

INSERT INTO `lekg5_pf_user_access_level` (`id`, `accesslvl`, `user_id`, `project_id`) VALUES
(1, -1, 233, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_pf_user_profile`
--

DROP TABLE IF EXISTS `lekg5_pf_user_profile`;
CREATE TABLE IF NOT EXISTS `lekg5_pf_user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `parameter` varchar(64) NOT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_param` (`user_id`,`parameter`(10)),
  KEY `idx_userid` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `lekg5_pf_user_profile`
--

INSERT INTO `lekg5_pf_user_profile` (`id`, `user_id`, `parameter`, `content`) VALUES
(1, 232, 'workspace', '1'),
(2, 232, 'language', 'english'),
(3, 232, 'projectlist_ob', 'p.id'),
(4, 232, 'projectlist_od', 'ASC'),
(5, 232, 'projectlist_status', '0'),
(6, 232, 'projectlist_limit', '50'),
(7, 232, 'projectlist_category', ''),
(8, 232, 'timelist_ob', 'ti.id'),
(9, 232, 'timelist_od', 'ASC'),
(10, 232, 'timelist_limit', '50'),
(11, 232, 'timelist_task', '1'),
(12, 232, 'timelist_user', '0'),
(13, 232, 'userlist_ob', 'u.id'),
(14, 232, 'userlist_od', 'ASC'),
(15, 232, 'userlist_limit', '50'),
(16, 232, 'tasklist_ob', 't.ordering,t.title'),
(17, 232, 'tasklist_od', 'ASC'),
(18, 232, 'tasklist_status', '0'),
(19, 232, 'tasklist_assigned', '0'),
(20, 232, 'tasklist_priority', '0'),
(21, 232, 'tasklist_ms_1', '0'),
(22, 232, 'tasklist_limit', '50'),
(23, 233, 'accesslevel', ''),
(24, 233, 'timezone', ''),
(25, 233, 'language', 'english'),
(26, 233, 'phone', ''),
(27, 233, 'mobile_phone', ''),
(28, 233, 'skype', ''),
(29, 233, 'msn', ''),
(30, 233, 'icq', ''),
(31, 233, 'street', ''),
(32, 233, 'city', ''),
(33, 233, 'zip', ''),
(34, 233, 'groups', ''),
(35, 233, 'avatar', ''),
(36, 233, 'workspace', '1'),
(37, 233, 'projectlist_ob', 'p.id'),
(38, 233, 'projectlist_od', 'ASC'),
(39, 233, 'projectlist_status', '0'),
(40, 233, 'projectlist_limit', '0'),
(41, 233, 'projectlist_category', ''),
(42, 233, 'tasklist_ob', 't.ordering,t.title'),
(43, 233, 'tasklist_od', 'ASC'),
(44, 233, 'tasklist_status', '0'),
(45, 233, 'tasklist_assigned', '2'),
(46, 233, 'tasklist_priority', '0'),
(47, 233, 'tasklist_ms_1', '0'),
(48, 233, 'tasklist_limit', '50'),
(49, 233, 'timelist_ob', 'ti.id'),
(50, 233, 'timelist_od', 'ASC'),
(51, 233, 'timelist_limit', '50'),
(52, 233, 'timelist_task', '0'),
(53, 233, 'timelist_user', '0'),
(54, 233, 'boardlist_ob', 'last_active'),
(55, 233, 'boardlist_od', 'DESC'),
(56, 233, 'boardlist_limit', '50'),
(57, 233, 'tasklist_ms_2', '0');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_redirect_links`
--

DROP TABLE IF EXISTS `lekg5_redirect_links`;
CREATE TABLE IF NOT EXISTS `lekg5_redirect_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `old_url` varchar(255) NOT NULL,
  `new_url` varchar(255) NOT NULL,
  `referer` varchar(150) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_link_old` (`old_url`),
  KEY `idx_link_modifed` (`modified_date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lekg5_redirect_links`
--

INSERT INTO `lekg5_redirect_links` (`id`, `old_url`, `new_url`, `referer`, `comment`, `hits`, `published`, `created_date`, `modified_date`) VALUES
(1, 'http://localhost/joomla25/index.php/en/vi', '', '', '', 1, 0, '2013-01-05 09:44:41', '0000-00-00 00:00:00'),
(2, 'http://localhost/joomla25/index.php/vi/home', '', 'http://localhost/joomla25/index.php/en/home', '', 4, 0, '2013-01-05 10:02:40', '0000-00-00 00:00:00'),
(3, 'http://localhost/joomla25/index.php/vi/l', '', '', '', 1, 0, '2013-01-05 10:24:07', '0000-00-00 00:00:00'),
(4, 'http://localhost/joomla25/index.php/en/2-danh-muc-khac', '', 'http://localhost/joomla25/index.php/vi/2-danh-muc-khac', '', 1, 0, '2013-01-05 10:25:39', '0000-00-00 00:00:00'),
(5, 'http://localhost/joomla25/index.php/vi/2-danh-muc-khac', '', 'http://localhost/joomla25/index.php/vi/', '', 1, 0, '2013-01-05 10:26:26', '0000-00-00 00:00:00'),
(6, 'http://localhost/joomla25/index.php/vi/2-uncategorised', '', 'http://localhost/joomla25/index.php/en/2-uncategorised', '', 1, 0, '2013-01-05 10:26:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_schemas`
--

DROP TABLE IF EXISTS `lekg5_schemas`;
CREATE TABLE IF NOT EXISTS `lekg5_schemas` (
  `extension_id` int(11) NOT NULL,
  `version_id` varchar(20) NOT NULL,
  PRIMARY KEY (`extension_id`,`version_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lekg5_schemas`
--

INSERT INTO `lekg5_schemas` (`extension_id`, `version_id`) VALUES
(700, '2.5.8');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_session`
--

DROP TABLE IF EXISTS `lekg5_session`;
CREATE TABLE IF NOT EXISTS `lekg5_session` (
  `session_id` varchar(200) NOT NULL DEFAULT '',
  `client_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `guest` tinyint(4) unsigned DEFAULT '1',
  `time` varchar(14) DEFAULT '',
  `data` mediumtext,
  `userid` int(11) DEFAULT '0',
  `username` varchar(150) DEFAULT '',
  `usertype` varchar(50) DEFAULT '',
  PRIMARY KEY (`session_id`),
  KEY `whosonline` (`guest`,`usertype`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lekg5_session`
--

INSERT INTO `lekg5_session` (`session_id`, `client_id`, `guest`, `time`, `data`, `userid`, `username`, `usertype`) VALUES
('t6u7cm67q1ohhq8nc3h9d0hul0', 0, 1, '1358306953', '__default|a:9:{s:15:"session.counter";i:3;s:19:"session.timer.start";i:1358306941;s:18:"session.timer.last";i:1358306943;s:17:"session.timer.now";i:1358306951;s:22:"session.client.browser";s:123:"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11 AlexaToolbar/alxg-3.1";s:8:"registry";O:9:"JRegistry":1:{s:7:"\0*\0data";O:8:"stdClass":1:{s:15:"com_projectfork";O:8:"stdClass":1:{s:7:"profile";O:8:"stdClass":1:{s:8:"language";s:7:"english";}}}}s:4:"user";O:5:"JUser":25:{s:9:"\0*\0isRoot";b:0;s:2:"id";i:0;s:4:"name";N;s:8:"username";N;s:5:"email";N;s:8:"password";N;s:14:"password_clear";s:0:"";s:8:"usertype";N;s:5:"block";N;s:9:"sendEmail";i:0;s:12:"registerDate";N;s:13:"lastvisitDate";N;s:10:"activation";N;s:6:"params";N;s:6:"groups";a:0:{}s:5:"guest";i:1;s:13:"lastResetTime";N;s:10:"resetCount";N;s:10:"\0*\0_params";O:9:"JRegistry":1:{s:7:"\0*\0data";O:8:"stdClass":0:{}}s:14:"\0*\0_authGroups";a:1:{i:0;i:1;}s:14:"\0*\0_authLevels";a:2:{i:0;i:1;i:1;i:1;}s:15:"\0*\0_authActions";N;s:12:"\0*\0_errorMsg";N;s:10:"\0*\0_errors";a:0:{}s:3:"aid";i:0;}s:16:"com_mailto.links";a:1:{s:40:"b5d487e94e79bebcf0cca22dd8472b8ebb7beed1";O:8:"stdClass":2:{s:4:"link";s:39:"http://localhost/joomla25/index.php/en/";s:6:"expiry";i:1358306945;}}s:13:"session.token";s:32:"7e7737b293721da4cbac0347ad464526";}pf_messages|a:0:{}', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_template_styles`
--

DROP TABLE IF EXISTS `lekg5_template_styles`;
CREATE TABLE IF NOT EXISTS `lekg5_template_styles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `template` varchar(50) NOT NULL DEFAULT '',
  `client_id` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `home` char(7) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_template` (`template`),
  KEY `idx_home` (`home`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lekg5_template_styles`
--

INSERT INTO `lekg5_template_styles` (`id`, `template`, `client_id`, `home`, `title`, `params`) VALUES
(2, 'bluestork', 1, '1', 'Bluestork - Default', '{"useRoundedCorners":"1","showSiteName":"0"}'),
(3, 'atomic', 0, '0', 'Atomic - Default', '{}'),
(4, 'beez_20', 0, '0', 'Beez2 - Default', '{"wrapperSmall":"53","wrapperLarge":"72","logo":"images\\/joomla_black.gif","sitetitle":"Joomla!","sitedescription":"Open Source Content Management","navposition":"left","templatecolor":"personal","html5":"0"}'),
(5, 'hathor', 1, '0', 'Hathor - Default', '{"showSiteName":"0","colourChoice":"","boldText":"0"}'),
(6, 'beez5', 0, '1', 'Beez5 - Default', '{"wrapperSmall":"53","wrapperLarge":"72","logo":"images\\/sampledata\\/fruitshop\\/fruits.gif","sitetitle":"Joomla!","sitedescription":"Open Source Content Management","navposition":"left","html5":"0"}');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_updates`
--

DROP TABLE IF EXISTS `lekg5_updates`;
CREATE TABLE IF NOT EXISTS `lekg5_updates` (
  `update_id` int(11) NOT NULL AUTO_INCREMENT,
  `update_site_id` int(11) DEFAULT '0',
  `extension_id` int(11) DEFAULT '0',
  `categoryid` int(11) DEFAULT '0',
  `name` varchar(100) DEFAULT '',
  `description` text NOT NULL,
  `element` varchar(100) DEFAULT '',
  `type` varchar(20) DEFAULT '',
  `folder` varchar(20) DEFAULT '',
  `client_id` tinyint(3) DEFAULT '0',
  `version` varchar(10) DEFAULT '',
  `data` text NOT NULL,
  `detailsurl` text NOT NULL,
  `infourl` text NOT NULL,
  PRIMARY KEY (`update_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Available Updates' AUTO_INCREMENT=64 ;

--
-- Dumping data for table `lekg5_updates`
--

INSERT INTO `lekg5_updates` (`update_id`, `update_site_id`, `extension_id`, `categoryid`, `name`, `description`, `element`, `type`, `folder`, `client_id`, `version`, `data`, `detailsurl`, `infourl`) VALUES
(1, 3, 0, 0, 'Armenian', '', 'pkg_hy-AM', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/hy-AM_details.xml', ''),
(2, 3, 0, 0, 'Danish', '', 'pkg_da-DK', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/da-DK_details.xml', ''),
(3, 3, 0, 0, 'Khmer', '', 'pkg_km-KH', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/km-KH_details.xml', ''),
(4, 3, 0, 0, 'Swedish', '', 'pkg_sv-SE', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/sv-SE_details.xml', ''),
(5, 3, 0, 0, 'Hungarian', '', 'pkg_hu-HU', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/hu-HU_details.xml', ''),
(6, 3, 0, 0, 'Bulgarian', '', 'pkg_bg-BG', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/bg-BG_details.xml', ''),
(7, 3, 0, 0, 'French', '', 'pkg_fr-FR', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/fr-FR_details.xml', ''),
(8, 3, 0, 0, 'Italian', '', 'pkg_it-IT', 'package', '', 0, '2.5.8.2', '', 'http://update.joomla.org/language/details/it-IT_details.xml', ''),
(9, 3, 0, 0, 'Spanish', '', 'pkg_es-ES', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/es-ES_details.xml', ''),
(10, 3, 0, 0, 'Dutch', '', 'pkg_nl-NL', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/nl-NL_details.xml', ''),
(11, 3, 0, 0, 'Turkish', '', 'pkg_tr-TR', 'package', '', 0, '2.5.7.2', '', 'http://update.joomla.org/language/details/tr-TR_details.xml', ''),
(12, 3, 0, 0, 'Ukrainian', '', 'pkg_uk-UA', 'package', '', 0, '2.5.7.2', '', 'http://update.joomla.org/language/details/uk-UA_details.xml', ''),
(13, 3, 0, 0, 'Indonesian', '', 'pkg_id-ID', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/id-ID_details.xml', ''),
(14, 3, 0, 0, 'Slovak', '', 'pkg_sk-SK', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/sk-SK_details.xml', ''),
(15, 3, 0, 0, 'Belarusian', '', 'pkg_be-BY', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/be-BY_details.xml', ''),
(16, 3, 0, 0, 'Latvian', '', 'pkg_lv-LV', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/lv-LV_details.xml', ''),
(17, 3, 0, 0, 'Belarusian', '', 'pkg_be-BY', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/be-BY_details.xml', ''),
(18, 3, 0, 0, 'Estonian', '', 'pkg_et-EE', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/et-EE_details.xml', ''),
(19, 3, 0, 0, 'Romanian', '', 'pkg_ro-RO', 'package', '', 0, '2.5.5.3', '', 'http://update.joomla.org/language/details/ro-RO_details.xml', ''),
(20, 3, 0, 0, 'Flemish', '', 'pkg_nl-BE', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/nl-BE_details.xml', ''),
(21, 3, 0, 0, 'Macedonian', '', 'pkg_mk-MK', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/mk-MK_details.xml', ''),
(22, 3, 0, 0, 'Japanese', '', 'pkg_ja-JP', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/ja-JP_details.xml', ''),
(23, 3, 0, 0, 'Serbian Latin', '', 'pkg_sr-YU', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/sr-YU_details.xml', ''),
(24, 3, 0, 0, 'Arabic Unitag', '', 'pkg_ar-AA', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/ar-AA_details.xml', ''),
(25, 3, 0, 0, 'German', '', 'pkg_de-DE', 'package', '', 0, '2.5.8.2', '', 'http://update.joomla.org/language/details/de-DE_details.xml', ''),
(26, 3, 0, 0, 'Norwegian Bokmal', '', 'pkg_nb-NO', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/nb-NO_details.xml', ''),
(27, 3, 0, 0, 'English AU', '', 'pkg_en-AU', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/en-AU_details.xml', ''),
(28, 3, 0, 0, 'English US', '', 'pkg_en-US', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/en-US_details.xml', ''),
(29, 3, 0, 0, 'Serbian Cyrillic', '', 'pkg_sr-RS', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/sr-RS_details.xml', ''),
(30, 3, 0, 0, 'Lithuanian', '', 'pkg_lt-LT', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/lt-LT_details.xml', ''),
(31, 3, 0, 0, 'Albanian', '', 'pkg_sq-AL', 'package', '', 0, '2.5.1.5', '', 'http://update.joomla.org/language/details/sq-AL_details.xml', ''),
(32, 3, 0, 0, 'Persian', '', 'pkg_fa-IR', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/fa-IR_details.xml', ''),
(33, 3, 0, 0, 'Galician', '', 'pkg_gl-ES', 'package', '', 0, '2.5.7.4', '', 'http://update.joomla.org/language/details/gl-ES_details.xml', ''),
(34, 3, 0, 0, 'Polish', '', 'pkg_pl-PL', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/pl-PL_details.xml', ''),
(35, 3, 0, 0, 'Syriac', '', 'pkg_sy-IQ', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/sy-IQ_details.xml', ''),
(36, 3, 0, 0, 'Portuguese', '', 'pkg_pt-PT', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/pt-PT_details.xml', ''),
(37, 3, 0, 0, 'Russian', '', 'pkg_ru-RU', 'package', '', 0, '2.5.8.4', '', 'http://update.joomla.org/language/details/ru-RU_details.xml', ''),
(38, 3, 0, 0, 'Hebrew', '', 'pkg_he-IL', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/he-IL_details.xml', ''),
(39, 3, 0, 0, 'Catalan', '', 'pkg_ca-ES', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/ca-ES_details.xml', ''),
(40, 3, 0, 0, 'Laotian', '', 'pkg_lo-LA', 'package', '', 0, '2.5.6.1', '', 'http://update.joomla.org/language/details/lo-LA_details.xml', ''),
(41, 3, 0, 0, 'Afrikaans', '', 'pkg_af-ZA', 'package', '', 0, '2.5.6.2', '', 'http://update.joomla.org/language/details/af-ZA_details.xml', ''),
(42, 3, 0, 0, 'Chinese Simplified', '', 'pkg_zh-CN', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/zh-CN_details.xml', ''),
(43, 3, 0, 0, 'Greek', '', 'pkg_el-GR', 'package', '', 0, '2.5.6.1', '', 'http://update.joomla.org/language/details/el-GR_details.xml', ''),
(44, 3, 0, 0, 'Esperanto', '', 'pkg_eo-XX', 'package', '', 0, '2.5.6.1', '', 'http://update.joomla.org/language/details/eo-XX_details.xml', ''),
(45, 3, 0, 0, 'Finnish', '', 'pkg_fi-FI', 'package', '', 0, '2.5.8.2', '', 'http://update.joomla.org/language/details/fi-FI_details.xml', ''),
(46, 3, 0, 0, 'Portuguese Brazil', '', 'pkg_pt-BR', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/pt-BR_details.xml', ''),
(47, 3, 0, 0, 'Chinese Traditional', '', 'pkg_zh-TW', 'package', '', 0, '2.5.7.2', '', 'http://update.joomla.org/language/details/zh-TW_details.xml', ''),
(48, 3, 0, 0, 'Vietnamese', '', 'pkg_vi-VN', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/vi-VN_details.xml', ''),
(49, 3, 0, 0, 'Kurdish Sorani', '', 'pkg_ckb-IQ', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/ckb-IQ_details.xml', ''),
(50, 3, 0, 0, 'Bosnian', '', 'pkg_bs-BA', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/bs-BA_details.xml', ''),
(51, 3, 0, 0, 'Croatian', '', 'pkg_hr-HR', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/hr-HR_details.xml', ''),
(52, 3, 0, 0, 'Azeri', '', 'pkg_az-AZ', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/az-AZ_details.xml', ''),
(53, 3, 0, 0, 'Norwegian Nynorsk', '', 'pkg_nn-NO', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/nn-NO_details.xml', ''),
(54, 3, 0, 0, 'Tamil India', '', 'pkg_ta-IN', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/ta-IN_details.xml', ''),
(55, 3, 0, 0, 'Scottish Gaelic', '', 'pkg_gd-GB', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/gd-GB_details.xml', ''),
(56, 3, 0, 0, 'Thai', '', 'pkg_th-TH', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/th-TH_details.xml', ''),
(57, 3, 0, 0, 'Basque', '', 'pkg_eu-ES', 'package', '', 0, '1.7.0.1', '', 'http://update.joomla.org/language/details/eu-ES_details.xml', ''),
(58, 3, 0, 0, 'Uyghur', '', 'pkg_ug-CN', 'package', '', 0, '2.5.7.2', '', 'http://update.joomla.org/language/details/ug-CN_details.xml', ''),
(59, 3, 0, 0, 'Korean', '', 'pkg_ko-KR', 'package', '', 0, '2.5.7.2', '', 'http://update.joomla.org/language/details/ko-KR_details.xml', ''),
(60, 3, 0, 0, 'Hindi', '', 'pkg_hi-IN', 'package', '', 0, '2.5.6.1', '', 'http://update.joomla.org/language/details/hi-IN_details.xml', ''),
(61, 3, 0, 0, 'Welsh', '', 'pkg_cy-GB', 'package', '', 0, '2.5.6.1', '', 'http://update.joomla.org/language/details/cy-GB_details.xml', ''),
(62, 3, 0, 0, 'Swahili', '', 'pkg_sw-KE', 'package', '', 0, '2.5.8.3', '', 'http://update.joomla.org/language/details/sw-KE_details.xml', ''),
(63, 6, 10023, 0, 'Acymailing Starter', 'Latest version of Acymailing Starter', 'com_acymailing', 'component', '', 1, '4.0.1', '', 'http://www.acyba.com/component/updateme/updatexml/component-acymailing/level-Starter/file-extension.xml', 'http://www.acyba.com');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_update_categories`
--

DROP TABLE IF EXISTS `lekg5_update_categories`;
CREATE TABLE IF NOT EXISTS `lekg5_update_categories` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT '',
  `description` text NOT NULL,
  `parent` int(11) DEFAULT '0',
  `updatesite` int(11) DEFAULT '0',
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Update Categories' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_update_sites`
--

DROP TABLE IF EXISTS `lekg5_update_sites`;
CREATE TABLE IF NOT EXISTS `lekg5_update_sites` (
  `update_site_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '',
  `type` varchar(20) DEFAULT '',
  `location` text NOT NULL,
  `enabled` int(11) DEFAULT '0',
  `last_check_timestamp` bigint(20) DEFAULT '0',
  PRIMARY KEY (`update_site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Update Sites' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `lekg5_update_sites`
--

INSERT INTO `lekg5_update_sites` (`update_site_id`, `name`, `type`, `location`, `enabled`, `last_check_timestamp`) VALUES
(1, 'Joomla Core', 'collection', 'http://update.joomla.org/core/list.xml', 0, 1358159128),
(2, 'Joomla Extension Directory', 'collection', 'http://update.joomla.org/jed/list.xml', 0, 1358159128),
(3, 'Accredited Joomla! Translations', 'collection', 'http://update.joomla.org/language/translationlist.xml', 0, 1358159127),
(4, 'Falang Update Site', 'collection', 'http://update.faboba.com/falang/collection.xml', 1, 1358245230),
(6, 'AcyMailing', 'extension', 'http://www.acyba.com/component/updateme/updatexml/component-acymailing/level-Starter/file-extension.xml', 1, 1358245232),
(7, 'K2 Updates', 'extension', 'http://getk2.org/update.xml', 1, 1358245230);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_update_sites_extensions`
--

DROP TABLE IF EXISTS `lekg5_update_sites_extensions`;
CREATE TABLE IF NOT EXISTS `lekg5_update_sites_extensions` (
  `update_site_id` int(11) NOT NULL DEFAULT '0',
  `extension_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`update_site_id`,`extension_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Links extensions to update sites';

--
-- Dumping data for table `lekg5_update_sites_extensions`
--

INSERT INTO `lekg5_update_sites_extensions` (`update_site_id`, `extension_id`) VALUES
(1, 700),
(2, 700),
(3, 600),
(4, 10003),
(6, 10023),
(7, 10039);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_usergroups`
--

DROP TABLE IF EXISTS `lekg5_usergroups`;
CREATE TABLE IF NOT EXISTS `lekg5_usergroups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Adjacency List Reference Id',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `title` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_usergroup_parent_title_lookup` (`parent_id`,`title`),
  KEY `idx_usergroup_title_lookup` (`title`),
  KEY `idx_usergroup_adjacency_lookup` (`parent_id`),
  KEY `idx_usergroup_nested_set_lookup` (`lft`,`rgt`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `lekg5_usergroups`
--

INSERT INTO `lekg5_usergroups` (`id`, `parent_id`, `lft`, `rgt`, `title`) VALUES
(1, 0, 1, 20, 'Public'),
(2, 1, 6, 17, 'Registered'),
(3, 2, 7, 14, 'Author'),
(4, 3, 8, 11, 'Editor'),
(5, 4, 9, 10, 'Publisher'),
(6, 1, 2, 5, 'Manager'),
(7, 6, 3, 4, 'Administrator'),
(8, 1, 18, 19, 'Super Users');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_users`
--

DROP TABLE IF EXISTS `lekg5_users`;
CREATE TABLE IF NOT EXISTS `lekg5_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `usertype` varchar(25) NOT NULL DEFAULT '',
  `block` tinyint(4) NOT NULL DEFAULT '0',
  `sendEmail` tinyint(4) DEFAULT '0',
  `registerDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `lastResetTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Date of last password reset',
  `resetCount` int(11) NOT NULL DEFAULT '0' COMMENT 'Count of password resets since lastResetTime',
  PRIMARY KEY (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `idx_block` (`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=234 ;

--
-- Dumping data for table `lekg5_users`
--

INSERT INTO `lekg5_users` (`id`, `name`, `username`, `email`, `password`, `usertype`, `block`, `sendEmail`, `registerDate`, `lastvisitDate`, `activation`, `params`, `lastResetTime`, `resetCount`) VALUES
(232, 'Super User', 'admin', 'vphat28@gmail.com', '5b1567357ecc92099d514c5e8c25e910:d4eVOi6iL1v4FLrlShedXU1lgulaaUp8', 'deprecated', 0, 1, '2013-01-05 09:16:59', '2013-01-15 10:24:04', '0', '', '0000-00-00 00:00:00', 0),
(233, 'Stakeholder', 'stakeholder', 'vphat28a@gmail.com', 'f970c85a49b411c3dc1c375119904f6d:3vI1QjjMy440rv8bziuexhXPFVwgCJUc', '', 0, 0, '2013-01-15 10:23:26', '2013-01-15 10:24:10', '', '{"timezone":""}', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_user_notes`
--

DROP TABLE IF EXISTS `lekg5_user_notes`;
CREATE TABLE IF NOT EXISTS `lekg5_user_notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(100) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user_id` int(10) unsigned NOT NULL,
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `review_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_category_id` (`catid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_user_profiles`
--

DROP TABLE IF EXISTS `lekg5_user_profiles`;
CREATE TABLE IF NOT EXISTS `lekg5_user_profiles` (
  `user_id` int(11) NOT NULL,
  `profile_key` varchar(100) NOT NULL,
  `profile_value` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `idx_user_id_profile_key` (`user_id`,`profile_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Simple user profile storage table';

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_user_usergroup_map`
--

DROP TABLE IF EXISTS `lekg5_user_usergroup_map`;
CREATE TABLE IF NOT EXISTS `lekg5_user_usergroup_map` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign Key to #__users.id',
  `group_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign Key to #__usergroups.id',
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lekg5_user_usergroup_map`
--

INSERT INTO `lekg5_user_usergroup_map` (`user_id`, `group_id`) VALUES
(232, 8),
(233, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_viewlevels`
--

DROP TABLE IF EXISTS `lekg5_viewlevels`;
CREATE TABLE IF NOT EXISTS `lekg5_viewlevels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `title` varchar(100) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rules` varchar(5120) NOT NULL COMMENT 'JSON encoded access control.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_assetgroup_title_lookup` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lekg5_viewlevels`
--

INSERT INTO `lekg5_viewlevels` (`id`, `title`, `ordering`, `rules`) VALUES
(1, 'Public', 0, '[1]'),
(2, 'Registered', 1, '[6,2,8]'),
(3, 'Special', 2, '[6,3,8]');

-- --------------------------------------------------------

--
-- Table structure for table `lekg5_weblinks`
--

DROP TABLE IF EXISTS `lekg5_weblinks`;
CREATE TABLE IF NOT EXISTS `lekg5_weblinks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL DEFAULT '0',
  `sid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `url` varchar(250) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL DEFAULT '0',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `access` int(11) NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  `language` char(7) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if link is featured.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_featured_catid` (`featured`,`catid`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure for view `lekg5_jf_languages`
--
DROP TABLE IF EXISTS `lekg5_jf_languages`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lekg5_jf_languages` AS select `l`.`lang_id` AS `lang_id`,`l`.`lang_code` AS `lang_code`,`l`.`title` AS `title`,`l`.`title_native` AS `title_native`,`l`.`sef` AS `sef`,`l`.`description` AS `description`,`l`.`published` AS `published`,`l`.`image` AS `image`,`lext`.`image_ext` AS `image_ext`,`lext`.`fallback_code` AS `fallback_code`,`lext`.`params` AS `params`,`lext`.`ordering` AS `ordering` from (`lekg5_languages` `l` left join `lekg5_jf_languages_ext` `lext` on((`l`.`lang_id` = `lext`.`lang_id`))) order by `lext`.`ordering`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
