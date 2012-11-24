<?php

class CartItem
{
	var $count = 0;
	var $item = null;

	function __construct(stdClass $item)
	{
		$this->count = 1;
		$this->item = $item;
	}

	function getCount()
	{
		return $this->count;
	}

	function getItem()
	{
		return $this->item;
	}

	function addItem(stdClass $item)
	{
		$this->count ++;
	}

	function changeItem($value)
	{
		if ( $value > 0 )
		$this->count = $value;
		else
		$this->count = 0;
	}

	function getTotalPrice()
	{
		return $this->item->price * $this->count;
	}
}