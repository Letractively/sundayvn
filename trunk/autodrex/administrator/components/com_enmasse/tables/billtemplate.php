<?php

class TableBillTemplate extends JTable
{
	var $id = null;
	var $slug_name = null;
	var $avail_attribute = null;
	var $content = null;
	var $created_at = null;
	var $updated_at = null;

	function __construct(&$db)
	{
		parent::__construct( '#__enmasse_bill_template', 'id', $db );
	}

}
?>