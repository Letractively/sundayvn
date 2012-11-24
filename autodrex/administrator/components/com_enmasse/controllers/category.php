<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');
JTable::addIncludePath('components'.DS.'com_enmasse'.DS.'tables');
require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse".DS."helpers". DS ."EnmasseHelper.class.php");

class EnmasseControllerCategory extends JController
{

	function display($cachable = false, $urlparams = false)
	{
		JRequest::setVar('view', 'category');
		JRequest::setVar('layout', 'show');
		parent::display();
	}
	function edit()
	{
		JRequest::setVar('view', 'category');
		JRequest::setVar('layout', 'edit');
		parent::display();
	}

	function add()
	{
		JRequest::setVar('view', 'category');
		JRequest::setVar('layout', 'edit');
		parent::display();
	}
	function save()
	{
		$data = JRequest::get('post');
		// trim space
		$data['name'] = trim ($data['name']);
		$data['description'] = trim($data['description']);
		
		$model = JModel::getInstance('category','enmasseModel');
		if(strlen($data['name']) > 50 || strlen($data['name']) < 2)
		{
			$msg = JText::_('SAVE_ERROR_MSG'). ": " .JText::_('CAT_NAME_SAVE_ERROR');
			if($data['id'] == null)
				$this->setRedirect('index.php?option=com_enmasse&controller='.JRequest::getVar('controller').'&task=add', $msg, 'error');
			else
				$this->setRedirect('index.php?option=com_enmasse&controller='.JRequest::getVar('controller').'&task=edit&cid[0]='. $data['id'], $msg, 'error');
		}
		else if ($data['description'] != "" && (strlen($data['description']) < 10 || strlen($data['description']) > 100))
		{
			$msg = JText::_('SAVE_ERROR_MSG'). ": " .JText::_('CAT_DESCRIP_SAVE_ERROR');
			if($data['id'] == null)
				$this->setRedirect('index.php?option=com_enmasse&controller='.JRequest::getVar('controller').'&task=add', $msg, 'error');
			else
				$this->setRedirect('index.php?option=com_enmasse&controller='.JRequest::getVar('controller').'&task=edit&cid[0]='. $data['id'], $msg, 'error');
		}
		else if ($model->store($data))
		{
			$msg = JText::_('SAVE_SUCCESS_MSG');
			$this->setRedirect('index.php?option=com_enmasse&controller='.JRequest::getVar('controller'), $msg);
		}
		else
		{
			$msg = JText::_('SAVE_ERROR_MSG') .": " . $model->getError();
			if($data['id'] == null)
				$this->setRedirect('index.php?option=com_enmasse&controller='.JRequest::getVar('controller').'&task=add', $msg, 'error');
			else
				$this->setRedirect('index.php?option=com_enmasse&controller='.JRequest::getVar('controller').'&task=edit&cid[0]='. $data['id'], $msg, 'error');
		}
	}
	
	function control()
	{
		$this->setRedirect('index.php?option=com_enmasse');
	}

	function remove()
	{
		$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		
		$model = JModel::getInstance('category','enmasseModel');
		$msg = "";
		for($count=0; $count <count($cids); $count++)
		{
			$dealList = JModel::getInstance("dealCategory","enmasseModel")->getDealByCategoryId($cids[$count]);
			if(count($dealList)!=0)
			{
				$category = $model->getById($cids[$count]);
				$msg .= $category->name.' ';
				$msg .= JText::_("CATEGORY_IS_BEING_ASSIGNED_TO_A_DEAL") . "<br />";
				unset($cids[$count]);				
			}
			
		}
		if($model->deleteList($cids))
		{
			
		}
		else
		{ 
			$msg .= JText::_('DELETE_ERROR_MSG') .": " . $model->getError();
			$this->setRedirect('index.php?option=com_enmasse&controller='.JRequest::getVar('controller'), $msg, 'error');
		}
		JFactory::getApplication()->redirect('index.php?option=com_enmasse&controller=category', $msg , 'error');
	}

	function publish()
	{
		EnmasseHelper::changePublishState(1,'enmasse_category','category','category');
	}
	function unpublish()
	{
		EnmasseHelper::changePublishState(0,'enmasse_category','category','category');
	}
	
	function checkDuplicatedCategory()
	{
		
		$categoryName = addslashes(JRequest::getVar("categoryName"));
		$categoryObj = JModel::getInstance('category','enmasseModel')->getCategoryByName($categoryName);
		if($categoryObj != null)
		 echo 'true';
		else
		 echo 'false';
		die;
		
	}
	
	
}
?>