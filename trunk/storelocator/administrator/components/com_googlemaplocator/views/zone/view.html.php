<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class GoogleMapLocatorViewZone extends JView {

    protected $state;

    function display($tpl = null) {
        $task = JRequest::getWord('task');
        
        if ($task == 'edit' || $task == 'add') {
            $cid = JRequest::getVar('cid', array(0), '', 'array');

            TOOLBAR_googlemaplocator::_SMENU();
            TOOLBAR_googlemaplocator::_ZONENEW();
            
            $oModelZone = JModel::getInstance('zone', 'googlemaplocatorModel');

            $zone = $oModelZone->getById($cid[0]);
            
            $this->assignRef('zone', $zone);
        } else {
            TOOLBAR_googlemaplocator::_SMENU();
            TOOLBAR_googlemaplocator::_ZONE();

            /* Call the state object */
            $state = & $this->get('state');

            /* Get the values from the state object that were inserted in the model's construct function */
            $lists['order_Dir'] = $state->get('filter_order_Dir');
            $lists['order'] = $state->get('filter_order');

            $this->assignRef('lists', $lists);

            $zoneList = JModel::getInstance('zone', 'googlemaplocatorModel')->listAll();

            $this->assignRef('zoneList', $zoneList);
        }

        parent::display($tpl);
    }

}

?>