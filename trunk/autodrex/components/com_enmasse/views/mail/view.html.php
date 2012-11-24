<?php


defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view');
require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."EnmasseHelper.class.php");


class EnmasseViewMail extends JView
{
	function display($tpl = null)
	{	
		$success = JRequest::getVar('success', null);
		$dealid = JRequest::getVar('dealid', '0');
		$userid = JRequest::getVar('userid', '0');
        $itemid = JRequest::getVar('itemid', '0');
		$this->_setPath('template',JPATH_SITE . DS ."components". DS ."com_enmasse". DS ."theme". DS .EnmasseHelper::getThemeFromSetting(). DS ."tmpl". DS);
		$this->_layout="mail";
		$this->assignRef('success',$success);
		$this->assignRef('userid',$userid);
		$this->assignRef('dealid',$dealid);
        $this->assignRef('itemid',$itemid);
		parent::display($tpl);
	}
}
?>