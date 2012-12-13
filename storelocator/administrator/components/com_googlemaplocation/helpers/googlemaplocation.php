<?php

class GoogleMapLocationHelper {

    public static function getActions() {
        $user = JFactory::getUser();
        
        $result = new JObject;

        if (empty($categoryId)) {
            $assetName = 'com_googlemaplocation';
        }

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }

}

?>