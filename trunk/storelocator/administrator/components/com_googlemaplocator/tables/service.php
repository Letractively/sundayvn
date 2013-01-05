<?php

class TableService extends JTable {

    var $id = null;
    var $service = null;
    var $img_url = null;
    var $type_id = null;

    function __construct(&$db) {
        parent::__construct('#__gm_service', 'id', $db);
    }

}

?>