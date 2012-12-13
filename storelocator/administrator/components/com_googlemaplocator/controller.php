<?php

jimport('joomla.application.component.controller');

require_once( JPATH_ADMINISTRATOR . DS . "components" . DS . "com_googlemaplocator" . DS . "toolbar.googlemaplocator.html.php");

class GoogleMapLocatorController extends JController {

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
