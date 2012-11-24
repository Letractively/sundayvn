<?php

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
jimport( 'joomla.application.component.model' );

class EnmasseModelOrderDeliverer extends JModel
{
	public function save($data)
	{
		$nUser = $data['user_id'];
		$arOrderId = $data['orders'];
		$dtNow = DatetimeWrapper::getDatetimeOfNow();
		
		$sInsert = "($nUser , '$dtNow', '$dtNow' ," .implode("),($nUser , '$dtNow', '$dtNow' ,", $arOrderId) .")";
		
		$db = JFactory::getDbo();
		//Delete the order that already assigned for other deliverer
		$query = "DELETE FROM #__enmasse_order_deliverer WHERE user_id != $nUser AND order_id IN (" .implode(',', $arOrderId) .")";
		
		$db->setQuery($query);
		$db->query();
		//insert 
		$query = "INSERT IGNORE INTO #__enmasse_order_deliverer (user_id, created_at, updated_at, order_id) VALUES " . $sInsert;
		
		$db->setQuery($query);
		$db->query();
		if($db->getErrorNum())
		{
			$this->setError($db->getErrorMsg());
			return false;
		}else {
			return true;
		}
	}
	
	public function updateStatus($nOrderId, $sStatus)
	{
		$db = JFactory::getDbo();
		
		$query = "UPDATE #__enmasse_order_deliverer SET status = '$sStatus' WHERE order_id = $nOrderId";
		
		$db->setQuery($query);
		$db->query();
		return true;
	}
	
}