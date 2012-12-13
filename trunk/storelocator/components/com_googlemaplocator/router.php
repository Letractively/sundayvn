<?php

/**
 * @package		Joomla.Site
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

jimport('joomla.application.categories');

/**
 * Build the route for the com_content component
 *
 * @param	array	An array of URL arguments
 * @return	array	The URL arguments to use to assemble the subsequent URL.
 * @since	1.5
 */
function GoogleMapLocatorBuildRoute(&$query) {
    $segments = array();

    // get a menu item based on Itemid or currently active
    $app = JFactory::getApplication();
    $menu = $app->getMenu();

    if (empty($query['Itemid'])) {
        $menuItem = $menu->getActive();
        $menuItemGiven = false;
    } else {
        $menuItem = $menu->getItem($query['Itemid']);
        $menuItemGiven = true;
    }

    // Duc J: Search Engine Friendly.
    if (isset($query['view']) && @$menuItem->query['view'] == $query['view'])
        unset($query['view']);
    
    if (isset($query['layout']) && @$menuItem->query['layout'] == $query['layout'])
        unset($query['layout']);
    
    if (isset($query['view'])) {
        $segments[] = $query['view'];
        unset($query['view']);
    }
    if (isset($query['layout'])) {
        $segments[] = $query['layout'];
        unset($query['layout']);
    }
    
    
    return $segments;
}

/**
 * Parse the segments of a URL.
 *
 * @param	array	The segments of the URL to parse.
 *
 * @return	array	The URL attributes to be used by the application.
 * @since	1.5
 */
function GoogleMapLocatorParseRoute($segments) {
    $vars = array();
    
    // get a menu item based on Itemid or currently active
    $app = JFactory::getApplication();
    $menu = $app->getMenu();

    if (empty($query['Itemid'])) {
        $menuItem = $menu->getActive();
        $menuItemGiven = false;
    } else {
        $menuItem = $menu->getItem($query['Itemid']);
        $menuItemGiven = true;
    }
    
    if (count($segments) == 1)
        $vars['view'] = $segments[0];
    
    if (count($segments) == 2) {
        $vars['view'] = $segments[0];
        
        $vars['layout'] = $segments[1];
    }
    
    return $vars;
}
