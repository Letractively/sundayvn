<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."toolbar.enmasse.html.php");

class EnmasseViewSalesPerson extends JView
{
	function display($tpl = null)
	{
		$task = JRequest::getWord('task');
		if($task == 'edit' || $task == 'add')
		{
			JRequest::setVar('hidemainmenu', true);
			TOOLBAR_enmasse::_SALESPERSON_NEW();
			$cid = JRequest::getVar( 'cid', array(0), '', 'array' );
			$oSale = JTable::getInstance('salesPerson','Table');
			if(!$oSale->load($cid[0]))
			{
				JError::raiseError( 500, $oSale->getError() );
				return;
			}
			//ovveride the object with data was saved in the session
			$data = JFactory::getApplication()->getUserState('salesperson.add.data');
			$oSale->bind($data);
			$this->salesPerson = $oSale;
		}
		else // show
		{
			TOOLBAR_enmasse::_SMENU();
			$nNumberOfSales = JModel::getInstance('salesPerson','enmasseModel')->countAll();
			if($nNumberOfSales==0)
			{
				TOOLBAR_enmasse::_SALESPERSON_EMPTY();
			}
			else
			{
				TOOLBAR_enmasse::_SALESPERSON();
			}
			$filter = JRequest::getVar('filter');
			$salesPersonList = JModel::getInstance('salesPerson','enmasseModel')->search($filter['name']);
			// load pagination
			$pagination = JModel::getInstance('salesPerson','enmasseModel')->getPagination($filter['name']);
			$state = $this->get( 'state' );
			// get order values
			$order['order_dir'] = $state->get( 'filter_order_dir' );
			$order['order']     = $state->get( 'filter_order' );
			$this->assignRef( 'filter', $filter );
			$this->assignRef( 'salesPersonList', $salesPersonList );
			$this->assignRef('pagination', $pagination);
			$this->assignRef( 'order', $order );
		}
		parent::display($tpl);
	}
}
?>