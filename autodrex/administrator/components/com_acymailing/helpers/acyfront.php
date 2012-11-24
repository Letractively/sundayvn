<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class acyfrontHelper{
}
function acyCheckAccessList(){
	$listid = JRequest::getInt('listid');
	if(empty($listid)) return false;
	$my = JFactory::getUser();
	$listClass = acymailing_get('class.list');
	$myList = $listClass->get($listid);
	if(empty($myList->listid)) die('Invalid List');
	if(!empty($my->id) AND (int)$my->id == (int)$myList->userid) return true;
	if(empty($my->id) OR $myList->access_manage =='none') return false;
	if($myList->access_manage != 'all'){
		if(!acymailing_isAllowed($myList->access_manage)) return false;
	}
	return true;
}
function acyCheckEditUser(){
	$listid = JRequest::getInt('listid');
	$subid = acymailing_getCID('subid');
	if(empty($subid)) return true;
	$db = JFactory::getDBO();
	$db->setQuery('SELECT status FROM #__acymailing_listsub WHERE subid='.intval($subid).' AND listid = '.intval($listid));
	$status = $db->loadResult();
	if(empty($status)) return false;
	return true;
}