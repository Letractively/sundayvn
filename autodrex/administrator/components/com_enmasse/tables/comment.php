<?php


class TableComment extends JTable
{
	var $id = null;
    var $deal_id = null;
	var $user_id = null;
	var $comment = null;
	var $rating = null;
	var $created_at = null;
    var $status = null;

	function __construct(&$db)
	{
		parent::__construct( '#__enmasse_comment', 'id', $db );
	}
}
?>