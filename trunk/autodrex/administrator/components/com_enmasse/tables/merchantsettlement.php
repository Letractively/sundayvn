<?php


class TableMerchantSettlement extends JTable
{
	var $id = null;
	var $merchant_id = null;
	var $deal_id = null;
	var $status = null;
	
	public function __construct(&$db)
	{
		parent::__construct( '#__enmasse_merchant_deal_settlement', 'id', $db );
	}
		
}

?>