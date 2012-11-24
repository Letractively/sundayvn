<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
acymailing_get('controller.list');
class CampaignController extends ListController{
	var $aclCat = 'campaign';
	function store(){
		if(!$this->isAllowed('campaign','manage')) return;
		JRequest::checkToken() or die( 'Invalid Token' );
		$app = JFactory::getApplication();
		$listClass = acymailing_get('class.list');
		$status = $listClass->saveForm();
		if($status){
			$app->enqueueMessage(JText::_( 'JOOMEXT_SUCC_SAVED' ), 'message');
		}else{
			$app->enqueueMessage(JText::_( 'ERROR_SAVING' ), 'error');
			if(!empty($listClass->errors)){
				foreach($listClass->errors as $oneError){
					$app->enqueueMessage($oneError, 'error');
				}
			}
		}
	}
}