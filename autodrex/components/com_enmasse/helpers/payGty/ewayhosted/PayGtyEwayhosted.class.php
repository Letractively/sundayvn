<?php


class PayGtyEwayHosted {

	public static function returnStatus()
	{
	  $status ->coupon = 'Free';
	  $status ->order  = 'Unpaid';
	  return $status;
	}
	    
	public static function checkConfig($payGty)
	{
		$attribute_config = json_decode($payGty->attribute_config);
		if (!isset($attribute_config->ewayCustomerID))
		{
			return false;
		}		
		return true;
	}    
	
	public static function validateTxn($payClass)
	{
		if($_GET['trxnstatus']==true && isset($_GET['trxnumber']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public static function generatePaymentDetail()
	{
		$paymentDta = array();

		$paymentDta["trxnauthcode"]	= $_GET['trxnauthcode'];
		$paymentDta["trxnstatus"]	= $_GET['trxnstatus'];
		$paymentDta["trxnumber"]	= $_GET['trxnumber'];
		$paymentDta["returnamount"]	= $_GET['returnamount'];
						
		return $paymentDta;		
	}	
}
 
?>
