<?php
class PayGtyPoint
{
	public static function returnStatus()
	{
	  $status ->coupon = 'Paid';
	  $status ->order  = 'Paid';
	  return $status;
	}
  public static function checkConfig($payGty)
	{
		$attribute_config = json_decode($payGty->attribute_config);
		if ( $attribute_config->instruction == "")
		{
			return false;
		}
		return true;
	}
}

?>