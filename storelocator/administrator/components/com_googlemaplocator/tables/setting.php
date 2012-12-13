<?php

class TableSetting extends JTable {

    var $id = null;
    var $default_location = null;

    function __construct(&$db) {
        parent::__construct('#__gm_setting', 'id', $db);
    }

}

?>