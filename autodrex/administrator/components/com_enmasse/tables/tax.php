<?php


class TableTax extends JTable
{
	var $id = null;
	var $name = null;
	var $tax_rate = null;
	var $published = null;
	var $created_at = null;
	var $updated_at = null;

	function __construct(&$db)
	{
		parent::__construct( '#__enmasse_taxes', 'id', $db );
	}

}
?>