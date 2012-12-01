<?php



defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."EnmasseHelper.class.php");



class EnmasseViewCcard extends JView

{

	function display($tpl = null)
	{
		$id = JRequest::getVar('uid');
		$delete = JRequest::getVar('delete');
		if ($delete =='yes')
		{
			$db = JFactory::getDbo();
			$juser = JFactory::getUser();
			$db->setQuery('delete  from #__cc_info where `userid`="'. $juser->id  .'" ');
			$db->query();
			JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_users&view=profile'));	
		}
		if (empty($id))
		{
			JRequest::setVar('task','add');
			$datapost = JRequest::get('post');
			if (!empty($datapost))
			{
			$db = JFactory::getDbo();
			$juser = JFactory::getUser();
			$time = time();
			$db->setQuery ("INSERT INTO `#__cc_info` ( `cc_number`, `cc_expire`, `cc_cvv`, `updated_at`, `userid`) VALUES ( '{$_POST['cc_number']}', '{$_POST['cc_expire']}', '{$_POST['cc_cvv']}', '{$time}', '{$juser->id}' )");
			$db->query();
			JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_users&view=profile'));
			}
		}
		else 
		{
		$datapost = JRequest::get('post');
			if (!empty($datapost))
			{
		JRequest::setVar('task','edit');
		$db = JFactory::getDbo();
			$juser = JFactory::getUser();
			$time = time();
			$db->setQuery('delete  from #__cc_info where `userid`="'. $juser->id  .'" ');
			$db->query();
			$db->setQuery ("INSERT INTO `#__cc_info` ( `cc_number`, `cc_expire`, `cc_cvv`, `updated_at`, `userid`) VALUES ( '{$_POST['cc_number']}', '{$_POST['cc_expire']}', '{$_POST['cc_cvv']}', '{$time}', '{$juser->id}' )");
			$db->query();
			JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_users&view=profile'));	
		}
			}
		parent::display($tpl);	
	}



}

?>