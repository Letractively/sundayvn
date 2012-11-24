<?php

class TableSalesPerson extends JTable
{
	var $id = null;
	var $name = null;
	var $user_name = null;
	var $address = null;
	var $phone = null;
	var $email = null;
	var $published = null;
	var $created_at = null;
	var $updated_at = null;

	function __construct(&$db)
	{
		parent::__construct( '#__enmasse_sales_person', 'id', $db );
	}

}
?>