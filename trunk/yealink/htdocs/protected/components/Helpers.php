<?php
  	/*
  	* @author anguyen
  	* @date Mar 3, 2012
  	*/
class Helpers{
	static function generate_phone_id($length = 10){
		$time = strtotime('now');
		
		return ''.$time;
	}

}