<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class FieldsController extends acymailingController{
	var $pkey = 'fieldid';
	var $table = 'fields';
	var $groupMap = '';
	var $groupVal = '';
	function store(){
		if(!$this->isAllowed('configuration','manage')) return;
		JRequest::checkToken() or die( 'Invalid Token' );
		$app = JFactory::getApplication();
		$class = acymailing_get('class.fields');
		$status = $class->saveForm();
		if($status){
			$app->enqueueMessage(JText::_( 'JOOMEXT_SUCC_SAVED' ), 'message');
		}else{
			$app->enqueueMessage(JText::_( 'ERROR_SAVING' ), 'error');
			if(!empty($class->errors)){
				foreach($class->errors as $oneError){
					$app->enqueueMessage($oneError, 'error');
				}
			}
		}
	}
	function remove(){
		if(!$this->isAllowed('configuration','manage')) return;
		JRequest::checkToken() or die( 'Invalid Token' );
		$cids = JRequest::getVar( 'cid', array(), '', 'array' );
		$class = acymailing_get('class.fields');
		$num = $class->delete($cids);
		if($num){
			$app = JFactory::getApplication();
			$app->enqueueMessage(JText::sprintf('SUCC_DELETE_ELEMENTS',$num), 'message');
		}
		return $this->listing();
	}
}