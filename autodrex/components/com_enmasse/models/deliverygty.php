<?php


jimport( 'joomla.application.component.model' );

class EnmasseModelDeliveryGty extends JModel
{
	function getById($id)
	{
		$db = JFactory::getDBO();
		$query = "SELECT * FROM #__enmasse_delivery_gty WHERE id = $id";
		$db->setQuery( $query );
		$payGty = $db->loadObject();
		
		if ($this->_db->getErrorNum()) {
			JError::raiseError( 500, $this->_db->stderr() );
			return false;
		}
		
		return $payGty;
	}	
}
?>