<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view');
require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."toolbar.enmasse.html.php");

class EnmasseViewTax extends JView
{
	function display($tpl = null)
	{

		$task = JRequest::getWord('task');
		if($task == 'edit'|| $task == 'add' )
		{
			TOOLBAR_enmasse::_TAXES_NEW();
			
			$cid = JRequest::getVar( 'cid', array(0), '', 'array' );

			$row = JModel::getInstance('tax','enmasseModel')->getById($cid[0]);
			$this->assignRef( 'tax', $row );
		}
		else
		{
			TOOLBAR_enmasse::_SMENU();
			TOOLBAR_enmasse::_TAXES();
			
			$taxList = JModel::getInstance('tax','enmasseModel')->listAll();
			$this->assignRef( 'taxList', $taxList );
		}
		parent::display($tpl);
	}

}
?>