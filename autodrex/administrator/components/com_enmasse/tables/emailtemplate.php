<?php


class TableEmailTemplate extends JTable
{
	var $id = null;
	var $slug_name = null;
	var $avail_attribute = null;
	var $subject = null;
	var $content = null;
	var $created_at = null;
	var $updated_at = null;

	function __construct(&$db)
	{
		parent::__construct( '#__enmasse_email_template', 'id', $db );
	}

}
?>