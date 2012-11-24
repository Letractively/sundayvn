<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
include(ACYMAILING_BACK.'views'.DS.'subscriber'.DS.'view.html.php');
class FrontsubscriberViewFrontsubscriber extends SubscriberViewSubscriber
{
	var $ctrl='frontsubscriber';
	function display($tpl = null)
	{
		$doc = JFactory::getDocument();
		$doc->addStyleSheet( ACYMAILING_CSS.'frontendedition.css' );
		JHTML::_('behavior.tooltip');
		global $Itemid;
		$this->assignRef('Itemid',$Itemid);
		parent::display($tpl);
	}
	function listing(){
		if(empty($_POST) && !JRequest::getInt('start') && !JRequest::getInt('limitstart')){
			JRequest::setVar('limitstart',0);
		}
		return parent::listing();
	}
}