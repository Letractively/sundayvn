<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view');
require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."toolbar.enmasse.html.php");

class EnmasseViewBillTemplate extends JView
{
	public function display($tpl = null)
	{
		TOOLBAR_enmasse::_SMENU();
		$task = JRequest::getWord('task');
		switch ($task)
		{
			case 'show':
				TOOLBAR_enmasse::_BILLTEMPLATE();
				$this->arBillTmpl = JModel::getInstance('billTemplate', 'enmasseModel')->listAll();
				break;
			case 'edit':
				TOOLBAR_enmasse::_BILLTEMPLATE_EDIT();
				$cid = JRequest::getVar('cid', array(), 'method', 'array');
				if(!empty($cid))
				{
					$this->oBillTmpl = JModel::getInstance('billTemplate', 'enmasseModel')->getById($cid[0]);
					if(!$this->oBillTmpl->id)
					{
						$link = JRoute::_('index.php?option=com_enmasse&controller=billTemplate&task=show');
						$msg = JText::_('BILL_TEMPLATE_INVALID_TEMPLATE_MSG');
						JFactory::getApplication()->redirect($link,$msg, 'error');
					}
				}else
				{
					$link = JRoute::_('index.php?option=com_enmasse&controller=billTemplate&task=show');
					$msg = JText::_('BILL_TEMPLATE_INVALID_TEMPLATE_MSG');
					JFactory::getApplication()->redirect($link,$msg, 'error');
				}
				
				break;

		}

		parent::display($tpl);
	}

}
?>