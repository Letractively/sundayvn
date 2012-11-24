<?php


defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');

class EnmasseControllerHelp extends JController
{
	function display($cachable = false, $urlparams = false)
	{
		JRequest::setVar('view', 'help');
		parent::display();
	}
    
	function control()
	{
		$this->setRedirect('index.php?option=com_enmasse');
	}
}
?>