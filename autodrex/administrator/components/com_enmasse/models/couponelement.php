<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
jimport( 'joomla.application.component.model' );

class EnmasseModelCouponElement extends JModel
{
	function listAll()
	{
		$db = JFactory::getDBO();
		$query = "SELECT * FROM #__enmasse_coupon_element";
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
		$row = JTable::getInstance('couponElement', 'Table');
		$row->load($id);
		
		if ($this->_db->getErrorNum()) {
			JError::raiseError( 500, $this->_db->stderr() );
			return false;
		}
		
		return $row;
	}

	function store($data)
	{
		$row = $this->getTable();

		if (!$row->bind($data)) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		if (!$row->check()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		if (!$row->store()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		return true;
	}

	function delete($elementId)
	{
		$row = $this->getTable();
		
		if (!$row->delete( $elementId )) {
			$this->setError( $row->getErrorMsg() );
			return false;
		}
		return true;
	}
}
?>