<?php 

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
jimport( 'joomla.application.component.model' );

class EnmasseModelDeliverer extends JModel
{
	public function getOrdersByUserId($userId)
	{
		$db = JFactory::getDbo();
		$query = "SELECT order_id
					FROM #__enmasse_order_deliverer
					WHERE user_id = $userId";
		
		$db->setQuery($query);
		
		return $db->loadColumn(0);
	}
}