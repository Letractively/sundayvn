<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
jimport( 'joomla.application.component.model' );

class EnmasseModelBillTemplate extends JModel
{
	function listAll()
	{
		$db = JFactory::getDBO();
		$query = "SELECT * FROM #__enmasse_bill_template";
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
		$row = JTable::getInstance('billTemplate', 'Table');
		$row->load($id);
		return $row;
	}

	function store($data)
	{
		$row = $this->getTable();

		if (!$row->bind($data)) {
			$this->setError($row->getError());
			return false;
		}

		if($row->id <= 0)
			$row ->created_at = DatetimeWrapper::getDatetimeOfNow();
		$row ->updated_at = DatetimeWrapper::getDatetimeOfNow();

		if (!$row->check()) {
			$this->setError($row->getError());
			return false;
		}

		if (!$row->store()) {
			$this->setError($row->getError());
			return false;
		}

		return true;
	}

}
?>