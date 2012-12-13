<?php

defined('_JEXEC') or die();
jimport('joomla.application.component.modellist');

class GoogleMapLocationModelType extends JModelList {

    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id',
                'type',
                'images',
                'description',
            );
        }
        parent::__construct($config);
        $mainframe = JFactory::getApplication();
        $option = '';
        $filter_order = $mainframe->getUserStateFromRequest($option . 'filter_order', 'filter_order', 'type', 'cmd');
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
        parent::populateState('type', 'asc');
    }

    function listAll() {
        $db = & JFactory::getDBO();

        $filter_type = JRequest::getVar('filter_type');

        $query = "SELECT * FROM #__gm_type";
        if ($filter_type) {
            $query .= ' where id = ' . $filter_type;
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

    public function getfilterType() {
        $db = & JFactory::getDBO();
        $query = 'SELECT id,type FROM #__gm_type';
        $db->setQuery($query);
        $typeList = $db->loadObjectList();
        return $typeList;
    }

    public function getTypeByID($typeId) {
        $db = & JFactory::getDBO();
        $query = 'SELECT type FROM #__gm_type WHERE id = ' . $typeId;
        $db->setQuery($query);
        $typeName = $db->loadObject();

        return $typeName;
    }

    function getById($id) {
        $db = & JFactory::getDBO();
        $query = "SELECT * FROM #__gm_type where id = " . $id;
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
        $query = "SELECT * FROM #__gm_type where id = " . $data['id'];
        $db->setQuery($query);
        $rows = $db->loadObject();
        if ($rows->id) {
            $query = 'UPDATE #__gm_type SET type = "' . $data['type'] . '",images = "' . $_FILES['images']['name'] . '",description = "' . $data['description'] . '" where id = ' . $rows->id;
            $db->setQuery($query);
            $db->query();
        } else {
            $query = 'INSERT INTO #__gm_type (type,images,description) VALUES ("' . $data['type'] . '","' . $_FILES['images']['name'] . '","' . $data['description'] . '")';
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
            $query = 'DELETE FROM #__gm_type WHERE id = ' . $cid;
            $db->setQuery($query);
            $db->query();
        }

        return true;
    }

}

?>