<?php


class TableCouponElement extends JTable
{
	var $id = null;
	var $name = null;
	var $x = null;
	var $y = null;
	var $font_size = null;
	var $width = null;
	var $height = null;

	function __construct(&$db)
	{
		parent::__construct( '#__enmasse_coupon_element', 'id', $db );
	}

}
?>