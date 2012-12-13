<?php

jimport('joomla.application.component.controller');

class GoogleMapLocationControllerLocation extends JController {

    function display() {
        $oSession = JFactory::getSession();
        $oSession->set('current_active_tab','googlemaplocation');
        JRequest::setVar('view', 'location');
        JRequest::setVar('layout', 'show');
        parent::display();
    }

    function googlemap() {
        $oSession = JFactory::getSession();
        $oSession->set('current_active_tab','googlemaplocation');
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
        //print_r($data);die;
        $model = JModel::getInstance('location', 'googlemaplocationModel');
        if ($model->store($data)) {
            $msg = JText::_('SAVE_SUCCESS_MSG');
            $this->setRedirect('index.php?option=com_googlemaplocation&controller=' . JRequest::getVar('controller'), $msg);
        } else {
            $msg = JText::_('SAVE_ERROR_MSG') . ": " . $model->getError();
            if ($data['id'] == null)
                $this->setRedirect('index.php?option=com_googlemaplocation&controller=' . JRequest::getVar('controller') . '&task=add', $msg, 'error');
            else
                $this->setRedirect('index.php?option=com_googlemaplocation&controller=' . JRequest::getVar('controller') . '&task=edit&cid[0]=' . $data['id'], $msg, 'error');
        }
    }

    function remove() {
        $cids = JRequest::getVar('cid', array(0), 'post', 'array');

        $model = JModel::getInstance('location', 'googlemaplocationModel');

        if ($model->deleteList($cids)) {
            $msg = JText::_('DELETE_SUCCESS_MSG');
            $this->setRedirect('index.php?option=com_googlemaplocation&controller=' . JRequest::getVar('controller'), $msg);
        } else {
            $msg = JText::_('DELETE_ERROR_MSG') . ": " . $model->getError();
            $this->setRedirect('index.php?option=com_googlemaplocation&controller=' . JRequest::getVar('controller'), $msg, 'error');
        }
    }
    
    function ajax_service(){
        
        $oModelService = JModel::getInstance('service', 'googlemaplocationModel');
                if ($oModelService instanceof GoogleMapLocationModelService)
                    true;
        $type_id = JRequest::getVar('filter_type_val');
        
        $sList = $oModelService->getfilterServiceByType($type_id);
        
        $list_filter_service = array();
        if ($sList) {
            foreach ($sList as $service) {
                $list_filter_service[$service->id] = $service->service;
            }
        }
        

                        
                echo '<select name="filter_service" id="filter_service" class="inputbox">';
                echo '<option value="">'.JText::_('-- Select All --').'</option>';
                echo JHtml::_('select.options', $list_filter_service);
                echo '</select>';
                
                exit;
    }

}