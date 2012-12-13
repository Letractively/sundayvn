<?php

// no direct access
defined('_JEXEC') or die;

//infor for locate_us
include_once JPATH_ROOT . DS . 'components' . DS . 'com_googlemaplocator' . DS . 'models' . DS . 'zone.php';
include_once JPATH_ROOT . DS . 'components' . DS . 'com_googlemaplocator' . DS . 'models' . DS . 'type.php';
include_once JPATH_ROOT . DS . 'components' . DS . 'com_googlemaplocator' . DS . 'models' . DS . 'service.php';

$oModelZone = JModel::getInstance('zone', 'googlemaplocatorModel');

$oModelType = JModel::getInstance('type', 'googlemaplocatorModel');

$oModelService = JModel::getInstance('service', 'googlemaplocatorModel');

$zList = $oModelZone->getfilterZone();

$list_filter_zone = array();
if ($zList) {
    foreach ($zList as $zList) {
        $list_filter_zone[$zList->id] = $zList->name;
    }
}

$tList = $oModelType->getfilterType();

$list_filter_type = array();
if ($tList) {
    foreach ($tList as $type) {
        $list_filter_type[$type->id] = $type->type;
    }
}

$sList = $oModelService->getfilterService();

$list_filter_service = array();
if ($sList) {
    foreach ($sList as $service) {
        $list_filter_service[$service->id] = $service->service;
    }
}

require JModuleHelper::getLayoutPath('mod_content_left');
