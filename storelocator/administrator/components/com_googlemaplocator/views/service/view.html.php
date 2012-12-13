<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class GoogleMapLocatorViewService extends JView {

    protected $state;

    function display($tpl = null) {
        $task = JRequest::getWord('task');
        $oModelService = JModel::getInstance('service', 'googlemaplocatorModel');
        if ($task == 'edit' || $task == 'add') {
            $cid = JRequest::getVar('cid', array(0), '', 'array');

            TOOLBAR_googlemaplocator::_SMENU();
            TOOLBAR_googlemaplocator::_SERVICENEW();

            $service = $oModelService->getById($cid[0]);
            
            $tList = $oModelService->getType();
            $list_type = array();
            if ($tList) {
                foreach ($tList as $tList) {
                    $list_type[$tList->id] = $tList->type;
                }
            }
            
            $this->assignRef('list_type', $list_type);
            $this->assignRef('service', $service);
        } else {
            TOOLBAR_googlemaplocator::_SMENU();
            TOOLBAR_googlemaplocator::_SERVICE();

            /* Call the state object */
            $state = & $this->get('state');

            /* Get the values from the state object that were inserted in the model's construct function */
            $lists['order_Dir'] = $state->get('filter_order_Dir');
            $lists['order'] = $state->get('filter_order');

            $this->assignRef('lists', $lists);

            $tList = $oModelService->getfilterService();
            $filter_service = array();
            if ($tList) {
                foreach ($tList as $tList) {
                    $filter_service[$tList->id] = $tList->service;
                }
            }
            $serviceList = $oModelService->listAll();
            
            foreach($serviceList as $i => $lc_service)
            {
                $serviceList[$i]->type_name = $oModelService->getTypeNameById($lc_service->type_id)->type;
            }

            $this->assignRef('filter_service', $filter_service);
            $this->assignRef('serviceList', $serviceList);
        }

        parent::display($tpl);
    }

}

?>