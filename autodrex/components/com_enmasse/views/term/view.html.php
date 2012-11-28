<?php


defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.view');require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."EnmasseHelper.class.php");

class enmasseViewterm extends JView
{
    function display($tpl = null)
    {$settings= EnmasseHelper::getSetting();$art_id= $settings->article_id;$db = JFactory::getDBO();$db->setQuery('select `title`,`introtext` from #__content where `id`="'. $art_id .'"');$result = $db->loadRow();echo '<h1>'.$result[0].'</h1>';echo $result[1];die;
    }

}
?>