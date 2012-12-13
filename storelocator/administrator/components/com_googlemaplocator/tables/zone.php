<?php

class TableZone extends JTable {

    var $id = null;
    var $name = null;
    var $loc_x = null;
    var $loc_y = null;
    var $zoom_rate = null;

    function __construct(&$db) {
        parent::__construct('#__gm_zone', 'id', $db);
    }

}

?>