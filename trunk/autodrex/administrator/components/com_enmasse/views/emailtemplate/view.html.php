<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view');
require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."toolbar.enmasse.html.php");
 
class EnmasseViewEmailTemplate extends JView
{
    function display($tpl = null)
    { 
        
        $task = JRequest::getWord('task');
        if($task == 'edit'|| $task == 'add' )
        {
        	$cid = JRequest::getVar( 'cid', array(0), '', 'array' );
            
        	TOOLBAR_enmasse::_EMAILTEMPLATE_NEW();
            
	        $emailTemplate 	= JModel::getInstance('emailTemplate','enmasseModel')->getById($cid[0]);
	         
	        $this->assignRef( 'emailTemplate', $emailTemplate );	
        }
        else
        {
	        TOOLBAR_enmasse::_SMENU();
        	TOOLBAR_enmasse::_EMAILTEMPLATE();
        	
	        $emailTemplateList 	= JModel::getInstance('emailTemplate','enmasseModel')->listAll();
	         
	        $this->assignRef( 'emailTemplateList', $emailTemplateList );
        }
        parent::display($tpl);
    }

}
?>