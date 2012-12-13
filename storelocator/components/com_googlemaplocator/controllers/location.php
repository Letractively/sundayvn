<?php

jimport('joomla.application.component.controller');

class GoogleMapLocatorControllerLocation extends JController {

    public function display($cachable = false, $urlparams = false) {
        JRequest::setVar('view', 'location');
        JRequest::setVar('layout', 'show');
        parent::display();
    }

    function googlemap() {
        JRequest::setVar('view', 'location');
        JRequest::setVar('layout', 'googlemap');
        parent::display();
    }

    function add() {
        JRequest::setVar('view', 'location');
        JRequest::setVar('layout', 'edit');
        parent::display();
    }

    function edit() {
        JRequest::setVar('view', 'location');
        JRequest::setVar('layout', 'edit');
        parent::display();
    }

    function save() {
        $data = JRequest::get('post');
        $model = JModel::getInstance('location', 'googlemaplocatorModel');
        if ($model->store($data)) {
            $msg = JText::_('SAVE_SUCCESS_MSG');
            $this->setRedirect('index.php?option=com_googlemaplocator&controller=' . JRequest::getVar('controller'), $msg);
        } else {
            $msg = JText::_('SAVE_ERROR_MSG') . ": " . $model->getError();
            if ($data['id'] == null)
                $this->setRedirect('index.php?option=com_googlemaplocator&controller=' . JRequest::getVar('controller') . '&task=add', $msg, 'error');
            else
                $this->setRedirect('index.php?option=com_googlemaplocator&controller=' . JRequest::getVar('controller') . '&task=edit&cid[0]=' . $data['id'], $msg, 'error');
        }
    }

    function remove() {
        $cids = JRequest::getVar('cid', array(0), 'post', 'array');
        $model = JModel::getInstance('location', 'googlemaplocatorModel');
        if ($model->deleteList($cids)) {
            $msg = JText::_('DELETE_SUCCESS_MSG');
            $this->setRedirect('index.php?option=com_googlemaplocator&controller=' . JRequest::getVar('controller'), $msg);
        } else {
            $msg = JText::_('DELETE_ERROR_MSG') . ": " . $model->getError();
            $this->setRedirect('index.php?option=com_googlemaplocator&controller=' . JRequest::getVar('controller'), $msg, 'error');
        }
    }

    function ajax_service() {
        $oModelService = JModel::getInstance('service', 'googlemaplocatorModel');
        $type_id = JRequest::getVar('filter_type_val');
        $sList = $oModelService->getfilterServiceByType($type_id);
        $list_filter_service = array();
        if ($sList) {
            foreach ($sList as $service) {
                $list_filter_service[$service->id] = $service->service;
            }
        }
        echo '<select name="filter_service" id="filter_service" class="inputbox">';
        echo '<option value="">' . JText::_('-- Select All --') . '</option>';
        echo JHtml::_('select.options', $list_filter_service);
        echo '</select>';
        exit;
    }

}