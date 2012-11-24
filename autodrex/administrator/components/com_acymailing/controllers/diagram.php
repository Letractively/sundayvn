<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class DiagramController extends acymailingController{
	function listing(){
		return $this->lists();
	}
	function lists(){
		if(!$this->isAllowed('statistics','manage')) return;
		JRequest::setVar( 'layout', 'lists'  );
		return parent::display();
	}
	function subscription(){
		if(!$this->isAllowed('statistics','manage')) return;
		JRequest::setVar( 'layout', 'subscription'  );
		return parent::display();
	}
	function mailing(){
		if(!$this->isAllowed('statistics','manage')) return;
		JRequest::setVar( 'layout', 'mailing'  );
		return parent::display();
	}
}