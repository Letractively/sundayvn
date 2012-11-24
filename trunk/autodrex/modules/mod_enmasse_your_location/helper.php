<?php
/*------------------------------------------------------------------------
# En Masse - Social Buying Extension 2010
# ------------------------------------------------------------------------
# By Matamko.com
# Copyright (C) 2010 Matamko.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.matamko.com
# Technical Support:  Visit our forum at www.matamko.com
-------------------------------------------------------------------------*/

defined('_JEXEC') or die('Direct Access to this location is not allowed.');
 
class ModEnmasseYourLocationHelper
{
   
    
    //======================
    // to check if the dealId is available
    // return true if available
    public static function getLocationName($id)
    {
    	$db = JFactory::getDBO();
    	$query = 'SELECT
    	                name
    	          FROM 
    	               `#__enmasse_location`
    	          WHERE 
    	               id = '.$id;
    	$db->setQuery($query);
    	
    	return $db->loadResult();
    	    	
    }
    
    public static function getPublishedLocation()
    {
    	
    	$db = JFactory::getDBO();
    	$query = 'SELECT
    	                *
    	          FROM 
    	               `#__enmasse_location`
    	          WHERE 
    	               published = 1 ORDER BY name';
    	$db->setQuery($query);
    	return $db->loadObjectList();
    	
    }
 
} //end ModHelloWorld2Helper

?>