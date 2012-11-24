<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
acymailing_get('controller.newsletter');
class FollowupController extends NewsletterController{
	var $aclCat = 'campaign';
	function listing(){
		$this->setRedirect(acymailing_completeLink('campaign',false,true));
	}
}