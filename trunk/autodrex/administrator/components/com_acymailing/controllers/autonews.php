<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
acymailing_get('controller.newsletter');
class AutonewsController extends NewsletterController{
	var $aclCat = 'autonewsletters';
	function generate(){
		if(!$this->isAllowed('autonewsletters','manage')) return;
		$app = JFactory::getApplication();
		$autoNewsHelper = acymailing_get('helper.autonews');
		if(!$autoNewsHelper->generate()){
			$app->enqueueMessage(JText::_('NO_AUTONEWSLETTERS'),'notice');
			$db = JFactory::getDBO();
			$db->setQuery("SELECT * FROM ".acymailing_table('mail')." WHERE `type` = 'autonews'");
			$allAutonews = $db->loadObjectList();
			if(!empty($allAutonews)){
				$time = time();
				foreach($allAutonews as $oneAutonews){
					if(($oneAutonews->published != 1)){
						$app->enqueueMessage(JText::sprintf('AUTONEWS_NOT_PUBLISHED',$oneAutonews->subject),'notice');
					}elseif($oneAutonews->senddate >= $time){
						$app->enqueueMessage(JText::sprintf('AUTONEWS_NOT_READY',$oneAutonews->subject),'notice');
					}
				}
			}
		}else{
			foreach($autoNewsHelper->messages as $oneMessage){
				$app->enqueueMessage($oneMessage);
			}
		}
		return $this->listing();
	}
}