<?php

defined('_JEXEC') or die();
jimport('joomla.application.component.modellist');

class GoogleMapLocationModelService extends JModelList {

    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id',
                'service',
                'type_id',
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

    protected function populateState($ordering = null, $direction = null) {
        // Initialise variables.
        $app = JFactory::getApplication('administrator');

        // Load the parameters.
        $params = JComponentHelper::getParams('com_googlemaplocation');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('service', 'asc');
    }

    function listAll() {
        $db = & JFactory::getDBO();

        $filter_search = JRequest::getVar("filter_search");
        $filter_service = JRequest::getVar('filter_service');

        $query = "SELECT * FROM #__gm_service";
        $flag = 0;
        if ($filter_search != "") {
            $search = $db->Quote('%' . $db->getEscaped($filter_search, true) . '%');
            $query .= ' where service LIKE ' . $search;
            $flag = 1;
        }
        if ($filter_service) {
            if($flag == 0)
                $query .= ' where id = ' . $filter_service;
            else
                $query .= ' AND id = ' . $filter_service;
        }

        $orderby = '';
        $filter_order = $this->getState('filter_order');
        $filter_order_Dir = $this->getState('filter_order_Dir');

        /* Error handling is never a bad thing */
        if (!empty($filter_order) && !empty($filter_order_Dir)) {
            $orderby = ' ORDER BY ' . $filter_order . ' ' . $filter_order_Dir;
        }
        $query = $query . $orderby;

        $db->setQuery($query);
        $rows = $db->loadObjectList();

        if ($this->_db->getErrorNum()) {
            JError::raiseError(500, $this->_db->stderr());
            return false;
        }

        return $rows;
    }

    public function getfilterService() {
        $db = & JFactory::getDBO();
        $query = 'SELECT id,service FROM #__gm_service';
        $db->setQuery($query);
        $serviceList = $db->loadObjectList();
        return $serviceList;
    }
    
    public function getType() {
        $db = & JFactory::getDBO();
        $query = 'SELECT id,type FROM #__gm_type';
        $db->setQuery($query);
        $typeList = $db->loadObjectList();
        return $typeList;
    }
    
    public function getTypeNameById($type_id) {
        $db = & JFactory::getDBO();
        $query = 'SELECT type FROM #__gm_type WHERE id = '.$db->quote($type_id);
        $db->setQuery($query);
        $typeName = $db->loadObject();
        return $typeName;
    }
    
    public function getServiceByID($serviceId) {
        $db = & JFactory::getDBO();
        $query = 'SELECT service FROM #__gm_service WHERE id = ' . $serviceId;
        $db->setQuery($query);
        $serviceName = $db->loadObject();

        return $serviceName;
    }

    function getById($id) {
        $db = & JFactory::getDBO();
        $query = "SELECT * FROM #__gm_service where id = " . $id;
        $db->setQuery($query);
        $row = $db->loadObject();

        return $row;
    }

    function store($data) {
        $db = & JFactory::getDBO();

        if (empty($_FILES['images']['name'])) {
            $_FILES['images']['name'] = $data['images_tmp'];
        } else {
            $target_path = "../components/com_googlemaplocation/uploads/";
            $target_path = $target_path . basename($_FILES['images']['name']);
            move_uploaded_file($_FILES['images']['tmp_name'], $target_path);
        }

        $rows = $this->getById($data['id']);
        if ($rows->id) {
            $this->updateService($data, $rows->id);
        } else {
            $this->insertService($data);
        }
        return true;
    }

    function insertService($data) {
        $db = & JFactory::getDBO();
        
        $data['service'] = $db->getEscaped($data['service'], true);

        $query = 'INSERT INTO #__gm_service (service,type_id) VALUES ("' . $data['service'] . '","' . $data['type_id'] . '")';
        $db->setQuery($query);
        if (!$db->query()) {
            echo $this->_db->getErrorMsg();
            return false;
        }
    }

    function updateService($data, $id) {
        $db = & JFactory::getDBO();

        $data['service'] = $db->getEscaped($data['service'], true);
        
        $query = 'UPDATE #__gm_service SET service = "' . $data['service'] . '",type_id = "' . $data['type_id'] . '" where id = ' . (int) $id;
        $db->setQuery($query);
        $db->query();
    }

    function deleteList($cids) {
        $db = & JFactory::getDBO();
        foreach ($cids as $cid) {
            $query = 'DELETE FROM #__gm_service WHERE id = ' . (int) $cid;
            $db->setQuery($query);
            $db->query();
        }

        return true;
    }
    
    public function getServiceByLocationId($service_id, $location_id){
        $db = & JFactory::getDBO();
        $query = 'SELECT * FROM #__gm_location_service WHERE service_id = '.$db->quote($service_id).' AND location_id = '.$db->quote($location_id);
        $db->setQuery($query);
        return $db->loadObject();
    }
}

?>