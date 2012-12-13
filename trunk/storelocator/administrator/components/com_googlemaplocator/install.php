<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * Script file of Google Map Locator.
 */
class com_googlemaplocatorInstallerScript {

    function install($parent) {
        $manifest = $parent->get("manifest");
        $parent = $parent->getParent();
        $source = $parent->getPath("source");
        $installer = new JInstaller();
    }

    function uninstall($parent) {
        echo '<p>' . JText::_('COM_GOOGLEMAPLOCATOR_UNINSTALL_TEXT') . '</p>';
    }
    
    function update($parent) {
        echo '<p>' . JText::_('COM_GOOGLEMAPLOCATOR_UPDATE_TEXT') . '</p>';
    }

    function preflight($type, $parent) {
        echo '<p>' . JText::_('COM_GOOGLEMAPLOCATOR_PREFLIGHT_' . $type . '_TEXT') . '</p>';
        $database = JFactory::getDBO();
        $database->setQuery("DELETE FROM #__assets WHERE name='com_googlemaplocator' AND title='com_googlemaplocator' LIMIT 1");
        $database->query();
    }

    function postflight($type, $parent) {
        echo '<p>' . JText::_('COM_GOOGLEMAPLOCATOR_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
    }

}
