<?php

// no direct access
defined('_JEXEC') or die;

class modMapLegendHelper {

    public static function getLegendService() {
        $db = JFactory::getDBO();
        $query = 'SELECT * FROM #__gm_type ORDER BY type ASC';
        $db->setQuery($query);
        $typeList = $db->loadObjectList();
        return $typeList;
    }

}
