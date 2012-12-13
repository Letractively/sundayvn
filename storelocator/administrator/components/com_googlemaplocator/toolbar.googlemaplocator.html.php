<?php

class TOOLBAR_googlemaplocator {

    function _SMENU() {
        JSubMenuHelper::addEntry(JText::_('_SMENU_SETTING'), 'index.php?option=com_googlemaplocator&controller=setting');
        JSubMenuHelper::addEntry(JText::_('_SMENU_ZONE'), 'index.php?option=com_googlemaplocator&controller=zone');
        JSubMenuHelper::addEntry(JText::_('_SMENU_TYPE'), 'index.php?option=com_googlemaplocator&controller=type');
        JSubMenuHelper::addEntry(JText::_('_SMENU_SERVICE'), 'index.php?option=com_googlemaplocator&controller=service');
        JSubMenuHelper::addEntry(JText::_('_SMENU_LOCATION'), 'index.php?option=com_googlemaplocator&controller=location');
    }

    function _LOCATION() {
        require_once JPATH_COMPONENT . '/helpers/googlemaplocator.php';
        $canDo = GoogleMapLocatorHelper::getActions();

        JToolBarHelper::title(JText::_('LOCATION_MANAGEMENT'), 'generic.png');
        JToolBarHelper::addNew();
        JToolBarHelper::editList();
        JToolBarHelper::deleteList();
        if ($canDo->get('core.admin')) {
            JToolBarHelper::preferences('com_googlemaplocator');
            JToolBarHelper::divider();
        }
    }

    function _LOCATIONNEW() {
        $task = JRequest::getCmd('task');
        JToolBarHelper::title(JText::_('LOCATION_MANAGEMENT') . ' : [' . $task . ']', 'generic.png');
        JToolBarHelper::save();
        JToolBarHelper::cancel();
    }

    function _TYPE() {
        JToolBarHelper::title(JText::_('TYPE_MANAGEMENT'), 'generic.png');
        JToolBarHelper::addNew();
        JToolBarHelper::editList();
        JToolBarHelper::deleteList();
    }

    function _TYPENEW() {
        $task = JRequest::getCmd('task');
        JToolBarHelper::title(JText::_('TYPE_MANAGEMENT') . ' : [' . $task . ']', 'generic.png');
        JToolBarHelper::save();
        JToolBarHelper::cancel();
    }
    
    function _SERVICE() {
        JToolBarHelper::title(JText::_('SERVICE_MANAGEMENT'), 'generic.png');
        JToolBarHelper::addNew();
        JToolBarHelper::editList();
        JToolBarHelper::deleteList();
    }

    function _SERVICENEW() {
        $task = JRequest::getCmd('task');
        JToolBarHelper::title(JText::_('SERVICE_MANAGEMENT') . ' : [' . $task . ']', 'generic.png');
        JToolBarHelper::save();
        JToolBarHelper::cancel();
    }

    function _ZONE() {
        JToolBarHelper::title(JText::_('ZONE_MANAGEMENT'), 'generic.png');
        JToolBarHelper::addNew();
        JToolBarHelper::editList();
        JToolBarHelper::deleteList();
    }

    function _ZONENEW() {
        $task = JRequest::getCmd('task');
        JToolBarHelper::title(JText::_('ZONE_MANAGEMENT') . ' : [' . $task . ']', 'generic.png');
        JToolBarHelper::save();
        JToolBarHelper::cancel();
    }

    function _SETTING() {
        $task = JRequest::getCmd('task');
        JToolBarHelper::title(JText::_('SETTING_MANAGEMENT'), 'generic.png');
        JToolBarHelper::save();
        //JToolBarHelper::cancel();
    }

}

?>