<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class StatsurlController extends acymailingController{
	var $aclCat = 'statistics';
	function save(){
		if(!$this->isAllowed($this->aclCat,'manage')) return;
		JRequest::checkToken() or die( 'Invalid Token' );
		$class = acymailing_get('class.url');
		$status = $class->saveForm();
		if($status){
			acymailing_display(JText::_( 'JOOMEXT_SUCC_SAVED'),'success');
			return true;
		}else{
			acymailing_display(JText::_( 'ERROR_SAVING'),'success');
		}
		return $this->edit();
	}
	function detaillisting(){
		if(!$this->isAllowed($this->aclCat,'manage') || !$this->isAllowed('subscriber','view')) return;
		JRequest::setVar( 'layout', 'detaillisting'  );
		return parent::display();
	}
	function export(){
		$selectedMail = JRequest::getInt('filter_mail',0);
		$selectedUrl = JRequest::getInt('filter_url',0);
		$filters = array();
		if(!empty($selectedMail)) $filters[] = 'a.mailid = '.$selectedMail;
		if(!empty($selectedMail)) $filters[] = 'a.urlid = '.$selectedUrl;
		$query = 'SELECT `subid` FROM `#__acymailing_urlclick` as a ';
		if(!empty($filters)) $query .= ' WHERE ('.implode(') AND (',$filters).')';
		$currentSession = JFactory::getSession();
		$currentSession->set('acyexportquery',$query);
		$this->setRedirect(acymailing_completeLink('data&task=export&sessionquery=1',true,true));
	}
}