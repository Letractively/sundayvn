<?php

defined('_JEXEC') or die();
jimport('joomla.application.component.modellist');

class GoogleMapLocatorModelType extends JModelList {

    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id',
                'type',
                'images',
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
        $params = JComponentHelper::getParams('com_googlemaplocator');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('type', 'asc');
    }

    function listAll() {
        $db = & JFactory::getDBO();

        $filter_search = JRequest::getVar("filter_search");
        $filter_type = JRequest::getVar('filter_type');

        $query = "SELECT * FROM #__gm_type";
        $flag = 0;
        if ($filter_search != "") {
            $search = $db->Quote('%' . $db->getEscaped($filter_search, true) . '%');
            $query .= ' where type LIKE ' . $search;
            $flag = 1;
        }
        if ($filter_type) {
            if($flag == 0)
                $query .= ' where id = ' . $filter_type;
            else
                $query .= ' AND id = ' . $filter_type;
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
        if (empty($_FILES['images']['name'])) {
            $data['file_name'] = $this->_getFileNameURL($data['images_tmp']);
        } else {
            $data['file_name'] = $this->_getFileNameURL($_FILES['images']['name']);
            
            $target_path = JPATH_ROOT . DS . "components/com_googlemaplocator/uploads/";
            
            $target_path = $target_path . basename($data['file_name']);
            
            move_uploaded_file($_FILES['images']['tmp_name'], $target_path);
        }

        $rows = $this->getById($data['id']);
        
        if ($rows->id) {
            $this->updateType($data, $rows->id);
        } else {
            $this->insertType($data);
        }
        
        return true;
    }

    function insertType($data) {
        $db = & JFactory::getDBO();
        
        $data['type'] = $db->getEscaped($data['type'], true);

        $query = 'INSERT INTO #__gm_type (type,images) VALUES ("' . $data['type'] . '","' . $data['file_name'] . '")';
        $db->setQuery($query);
        if (!$db->query()) {
            echo $this->_db->getErrorMsg();
            return false;
        }
    }

    function updateType($data, $id) {
        $db = & JFactory::getDBO();

        $data['type'] = $db->getEscaped($data['type'], true);
        
        $query = 'UPDATE #__gm_type SET type = "' . $data['type'] . '",images = "' . $data['file_name'] . '" where id = ' . (int) $id;
        $db->setQuery($query);
        $db->query();
    }

    function deleteList($cids) {
        $db = & JFactory::getDBO();
        foreach ($cids as $cid) {
            $query = 'DELETE FROM #__gm_type WHERE id = ' . (int) $cid;
            $db->setQuery($query);
            $db->query();
        }

        return true;
    }

    private function _getFileNameURL($strFileName) {
        // Get filename with extension.
        $strFileName = JFile::getName($strFileName);
        
        // Get file extension.
        $strExt = JFile::getExt($strFileName);
        
        // Get filename without extension.
        $strName = substr($strFileName, 0, - strlen($strExt));
        
        // Get filename with safe url.
        $strNameWithExt = JFilterOutput::stringURLSafe($strName) . '.' . $strExt;
        
        // return value.
        return $strNameWithExt;
    }
}

?>