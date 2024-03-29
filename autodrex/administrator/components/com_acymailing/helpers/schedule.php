<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class scheduleHelper{
	var $nbNewsletterScheduled = 0;
	function getScheduled(){
		$db = JFactory::getDBO();
		$db->setQuery('SELECT * FROM '.acymailing_table('mail').' WHERE published = 2 ORDER BY senddate ASC');
		return $db->loadObjectList();
	}
	function getReadyMail(){
		$db = JFactory::getDBO();
		$db->setQuery('SELECT mailid,senddate,subject FROM '.acymailing_table('mail').' WHERE published = 2 AND senddate <= '.(time()+1200).' ORDER BY senddate ASC');
		return $db->loadObjectList('mailid');
	}
	function queueScheduled(){
		$this->messages = array();
		$mailReady = $this->getReadyMail();
		if(empty($mailReady)){
			$this->messages[] = JText::_('NO_SCHED');
			return false;
		}
		$this->nbNewsletterScheduled = count($mailReady);
		$queueClass = acymailing_get('class.queue');
		foreach($mailReady as $mailid => $mail){
			$nbQueue = $queueClass->queue($mailid,$mail->senddate);
			$this->messages[] = JText::sprintf('ADDED_QUEUE_SCHEDULE',$nbQueue,$mailid,$mail->subject);
		}
		$db = JFactory::getDBO();
		$db->setQuery('UPDATE '.acymailing_table('mail').' SET published = 1 WHERE mailid IN ('.implode(',',array_keys($mailReady)).')');
		$db->query();
		return true;
	}
}//endclass