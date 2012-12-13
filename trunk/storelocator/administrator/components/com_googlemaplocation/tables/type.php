<?php

class TableType extends JTable {

    var $id = null;
    var $type = null;
    var $images = null;

    function __construct(&$db) {
        parent::__construct('#__gm_location', 'id', $db);
    }

}

?>