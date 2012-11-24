<?php


class TableLocation extends JTable
{
	var $id = null;
	var $name = null;
	var $description = null;
	var $published = null;
	var $created_at = null;
	var $updated_at = null;

	function __construct(&$db)
	{
		parent::__construct( '#__enmasse_location', 'id', $db );
	}

}
?>