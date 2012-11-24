<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
$my = JFactory::getUser();
if(empty($my->id)) die('You can not have access to this page, please log in first');
$config = acymailing_config();
if(!acymailing_isAllowed($config->get('acl_subscriber_manage','all'))) die('You are not allowed to access this page');
$frontHelper = acymailing_get('helper.acyfront');
include(ACYMAILING_BACK.'controllers'.DS.'subscriber.php');
class FrontsubscriberController extends SubscriberController{
	function __construct($config = array())
	{
		parent::__construct($config);
		$app = JFactory::getApplication();
		$listid = JRequest::getInt('listid');
		if(empty($listid)){
			$listid = JRequest::getInt('filter_lists');
		}
		if(empty($listid)){
			$listid = $app->getUserState( "com_acymailing.frontsubscriberfilter_lists");
		}
		if(empty($listid)){
			$listClass = acymailing_get('class.list');
			$allAllowedLists = $listClass->getFrontendLists();
			if(!empty($allAllowedLists)){
				$firstList = reset($allAllowedLists);
				$listid = $firstList->listid;
				JRequest::setVar('listid',$listid);
			}
		}
		JRequest::setVar('filter_lists',$listid);
		JRequest::setVar('listid',$listid);
		if(!acyCheckAccessList()){
			$app->enqueueMessage('You can not have access to this list','error');
			$this->setRedirect('index.php?option=com_acymailing');
			return false;
		}
		if(in_array(JRequest::getCmd('task'),array('edit','add')) && !acyCheckEditUser()){
			$app->enqueueMessage('This user does not belong to your list','error');
			$this->setRedirect('index.php?option=com_acymailing');
			return false;
		}
	}
}