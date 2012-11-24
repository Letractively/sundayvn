<?php

class emlocation
{
	 function integration($data,$key)
	 {
	 	return true;
	 }
	 
	 function getViewData($params)
	 {
	 	$data->locationList = JModel::getInstance('location','enmasseModel')->listAllPublished();
	 	return $data;
	 }
     function addMenu()
	 {
	 	 return true;
	 }
	 
}
?>