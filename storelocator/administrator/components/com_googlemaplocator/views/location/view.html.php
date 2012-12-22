<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class GoogleMapLocatorViewLocation extends JView {

    protected $state;

    function display($tpl = null) {
        $task = JRequest::getWord('task');
        
        if ($task == 'edit' || $task == 'add') {
            $cid = JRequest::getVar('cid', array(0), '', 'array');

            TOOLBAR_googlemaplocator::_SMENU();
            TOOLBAR_googlemaplocator::_LOCATIONNEW();

            $location = JModel::getInstance('location', 'googlemaplocatorModel')->getById($cid[0]);
            
            $tList = JModel::getInstance('type', 'googlemaplocatorModel')->getfilterType();
            $select_type = array();
            if ($tList) {
                $select_type[""] = "-- Select Type --";
                foreach ($tList as $tList) {
                    $select_type[$tList->id] = $tList->type;
                }
            }

            $zList = JModel::getInstance('zone', 'googlemaplocatorModel')->getfilterZone();
            $select_zone = array();
            if ($zList) {
                $select_zone[""] = "-- Select Zone --";
                foreach ($zList as $zList) {
                    $select_zone[$zList->id] = $zList->name;
                }
            }
            
            $oModelService = JModel::getInstance('service', 'googlemaplocatorModel');
            $sList = $oModelService->getfilterService();
            
            $filter_service = array();
                
            if ($sList) {
                foreach ($sList as $i => $lc_service) {
                    if($oModelService->getServiceByLocationId($lc_service->id,$cid[0]) && $cid[0] != 0)
                    {
                        $sList[$i]->checked = 'checked';
                    } else {
                        $sList[$i]->checked = '';
                    }
                }
            }

            

            $this->assignRef('select_type', $select_type);
            $this->assignRef('select_zone', $select_zone);
            $this->assignRef('list_service', $sList);
            //$this->assignRef('select_service', $filter_service);
            $this->assignRef('location', $location);
        } else {
            TOOLBAR_googlemaplocator::_SMENU();
            TOOLBAR_googlemaplocator::_LOCATION();

            /* Call the state object */
            $state = & $this->get('state');

            /* Get the values from the state object that were inserted in the model's construct function */
            $lists['order_Dir'] = $state->get('filter_order_Dir');
            $lists['order'] = $state->get('filter_order');

            $this->assignRef('lists', $lists);

            $nameList = JModel::getInstance('location', 'googlemaplocatorModel')->getfilterName();
            $filter_name = array();
            foreach ($nameList as $nameList) {
                $filter_name[$nameList->name] = $nameList->name;
            }

            $tList = JModel::getInstance('type', 'googlemaplocatorModel')->getfilterType();
            $filter_type = array();
            if ($tList) {
                foreach ($tList as $tList) {
                    $filter_type[$tList->id] = $tList->type;
                }
            }

            $zList = JModel::getInstance('zone', 'googlemaplocatorModel')->getfilterZone();
            $filter_zone = array();
            if ($zList) {
                foreach ($zList as $zList) {
                    $filter_zone[$zList->id] = $zList->name;
                }
            }

            $locationList = JModel::getInstance('location', 'googlemaplocatorModel')->listAll();
            foreach ($locationList as $lList) {
                $lList->typeName = JModel::getInstance('type', 'googlemaplocatorModel')->getTypeByID($lList->type);
                $lList->zoneName = JModel::getInstance('zone', 'googlemaplocatorModel')->getZoneByID($lList->zone_id);
                //$lList->serviceName = JModel::getInstance('service', 'googlemaplocatorModel')->getServiceByID($lList->service_id);
            }

            $this->assignRef('filter_zone', $filter_zone);
            $this->assignRef('filter_type', $filter_type);
            $this->assignRef('filter_name', $filter_name);
            $this->assignRef('locationList', $locationList);
        }

        parent::display($tpl);
    }

}

?>