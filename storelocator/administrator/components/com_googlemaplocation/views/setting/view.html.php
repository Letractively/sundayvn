<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');
 
class GoogleMapLocationViewSetting extends JView
{
    function display($tpl = null)
    {       
        TOOLBAR_googlemaplocation::_SMENU();
    	TOOLBAR_googlemaplocation::_SETTING();
        
        $setting     = JModel::getInstance('setting','googlemaplocationModel')->getById(1);
        
        $this->assignRef( 'setting', $setting );
        
        parent::display($tpl);
    }
}
?>