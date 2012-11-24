<?php


jimport( 'joomla.application.component.model' );
class EnmasseModelUser extends JModel
{
	function getUser()
	{
		return JFactory::getUser();
	}
}
?>