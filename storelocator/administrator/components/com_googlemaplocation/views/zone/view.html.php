<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class GoogleMapLocationViewZone extends JView {

    protected $state;

    function display($tpl = null) {
        $task = JRequest::getWord('task');
        
        if ($task == 'edit' || $task == 'add') {
            $cid = JRequest::getVar('cid', array(0), '', 'array');

            TOOLBAR_googlemaplocation::_SMENU();
            TOOLBAR_googlemaplocation::_ZONENEW();
            
            $oModelZone = JModel::getInstance('zone', 'googlemaplocationModel');
            if ($oModelZone instanceof GoogleMapLocationModelZone)
                true;

            $zone = $oModelZone->getById($cid[0]);
            
            $this->assignRef('zone', $zone);
        } else {
            TOOLBAR_googlemaplocation::_SMENU();
            TOOLBAR_googlemaplocation::_ZONE();

            /* Call the state object */
            $state = & $this->get('state');

            /* Get the values from the state object that were inserted in the model's construct function */
            $lists['order_Dir'] = $state->get('filter_order_Dir');
            $lists['order'] = $state->get('filter_order');

            $this->assignRef('lists', $lists);

            $zoneList = JModel::getInstance('zone', 'googlemaplocationModel')->listAll();

            $this->assignRef('zoneList', $zoneList);
        }

        parent::display($tpl);
    }

}

?>