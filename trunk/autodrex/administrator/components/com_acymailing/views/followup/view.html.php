<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
include(ACYMAILING_BACK.'views'.DS.'newsletter'.DS.'view.html.php');
class FollowupViewFollowup extends NewsletterViewNewsletter
{
	var $type = 'followup';
	var $ctrl = 'followup';
	var $nameForm = 'FOLLOWUP';
	var $aclCat = 'campaign';
}