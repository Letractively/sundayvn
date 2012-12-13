<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class GoogleMapLocationViewLocation extends JView {

    function display($tpl = null) {
        $oModelSetting = JModel::getInstance('setting', 'googlemaplocationModel');
        if ($oModelSetting instanceof GoogleMapLocationModelSetting)
            true;
        
        $oModelZone = JModel::getInstance('zone', 'googlemaplocationModel');
        if ($oModelZone instanceof GoogleMapLocationModelZone)
            true;
        
        $oModelType = JModel::getInstance('type', 'googlemaplocationModel');
        if ($oModelType instanceof GoogleMapLocationModelType)
            true;
        
        $oModelLocation = JModel::getInstance('location', 'googlemaplocationModel');
        if ($oModelLocation instanceof GoogleMapLocationModelLocation)
            true;
        
        $setting = $oModelSetting->getById(1);
        $zList = $oModelZone->getfilterZone();
        
        $filter_zone = array();
        if ($zList) {
            foreach ($zList as $zList) {
                $filter_zone[$zList->id] = $zList->name;
            }
        }

        $tList = $oModelType->getfilterType();
        $filter_zone_re = JRequest::getVar("filter_zone");
        
        if ($filter_zone_re) {
            $zone = $oModelZone->getZoneInByID($filter_zone_re);
        }

        $locationList = $oModelLocation->listAll();
        foreach ($locationList as $lList) {
            $lList->typeImages = $oModelLocation->getTypeImageById($lList->type);
            $lList->listService = $oModelLocation->getAllServiceByLocation($lList->id);
        }
        
        $address = $oModelLocation->getAddress();
        
        
        $this->assignRef('filter_zone', $filter_zone);
        $this->assignRef('zone', $zone);
        $this->assignRef('address', $address);
        $this->assignRef('tList', $tList);
        $this->assignRef('setting', $setting);
        $this->assignRef('locationList', $locationList);
        
        parent::display($tpl);
    }
}

?>