<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view');

class EnmasseViewUploader extends JView
{
	function display($tpl = null)
	{
		
		$filePath = JRequest::getVar('folder');
		$parentId = JRequest::getVar('parentId');
		$parent = JRequest::getVar('parent');
        $this->assignRef('parent', $parent );
		$this->assignRef('parentId', $parentId );
		if(!empty($filePath))
		{
			$this->assignRef('imageUrl', $filePath );
		}
		
		parent::display($tpl);
	}

}
?>