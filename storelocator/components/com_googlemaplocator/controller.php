<?php

jimport('joomla.application.component.controller');

class GoogleMapLocatorController extends JController {

    function __construct($config = array()) {
        parent::__construct($config);
    }

    /**
     * Method to display the view
     */
    function display($cachable = false, $urlparams = false) {
        JRequest::setVar('view', 'location');

        JRequest::setVar('layout', 'show');

        return parent::display($cachable, $urlparams);
    }

}

?>
