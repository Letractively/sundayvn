<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class GoogleMapLocatorViewType extends JView {

    protected $state;

    function display($tpl = null) {
        $task = JRequest::getWord('task');
        if ($task == 'edit' || $task == 'add') {
            $cid = JRequest::getVar('cid', array(0), '', 'array');

            TOOLBAR_googlemaplocator::_SMENU();
            TOOLBAR_googlemaplocator::_TYPENEW();

            $type = JModel::getInstance('type', 'googlemaplocatorModel')->getById($cid[0]);

            $this->assignRef('type', $type);
        } else {
            TOOLBAR_googlemaplocator::_SMENU();
            TOOLBAR_googlemaplocator::_TYPE();

            /* Call the state object */
            $state = & $this->get('state');

            /* Get the values from the state object that were inserted in the model's construct function */
            $lists['order_Dir'] = $state->get('filter_order_Dir');
            $lists['order'] = $state->get('filter_order');

            $this->assignRef('lists', $lists);

            $tList = JModel::getInstance('type', 'googlemaplocatorModel')->getfilterType();
            $filter_type = array();
            if ($tList) {
                foreach ($tList as $tList) {
                    $filter_type[$tList->id] = $tList->type;
                }
            }
            $typeList = JModel::getInstance('type', 'googlemaplocatorModel')->listAll();

            $this->assignRef('filter_type', $filter_type);
            $this->assignRef('typeList', $typeList);
        }

        parent::display($tpl);
    }

}

?>