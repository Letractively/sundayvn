<?php


class PayGtyCash
{
	public static function returnStatus()
	{
	  $status ->coupon = 'Free';
	  $status ->order  = 'Pending';
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