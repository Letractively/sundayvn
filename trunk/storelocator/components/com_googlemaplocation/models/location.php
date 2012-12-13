<?php

defined('_JEXEC') or die();
jimport('joomla.application.component.model');

class GoogleMapLocationModelLocation extends JModel {

    function listAll() {
        $db = & JFactory::getDBO();
        $filter_zone = JRequest::getVar("filter_zone");
        $filter_type = JRequest::getVar("filter_type");
        $filter_service = JRequest::getVar("filter_service");
        $query = $db->getQuery(true);
        
        $query->select('l.*, t.type as lc_type');
        $query->from('#__gm_location as l');
        $query->join('left','#__gm_type AS t ON t.id = l.type');
        
        if($filter_zone)
            $query->where('l.zone_id = '.$db->quote($filter_zone));
            
        if($filter_type)
            $query->where('l.type = '.$db->quote($filter_type));
        
        if($filter_service)
        {
            $query->join('left','#__gm_location_service AS ls ON ls.location_id = l.id');
            $query->where('ls.service_id = '.$db->quote($filter_service));
        }
        
        $db->setQuery($query);
        $rows = $db->loadObjectList();

        if ($this->_db->getErrorNum()) {
            JError::raiseError(500, $this->_db->stderr());
            return false;
        }

        return $rows;
    }
    
    function getAddress()
    {
        $db = & JFactory::getDBO();
        $filter_zone = JRequest::getVar("filter_zone");
        $filter_type = JRequest::getVar("filter_type");
        $filter_address = JRequest::getVar("filter_address");
        $filter_service = JRequest::getVar("filter_service");
        
        if($filter_address)
        {
            //check all key search
            $list_key_address = explode(" ", $filter_address);
            $search_address = "( ";
            foreach($list_key_address as $i => $key_address)
            {
                if($i > 0)
                {
                    $search_address .= " AND LOWER(address) LIKE ".$db->quote("%".strtolower($key_address)."%");
                }
                else
                {
                    $search_address .= " LOWER(address) LIKE ".$db->quote("%".strtolower($key_address)."%");
                }
            }
            $search_address .= " )";
            
            //find address
            $query = $db->getQuery(true);
        
            $query->select('l.*');
            $query->from('#__gm_location as l');

            if($filter_zone)
                $query->where('l.zone_id = '.$db->quote($filter_zone));

            if($filter_type)
                $query->where('l.type = '.$db->quote($filter_type));

            if($filter_service)
            {
                $query->join('left','#__gm_location_service AS ls ON ls.location_id = l.id');
                $query->where('ls.service_id = '.$db->quote($filter_service));
            }
        
            $query->where($search_address);
            
            //echo $query; die;
            $db->setQuery($query);
            $rows = $db->loadObject();

            if ($this->_db->getErrorNum()) {
                JError::raiseError(500, $this->_db->stderr());
                return false;
            }

            return $rows;
        }
        else
            return "";
    }
    
    function getTypeImageById($id) {
        $db = & JFactory::getDBO();
        $query = "SELECT images FROM #__gm_type where id = " . $id;
        $db->setQuery($query);
        $row = $db->loadObject();

        return $row;
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
        $query = "SELECT * FROM #__gm_location where id = " . $data['id'];
        $db->setQuery($query);
        $rows = $db->loadObject();
        if ($rows->id) {
            $query = 'UPDATE #__gm_location SET name = "' . $data['name'] . '",type = "' . $data['type'] . '",description = "' . $data['description'] . '",loc_x = "' . $data['loc_x'] . '",loc_y  = "' . $data['loc_y'] . '" where id = ' . $rows->id;
            $db->setQuery($query);
            $db->query();
        } else {
            $query = 'INSERT INTO #__gm_location (name,type,description,loc_x,loc_y) VALUES ("' . $data['name'] . '","' . $data['type'] . '","' . $data['description'] . '","' . $data['loc_x'] . '","' . $data['loc_y'] . '")';
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
            $query = 'DELETE FROM #__gm_location WHERE id = ' . $cid;
            $db->setQuery($query);
            $db->query();
        }

        return true;
    }
    
    function getAllServiceByLocation($id)
    {
        $db = & JFactory::getDBO();
        $query = $db->getQuery(true);
        
        $query->select('l.*, s.service');
        $query->from('#__gm_location_service as l');
        $query->join('left','#__gm_service AS s ON s.id = l.service_id');
        $query->where('l.location_id = '.$db->quote($id));
        
        $db->setQuery($query);

        return $db->loadObjectList();
    }
}

?>