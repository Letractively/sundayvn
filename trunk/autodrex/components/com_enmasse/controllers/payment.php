<?php
/* ------------------------------------------------------------------------
  # En Masse - Social Buying Extension 2010
  # ------------------------------------------------------------------------
  # By Matamko.com
  # Copyright (C) 2010 Matamko.com. All Rights Reserved.
  # @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
  # Websites: http://www.matamko.com
  # Technical Support:  Visit our forum at www.matamko.com
  ------------------------------------------------------------------------- */
// No direct access 
defined( '_JEXEC' ) or die( 'Restricted access' ); 

jimport('joomla.application.component.controller');
require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."DatetimeWrapper.class.php");
require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."EnmasseHelper.class.php");
require_once( JPATH_SITE . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."Cart.class.php");
require_once( JPATH_SITE . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."CartHelper.class.php");

class EnmasseControllerPayment extends JController
{
	function gateway()
	{
		JRequest::setVar('view', 'paygty');
		parent::display();
	}

	function returnUrl()
	{
		sleep(2);
		$msg = JText::_("PAYMENT_BEING_PROCESS_MSG");
		$link = JRoute::_("index.php?option=com_enmasse&controller=order&view=orderList", false);
		JFactory::getApplication()->redirect($link, $msg);
	}

	function notifyUrl()
	{	
		$session = & JFactory::getSession();
		$user = JFactory::getUser();
	
		$orderId 	= JRequest::getVar('orderId');
		$payClass 	= JRequest::getVar('payClass', '');
		
		$className = 'PayGty'.ucfirst($payClass);
		if (!(EnmasseHelper::checkValidPayclass($payClass)))
		{
				$msg = "Invalid pay class";
				$link = JRoute::_("index.php?option=com_enmasse&controller=deal", false);
				JFactory::getApplication()->redirect($link, $msg);
				die;
		}
		require_once JPATH_SITE . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."payGty". DS .$payClass. DS .$className. ".class.php";

		if ( ! call_user_func_array(array($className, "validateTxn"), array($payClass)) )
		{
			echo JTEXT::_("PAYMENT_VALIDATION_FAILED");
			exit(0);
		}
		else
		{
			$payDta = call_user_func_array(array($className, "generatePaymentDetail"), array());	
			$payDetail = json_encode($payDta);		
			if($payClass=="authorizenet")
			{
				$approved = JRequest::getVar('approved','','POST');
				$invoice_number = JRequest::getVar('invoice_number','','POST');
				if($approved=='true');
				{
					$orderId = $invoice_number;
					EnmasseHelper::doNotify($orderId);
					JModel::getInstance('order','enmasseModel')->updatePayDetail($orderId, $payDetail);									$transactionid = stripslashes( $_POST['transaction_id']);
					$msg = JText::_( "Thank you for purchasing! Your transaction ID is " . $transactionid . ".");
				}
				$link = JRoute::_("index.php?option=com_enmasse&controller=orderconf&oid={$orderId}", false);
				JFactory::getApplication()->redirect($link, $msg);
			}
		}
		$session->clear('newOrderId');
	}

	function doNotify()
	{		
		$orderId = JRequest::getVar("orderId", null);
		
		$order = JModel::getInstance('order','enmasseModel')->getById($orderId);
		if($order == null)
		{
			echo JTEXT::_("PAYMENT_ERROR_MSG") . $orderId;
			exit(0);
		}
		else if($order->status=="Unpaid") // Pass checking
		{
			EnmasseHelper::doNotify($orderId);
		}

		$msg = JTEXT::_("PAYMENT_SUCCESS");

		$link = JRoute::_("index.php?option=com_enmasse&controller=deal", false);
		JFactory::getApplication()->redirect($link, $msg);
	}

	function cancelUrl()
	{
		$msg = JText::_( "CANCEL_TRANSACTION");
		$link = JRoute::_("index.php?option=com_enmasse&controller=deal", false);
		JFactory::getApplication()->redirect($link, $msg);
	}

}
?>