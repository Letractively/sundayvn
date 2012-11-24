<?php


defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view');
require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."EnmasseHelper.class.php");

class EnmasseViewPoint extends JView
{
	function display($tpl = null)
	{
		$orderId = JRequest::getVar('orderid', null);
		$buyerId = JRequest::getVar('buyerid', null);
		
		//Get Id of current user
        $user = JFactory::getUser();
        $userId = $user->get('id');	

        $pointPaid = EnmasseHelper::getPointPaidByOrderId($orderId);
        $totalPrice = EnmasseHelper::getTotalPriceByOrderId($orderId);
        $orderStatus = EnmasseHelper::getOrderStatusByOrderId($orderId);
        
        //If current user is owner of the order and the order was paid with point
		if($buyerId==$userId && $pointPaid>0 && $orderStatus=='Refunded')
		{		
			$dealName = EnmasseHelper::getDealNameByOrderId($orderId);
			$this->assignRef( 'dealName', $dealName );
			$this->assignRef( 'orderId', $orderId );
			$this->assignRef( 'totalPrice', $totalPrice );
			$this->assignRef( 'pointPaid', $pointPaid );
			$this->assignRef( 'buyerId', $buyerId );
			
	        $this->_setPath('template',JPATH_SITE . DS ."components". DS ."com_enmasse". DS ."theme". DS .EnmasseHelper::getThemeFromSetting(). DS ."tmpl". DS);
	    	$this->_layout="point_refund";
	        parent::display($tpl);
		}
		else
		{
			$link = JRoute::_("index.php?option=com_enmasse&view=deallisting", false);    
			JFactory::getApplication()->redirect($link);
		}
	}

}
?>