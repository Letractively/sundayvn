<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class GoogleMapLocatorViewLocation extends JView {

    function display($tpl = null) {
        $oModelSetting = JModel::getInstance('setting', 'googlemaplocatorModel');
        $oModelZone = JModel::getInstance('zone', 'googlemaplocatorModel');
        $oModelType = JModel::getInstance('type', 'googlemaplocatorModel');
        $oModelLocation = JModel::getInstance('location', 'googlemaplocatorModel');
        
        $setting = $oModelSetting->getById(1);
        $servicesList = JModel::getInstance('service', 'googlemaplocatorModel')->getall();
        $zList = $oModelZone->getfilterZone();
        
        $filter_zone = array();
        if ($zList) {
            foreach ($zList as $zList) {
                $filter_zone[$zList->id] = $zList->name;
            }
        }

        $tList = $oModelType->getfilterType();
        $filter_zone_re = JRequest::getVar("filter_zone");
        $filter_array_serv = JRequest::getVar("checkboxsv",'','post');
        $session = JFactory::getSession();
	
	if(!empty($_POST['updatefilter']))
	{
		$session->set('checkboxsv', $filter_array_serv);
	}
	$filter_array_serv =$session->get('checkboxsv');
        if (empty($filter_array_serv))
	{
		$filter_array_serv =array();
	}
	if ($filter_zone_re) {
            $zone = $oModelZone->getZoneInByID($filter_zone_re);
        }
        
        $locationList = $oModelLocation->listAll();
        
        $arTemp = array();
        
    
        
        $locationList = $arTemp;
                
        $address = $oModelLocation->getAddress();
        
        $this->assignRef('filter_zone', $filter_zone);
        $this->assignRef('zone', $zone);
        $this->assignRef('address', $address);
        $this->assignRef('servicesList', $servicesList);
        $this->assignRef('tList', $tList);
        $this->assignRef('setting', $setting);
        $this->assignRef('filter_array_serv', $filter_array_serv);
        $this->assignRef('locationList', $locationList);
        
        parent::display($tpl);
    }
}

?>