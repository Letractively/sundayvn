<?php

class TablePayGty extends JTable
{
	var $id = null;
	var $name = null;
	var $class_name = null;
	var $attributes = null;
	var $attribute_config = null;
	var $sesion_id = null;
	var $published = null;
	var $created_at = null;
	var $updated_at = null;

	function __construct(&$db)
	{
		parent::__construct( '#__enmasse_pay_gty', 'id', $db );
	}

}
?>