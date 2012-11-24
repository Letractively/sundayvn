<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
jimport( 'joomla.application.component.model' );

class EnmasseModelCoupon extends JModel
{

	function getCouponBgUrl()
	{
		$db = JFactory::getDBO();
		$query = "SELECT coupon_bg_url FROM #__enmasse_setting LIMIT 1";
		$db->setQuery( $query );
		$row = $db->loadObject();

		if ($this->_db->getErrorNum()) {
			JError::raiseError( 500, $this->_db->stderr() );
			return false;
		}
		
		return $row->coupon_bg_url;
	}

	function updateCouponBgUrl($url)
	{
		$db = JFactory::getDBO();
		$query = "UPDATE #__enmasse_setting SET coupon_bg_url = '".$url."'";
		$db -> setQuery($query);
		$db -> query();
		
		if ($this->_db->getErrorNum()) {
			JError::raiseError( 500, $this->_db->stderr() );
			return false;
		}
		
        return true;
	}

}
?>