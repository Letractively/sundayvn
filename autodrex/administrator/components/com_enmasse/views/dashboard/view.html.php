<?php



defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view');
require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."toolbar.enmasse.html.php");
 
class EnmasseViewDashBoard extends JView
{
    function display($tpl = null)
    { 
        TOOLBAR_enmasse::_DEFAULT();
        parent::display($tpl);
    }
}
?>