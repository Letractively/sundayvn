<?php
#Author nguyethietlap@gmail.com
defined('JPATH_BASE') or die;
jimport('joomla.plugin.plugin');

class plgSystemMb extends JPlugin
{    
	function onAfterInitialise()
	{
		$app = JFactory::getApplication();
		if($app->isAdmin()) return;
		
		if(!class_exists('Browser')) require_once 'Browser.php';
		$browser = new Browser();
		if($browser->isMobile()) {
			$app->setTemplate($this->params->get('mb_tpl'));
			 JRequest::setVar('is_mobile_nano', 1);
			 JRequest::setVar('is_mobile', 1);
		}else{
			JRequest::setVar('is_mobile', 0);
		}
		
	}
}
?>