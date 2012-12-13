<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');
 
class GoogleMapLocatorViewSetting extends JView
{
    function display($tpl = null)
    {       
        TOOLBAR_googlemaplocator::_SMENU();
    	TOOLBAR_googlemaplocator::_SETTING();
        
        $setting     = JModel::getInstance('setting','googlemaplocatorModel')->getById(1);
        
        $this->assignRef( 'setting', $setting );
        
        parent::display($tpl);
    }
}
?>