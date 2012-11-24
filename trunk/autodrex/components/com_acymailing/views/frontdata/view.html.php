<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
include(ACYMAILING_BACK.'views'.DS.'data'.DS.'view.html.php');
class FrontdataViewFrontdata extends DataViewData
{
	var $ctrl='frontdata';
	function display($tpl = null)
	{
		$doc = JFactory::getDocument();
		$doc->addStyleSheet( ACYMAILING_CSS.'frontendedition.css' );
		JHTML::_('behavior.tooltip');
		global $Itemid;
		$this->assignRef('Itemid',$Itemid);
		parent::display($tpl);
	}
}