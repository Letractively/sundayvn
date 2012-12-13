<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * Script file of Google Map Locator.
 */
class com_googlemaplocationInstallerScript {

    /**
     * method to install the component
     *
     * @return void
     */
    function install($parent) {
        $manifest = $parent->get("manifest");
        $parent = $parent->getParent();
        $source = $parent->getPath("source");

        $installer = new JInstaller();
    }

    /**
     * method to uninstall the component
     *
     * @return void
     */
    function uninstall($parent) {
        // $parent is the class calling this method
        echo '<p>' . JText::_('COM_GOOGLEMAPLOCATION_UNINSTALL_TEXT') . '</p>';
    }

    /**
     * method to update the component
     *
     * @return void
     */
    function update($parent) {
        // $parent is the class calling this method
        echo '<p>' . JText::_('COM_GOOGLEMAPLOCATION_UPDATE_TEXT') . '</p>';
    }

    /**
     * method to run before an install/update/uninstall method
     *
     * @return void
     */
    function preflight($type, $parent) {
        // $parent is the class calling this method
        // $type is the type of change (install, update or discover_install)
        echo '<p>' . JText::_('COM_GOOGLEMAPLOCATION_PREFLIGHT_' . $type . '_TEXT') . '</p>';
        $database = JFactory::getDBO();
        $database->setQuery("DELETE FROM #__assets WHERE name='com_googlemaplocation' AND title='com_googlemaplocation' LIMIT 1");
        $database->query();
    }

    /**
     * method to run after an install/update/uninstall method
     *
     * @return void
     */
    function postflight($type, $parent) {
        // $parent is the class calling this method
        // $type is the type of change (install, update or discover_install)
        echo '<p>' . JText::_('COM_GOOGLEMAPLOCATION_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
    }

}
