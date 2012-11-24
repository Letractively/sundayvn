<?php


defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view');
require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."toolbar.enmasse.html.php");

class EnmasseViewCategory extends JView
{
	function display($tpl = null)
	{

		$task = JRequest::getWord('task');
		if($task == 'edit')
		{
			$cid = JRequest::getVar( 'cid', array(0), '', 'array' );
			TOOLBAR_enmasse::_CATEGORY_NEW();
			
			$category = JModel::getInstance('category','enmasseModel')->getById($cid[0]);
			$this->assignRef('category', $category);
		}
		elseif($task == 'add')
		{
			TOOLBAR_enmasse::_CATEGORY_NEW();
		}
		else
		{
			TOOLBAR_enmasse::_SMENU();
			$nNumberOfCategories = JModel::getInstance('category','enmasseModel')->countAll();
			if($nNumberOfCategories==0)
			{
				TOOLBAR_enmasse::_CATEGORY_EMPTY();
			}
			else
			{
				TOOLBAR_enmasse::_CATEGORY();
			}
			/// load pagination
			$pagination = $this->get('Pagination');
		
			$state = $this->get( 'state' );
			// get order values
			$order['order_dir'] = $state->get( 'filter_order_dir' );
            $order['order']     = $state->get( 'filter_order' );
            
			$categoryList = JModel::getInstance('category','enmasseModel')->search();
			$this->assignRef( 'categoryList', $categoryList);
			$this->assignRef('pagination', $pagination);
			$this->assignRef( 'order', $order );
		}
		parent::display($tpl);
	}

}
?>