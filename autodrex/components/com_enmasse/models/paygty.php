<?php


jimport( 'joomla.application.component.model' );

class EnmasseModelPayGty extends JModel
{
	function listAll(){
	
		$db = JFactory::getDBO();
		$query = "SELECT * FROM #__enmasse_pay_gty 
		           WHERE published = 1";
		$db->setQuery( $query );
		$rows = $db->loadObjectList();
		
		if ($this->_db->getErrorNum()) {
			JError::raiseError( 500, $this->_db->stderr() );
			return false;
		}
		return $rows;
	}
	function getById($id)
	{
		$db = JFactory::getDBO();
		$query = "SELECT * FROM #__enmasse_pay_gty WHERE id = $id";
		$db->setQuery( $query );
		$payGty = $db->loadObject();
		
		if ($this->_db->getErrorNum()) {
			JError::raiseError( 500, $this->_db->stderr() );
			return false;
		}
		
		return $payGty;
	}
	function getByClass($class)
	{
		$db = JFactory::getDBO();
		$query = "SELECT * FROM #__enmasse_pay_gty WHERE
	              class_name = '$class'";
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