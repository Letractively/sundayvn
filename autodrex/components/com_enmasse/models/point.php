<?php


defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."DatetimeWrapper.class.php");
jimport( 'joomla.application.component.model' );

class EnmasseModelPoint extends JModel
{
	function doRefund($userId, $orderId, $point)
	{
		$db = JFactory::getDBO();
		$query = "UPDATE #__enmasse_order SET refunded_amount = '".$point."' WHERE id = '".$orderId."' AND refunded_amount = '0'";
		$db->setQuery( $query );
		$db-> query();		
		if ($this->_db->getErrorNum()) {
			JError::raiseError( 500, $this->_db->stderr() );
			return false;
		}
		
		//------------------------
		//generate integration class			
		$isPointSystemEnabled = EnmasseHelper::isPointSystemEnabled();
		if($isPointSystemEnabled==true)
		{
			$integrationClass = EnmasseHelper::getPointSystemClassFromSetting();
			$integrateFileName = $integrationClass.'.class.php';	
			require_once (JPATH_SITE . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."pointsystem". DS .$integrationClass. DS.$integrateFileName);
			$integrationObject = new $integrationClass();		
			$integrationObject->integration($userId,'refunddeal',$point);
			return true;		
		}
		return false;		
	}	
}
