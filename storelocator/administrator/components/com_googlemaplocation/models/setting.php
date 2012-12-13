<?php

defined('_JEXEC') or die();
jimport('joomla.application.component.modellist');

class GoogleMapLocationModelSetting extends JModelList {

    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id',
                'default_locx',
                'default_locy',
            );
        }
        parent::__construct($config);
    }

    function getById($id) {
        $db = & JFactory::getDBO();
        $query = "SELECT * FROM #__gm_setting where id = " . (int) $id;
        $db->setQuery($query);
        $row = $db->loadObject();

        return $row;
    }

    function store($data) {
        $db = & JFactory::getDBO();
        
        $data['default_locx'] = $db->getEscaped($data['default_locx']);
        $data['default_locy'] = $db->getEscaped($data['default_locy']);
        $data['default_zoom'] = $db->getEscaped($data['default_zoom']);
        $data['id'] = (int) $data['id'];
        
        $query = 'UPDATE #__gm_setting SET default_locx = "' . $data['default_locx'] . '",default_locy = "' . $data['default_locy'] . '",default_zoom = "' . $data['default_zoom'] . '" where id = ' . $data['id'];
        $db->setQuery($query);
        $db->query();

        return true;
    }

}

?>