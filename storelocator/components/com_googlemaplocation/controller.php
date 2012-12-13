<?php

jimport('joomla.application.component.controller');

class GoogleMapLocationController extends JController {

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
