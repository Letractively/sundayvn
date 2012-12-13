<?php

jimport('joomla.application.component.controller');

class GoogleMapLocatorControllerService extends JController {

    function display() {
        JRequest::setVar('view', 'service');
        JRequest::setVar('layout', 'show');
        parent::display();
    }

    function add() {
        JRequest::setVar('view', 'service');
        JRequest::setVar('layout', 'edit');
        parent::display();
    }

    function edit() {
        JRequest::setVar('view', 'service');
        JRequest::setVar('layout', 'edit');
        parent::display();
    }

    function save() {
        $data = JRequest::get('post');
        //print_r($data);die;
        $model = JModel::getInstance('service', 'googlemaplocatorModel');
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

        $model = JModel::getInstance('service', 'googlemaplocatorModel');

        if ($model->deleteList($cids)) {
            $msg = JText::_('DELETE_SUCCESS_MSG');
            $this->setRedirect('index.php?option=com_googlemaplocator&controller=' . JRequest::getVar('controller'), $msg);
        } else {
            $msg = JText::_('DELETE_ERROR_MSG') . ": " . $model->getError();
            $this->setRedirect('index.php?option=com_googlemaplocator&controller=' . JRequest::getVar('controller'), $msg, 'error');
        }
    }

}