<?php


class TableEnmasse_invty extends JTable
{
	var $id = null;
	var $order_item_id = null;
	var $pdt_id = null;
	var $name = null;
	var $deallocated_at = null;
	var $status = null;
	var $settlement_status = null;

	function __construct(&$db)
	{
		parent::__construct( '#__enmasse_invty', 'id', $db );
	}

}
?>