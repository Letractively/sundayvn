<?php


class TableCommentSpammer extends JTable
{
	var $id = null;
	var $user_id = null;

	function __construct(&$db)
	{
		parent::__construct( '#__enmasse_comment_spammer', 'id', $db );
	}
}
?>