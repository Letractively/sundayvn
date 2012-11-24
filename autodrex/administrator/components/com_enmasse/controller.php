<?php
// No direct access 
defined( '_JEXEC' ) or die( 'Restricted access' ); 
jimport('joomla.application.component.controller');

class EnmasseController extends JController
{
    
    function display($cachable = false, $urlparams = false) 
	{
		// set default view if not set
		JRequest::setVar('view', JRequest::getCmd('view', 'dashboard'));

		// call parent behavior
		parent::display($cachable);
	}
}
?>