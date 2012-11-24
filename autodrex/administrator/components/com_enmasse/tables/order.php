<?php


class TableOrder extends JTable
{
	var $id = null;
	var $description = null;
	var $status = null;
	var $total_buyer_paid = null;
	var $point_used_to_pay = null;
	var $paid_amount = null;
	var $refunded_amount = null;
	var $referral_id = null;
	var $session_id = null;
	var $buyer_id = null;
	var $buyer_detail = null;
	var $pay_gty_id = null;
	var $pay_detail = null;
	var $delivery_gty_id = null;
	var $delivery_detail = null;
	var $created_at = null;
	var $updated_at = null;

	function __construct(&$db)
	{
		parent::__construct( '#__enmasse_order', 'id', $db );
	}

}
?>