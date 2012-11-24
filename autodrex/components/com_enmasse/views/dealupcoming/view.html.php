<?php
 
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.view');
  
require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."EnmasseHelper.class.php");
 
class EnmasseViewDealUpComing extends JView
{
    function display($tpl = null)
    { 
        $dealList 	= JModel::getInstance('deal','enmasseModel')->upcomingDeal();
        $this->assignRef('dealList', $dealList );
        
        $this->_setPath('template',JPATH_SITE . DS ."components". DS ."com_enmasse". DS ."theme". DS .EnmasseHelper::getThemeFromSetting(). DS ."tmpl". DS);
    	$this->_layout="deal_upcoming";
        parent::display($tpl);
    }

}
?>