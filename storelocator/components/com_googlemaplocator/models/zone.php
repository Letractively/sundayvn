<?php

defined('_JEXEC') or die();
jimport('joomla.application.component.modellist');

class GoogleMapLocatorModelZone extends JModelList {

    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id',
                'name',
                'loc_x',
                'loc_y',
                'zoom_rate',
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
        $params = JComponentHelper::getParams('com_googlemaplocator');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('name', 'asc');
    }

    function listAll() {
        $db = & JFactory::getDBO();

        $query = "SELECT * FROM #__gm_zone";

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

    public function getfilterZone() {
        $db = JFactory::getDBO();
        $query = 'SELECT id, name FROM #__gm_zone';
        $db->setQuery($query);
        $zoneList = $db->loadObjectList();
        return $zoneList;
    }

    public function getZoneByID($zoneId) {
        $db = & JFactory::getDBO();
        $query = 'SELECT name FROM #__gm_zone WHERE id = ' . $zoneId;
        $db->setQuery($query);
        $zoneName = $db->loadObject();

        return $zoneName;
    }

    public function getZoneInByID($zoneId) {
        $db = & JFactory::getDBO();
        $query = 'SELECT * FROM #__gm_zone WHERE id = ' . $zoneId;
        $db->setQuery($query);
        $zone = $db->loadObject();

        return $zone;
    }

    function getById($id) {
        $db = & JFactory::getDBO();
        $query = "SELECT * FROM #__gm_zone where id = " . $id;
        $db->setQuery($query);
        $row = $db->loadObject();

        return $row;
    }

    function store($data) {
        $db = & JFactory::getDBO();

        $query = "SELECT * FROM #__gm_zone where id = " . $data['id'];
        $db->setQuery($query);
        $rows = $db->loadObject();
        if ($rows->id) {
            $query = 'UPDATE #__gm_zone SET name = "' . $data['name'] . '",loc_x = "' . $data['loc_x'] . '",loc_y = "' . $data['loc_y'] . '",zoom_rate = "' . $data['zoom_rate'] . '" where id = ' . $rows->id;
            $db->setQuery($query);
            $db->query();
        } else {
            $query = 'INSERT INTO #__gm_zone (name,loc_x,loc_y,zoom_rate) VALUES ("' . $data['name'] . '","' . $data['loc_x'] . '","' . $data['loc_y'] . '","' . $data['zoom_rate'] . '")';
            $db->setQuery($query);
            if (!$db->query()) {
                echo $this->_db->getErrorMsg();
                return false;
            }
        }
        return true;
    }

    function deleteList($cids) {
        $db = & JFactory::getDBO();
        foreach ($cids as $cid) {
            $query = 'DELETE FROM #__gm_zone WHERE id = ' . $cid;
            $db->setQuery($query);
            $db->query();
        }

        return true;
    }

}

?>