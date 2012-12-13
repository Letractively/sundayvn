<?php

defined('_JEXEC') or die();
jimport('joomla.application.component.modellist');

class GoogleMapLocationModelLocation extends JModelList {

    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id',
                'name',
                'zone_id',
                'type',
                'service_id',
                'address',
                'description',
                'postal_code',
                'loc_x',
                'loc_y',
            );
        }
        parent::__construct($config);
        $mainframe = JFactory::getApplication();

        $option = '';
        $filter_order = $mainframe->getUserStateFromRequest($option . 'filter_order', 'filter_order', 'name', 'cmd');
        $filter_order_Dir = $mainframe->getUserStateFromRequest($option . 'filter_order_Dir', 'filter_order_Dir', 'asc', 'word');

        $result = array_search($filter_order, $config['filter_fields']);
        if (empty($result)) {
            $filter_order = "";
        }

        $this->setState('filter_order', $filter_order);
        $this->setState('filter_order_Dir', $filter_order_Dir);
    }

    protected function populateState($ordering = null, $direction = null) {
        // Initialise variables.
        $app = JFactory::getApplication('administrator');

        // Load the parameters.
        $params = JComponentHelper::getParams('com_googlemaplocation');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('name', 'asc');
    }

    function listAll() {
        $db = & JFactory::getDBO();

        $filter_search = JRequest::getVar("filter_search");
        $filter_name = JRequest::getVar("filter_name");
        $filter_zone = JRequest::getVar('filter_zone');
        $filter_type = JRequest::getVar('filter_type');

        $query = "SELECT * FROM #__gm_location";
        
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__gm_location');
        
        if($filter_search != "")
        {
            $query->where('name LIKE '.$db->quote('%' . $db->getEscaped($filter_search, true) . '%'));
        }
        
        if($filter_zone)
        {
            $query->where('zone_id = '.$db->quote($filter_zone));
        }
        
        if($filter_type)
        {
            $query->where('type = '.$db->quote($filter_type));
        }
        
        $filter_order = $this->getState('filter_order');
        $filter_order_Dir = $this->getState('filter_order_Dir');
        
        if (!empty($filter_order) && !empty($filter_order_Dir))
        {
            $query->order($filter_order.' '.$filter_order_Dir);
        }
        

        $db->setQuery($query);
        $rows = $db->loadObjectList();

        if ($this->_db->getErrorNum()) {
            JError::raiseError(500, $this->_db->stderr());
            return false;
        }

        return $rows;
    }

    public function getfilterName() {
        $db = & JFactory::getDBO();
        $query = 'SELECT name FROM #__gm_location';
        $query .= ' GROUP BY name';
        $db->setQuery($query);
        $nameList = $db->loadObjectList();

        return $nameList;
    }

    function getById($id) {
        $db = & JFactory::getDBO();
        $query = "SELECT * FROM #__gm_location where id = " . $id;
        $db->setQuery($query);
        $row = $db->loadObject();

        return $row;
    }

    function store($data) {
        $db = & JFactory::getDBO();
        
        $rows = $this->getById($data['id']);
        if ($rows->id) {
            $this->updateLocation($data, $rows->id);
            $this->updateLocationService($data['location_service'], $data['id']);
        } else {
            $id = $this->insertLocation($data);
            $this->updateLocationService($data['location_service'], $id );
        }
        return true;
    }
    
    function updateLocationService($list_service, $id) {
        $db = & JFactory::getDBO();
        
        //deltete all exist service for this location
        $query = 'DELETE FROM #__gm_location_service WHERE location_id = '.$db->quote($id);
        $db->setQuery($query);
        $db->query();
        
        //add new service for location
        foreach($list_service as $service)
        {
            $this->insertLocationService($service, $id);
        }
    }
    
    function insertLocationService($service_id, $id) {
        $db = & JFactory::getDBO();
        $query = $db->getQuery(true);
        //deltete all exist service for this location
        $query->insert('#__gm_location_service');
        $query->set('service_id = '.$db->quote($service_id));
        $query->set('location_id = '.$db->quote($id));
        
        $db->setQuery($query);
        $db->query();
    }
    
    function insertLocation($data) {
        $db = & JFactory::getDBO();
        
        $data['name'] = $db->getEscaped($data['name']);
        $data['zone_id'] = (int) $data['zone_id'];
        $data['type'] = $db->getEscaped($data['type']);
        $data['address'] = $db->getEscaped($data['address']);
        $data['postal_code'] = (int) $data['postal_code'];
        $data['loc_x'] = (float) $data['loc_x'];
        $data['loc_y'] = (float) $data['loc_y'];
        $id = (int) $id;
        
        $query = 'INSERT INTO #__gm_location (name,zone_id,type,address,description,postal_code,loc_x,loc_y) VALUES ("' . $data['name'] . '","' . $data['zone_id'] . '","' . $data['type'] . '","' . $data['address'] . '","' . $data['description'] . '","' . $data['postal_code'] . '","' . $data['loc_x'] . '","' . $data['loc_y'] . '")';
        
        $db->setQuery($query);
        
        if (!$db->query()) {
            JError::raiseError($db->getErrorNum(), $db->getErrorMsg());
            return false;
        }
        
        return $db->insertid();
    }

    function updateLocation($data, $id) {
        $data['description'] = JRequest::getVar('description',null,  'default' , 'none', JREQUEST_ALLOWHTML);
        
        $db = & JFactory::getDBO();
        
        $data['name'] = $db->getEscaped($data['name']);
        $data['zone_id'] = (int) $data['zone_id'];
        $data['type'] = $db->getEscaped($data['type']);
        $data['address'] = $db->getEscaped($data['address']);
        $data['postal_code'] = (int) $data['postal_code'];
        $data['loc_x'] = (float) $data['loc_x'];
        $data['loc_y'] = (float) $data['loc_y'];
        $id = (int) $id;
        
        $query = 'UPDATE #__gm_location SET name = "' . $data['name'] . '", zone_id = "' . $data['zone_id'] . '",type = "' . $data['type'] . '",address = "' . $data['address'] . '",description = "' . $data['description'] . '",postal_code = "' . $data['postal_code'] . '",loc_x = "' . $data['loc_x'] . '",loc_y  = "' . $data['loc_y'] . '" where id = ' . $id;
        
        $db->setQuery($query);
        
        $db->query();
    }

    function deleteList($cids) {
        $db = & JFactory::getDBO();
        foreach ($cids as $cid) {
            $query = 'DELETE FROM #__gm_location WHERE id = ' . $cid;
            $db->setQuery($query);
            $db->query();
        }

        return true;
    }

}

?>