<?php

defined('_JEXEC') or die();
jimport('joomla.application.component.modellist');

class GoogleMapLocationModelService extends JModelList {

    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id',
                'service',
                'type_id'
            );
        }
        parent::__construct($config);
        $mainframe = JFactory::getApplication();
        $option = '';
        $filter_order = $mainframe->getUserStateFromRequest($option . 'filter_order', 'filter_order', 'service', 'cmd');
        $filter_order_Dir = $mainframe->getUserStateFromRequest($option . 'filter_order_Dir', 'filter_order_Dir', 'asc', 'word');

        $result = array_search($filter_order, $config['filter_fields']);
        if (empty($result)) {
            $filter_order = "";
        }

        $this->setState('filter_order', $filter_order);
        $this->setState('filter_order_Dir', $filter_order_Dir);
    }

    

    public function getfilterService() {
        $db = & JFactory::getDBO();
        $query = 'SELECT * FROM #__gm_service';
        $db->setQuery($query);
        $serviceList = $db->loadObjectList();
        return $serviceList;
    }
    
    public function getfilterServiceByType($type_id) {
        $db = & JFactory::getDBO();
        $query = 'SELECT * FROM #__gm_service WHERE type_id = '.$db->quote($type_id);
        $db->setQuery($query);
        $serviceList = $db->loadObjectList();
        return $serviceList;
    }
}

?>