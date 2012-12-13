<?php

jimport('joomla.application.component.controller');

class GoogleMapLocatorControllerType extends JController {

    function display() {
        JRequest::setVar('view', 'type');
        JRequest::setVar('layout', 'show');
        parent::display();
    }

    function add() {
        JRequest::setVar('view', 'type');
        JRequest::setVar('layout', 'edit');
        parent::display();
    }

    function edit() {
        JRequest::setVar('view', 'type');
        JRequest::setVar('layout', 'edit');
        parent::display();
    }

    function save() {
        $data = JRequest::get('post');
        
        $model = JModel::getInstance('type', 'googlemaplocatorModel');
        
        if ($model instanceof GoogleMapLocatorModelType)
            true;
        
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

        $model = JModel::getInstance('type', 'googlemaplocatorModel');

        if ($model->deleteList($cids)) {
            $msg = JText::_('DELETE_SUCCESS_MSG');
            $this->setRedirect('index.php?option=com_googlemaplocator&controller=' . JRequest::getVar('controller'), $msg);
        } else {
            $msg = JText::_('DELETE_ERROR_MSG') . ": " . $model->getError();
            $this->setRedirect('index.php?option=com_googlemaplocator&controller=' . JRequest::getVar('controller'), $msg, 'error');
        }
    }

}