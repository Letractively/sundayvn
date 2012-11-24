<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view');

class EnmasseViewUploader extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title( JText::_( 'En Masse Uploader'),
                                           'generic.png' );
		$filePath = JRequest::getVar('folder');
        //
        //echo $filePath;
		$parentId = JRequest::getVar('parentId');
		$parent = JRequest::getVar('parent');
		$couponBg = JRequest::getVar('couponbg');
		
		$this->assignRef('couponbg', $couponBg );
		$this->assignRef('parentId', $parentId );
		$this->assignRef('parent', $parent );
		if(!empty($filePath))
		{
			$this->assignRef('imageUrl', $filePath );
		}
		
		parent::display($tpl);
	}

}
?>