<?php

class TableLocation extends JTable {

    var $id = null;
    var $name = null;
    var $zone_id = null;
    var $type = null;
    var $service_id = null;
    var $address = null;
    var $description = null;
    var $loc_x = null;
    var $loc_y = null;

    function __construct(&$db) {
        parent::__construct('#__gm_location', 'id', $db);
    }

}

?>