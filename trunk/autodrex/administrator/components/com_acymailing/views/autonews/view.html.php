<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
include(ACYMAILING_BACK.'views'.DS.'newsletter'.DS.'view.html.php');
class AutonewsViewAutonews extends NewsletterViewNewsletter
{
	var $type = 'autonews';
	var $ctrl = 'autonews';
	var $nameListing = 'AUTONEWSLETTERS';
	var $nameForm = 'AUTONEW';
	var $icon = 'autonewsletter';
	var $aclCat = 'autonewsletters';
}