<?php
/**
 * Joom!Fish - Multi Lingual extention and translation manager for Joomla!
 * Copyright (C) 2003 - 2011, Think Network GmbH, Munich
 *
 * All rights reserved.  The Joom!Fish project is a set of extentions for
 * the content management system Joomla!. It enables Joomla!
 * to manage multi lingual sites especially in all dynamic information
 * which are stored in the database.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU General Public License" (GPL) is available at
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * -----------------------------------------------------------------------------
 * $Id: cpanel.php 1551 2011-03-24 13:03:07Z akede $
 * @package joomfish
 * @subpackage cpanel
 *
*/


defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

class CpanelController extends JController  {
	/**
	 * Joom!Fish Controler for the Control Panel
	 * @param array		configuration
	 * @return joomfishTasker
	 */
	function __construct($config = array())
	{
		parent::__construct($config);
		$this->registerTask( 'show',  'display' );

		// ensure DB cache table is created and up to date
		JLoader::import( 'helpers.controllerHelper',FALANG_ADMINPATH);
		JLoader::import( 'classes.JCacheStorageJFDB',FALANG_ADMINPATH);
		FalangControllerHelper::_checkDBCacheStructure();
		FalangControllerHelper::_checkDBStructure();

        if( !FalangControllerHelper::_testSystemBotState() ) {;
            echo "<div style='font-size:16px;font-weight:bold;color:red'>".JText::_('COM_FALANG_TEST_SYSTEM_ERROR')."</div>";
        }

	}

	/**
	 * Standard display control structure
	 * 
	 */
	function display()
	{
		$this->view =  $this->getView('cpanel');
		parent::display();
	}
	
	function cancel()
	{
		$this->setRedirect( 'index.php?option=com_falang' );
	}

    function checkUpdates() {

        //get cache timeout from com_installer params
        jimport('joomla.application.component.helper');
        $component = JComponentHelper::getComponent('com_installer');
        $params = $component->params;
        $cache_timeout = $params->get('cachetimeout', 6, 'int');
        $cache_timeout = 3600 * $cache_timeout;


        //find $eid Extension identifier to look for
        $dbo = JFactory::getDBO();
        $query = $dbo->getQuery(true);
        $query->select('extension_id')->from('#__extensions')->where('element = '.$dbo->Quote('pkg_falang'));
        $dbo->setQuery($query);
        $dbo->query();
        $result = $dbo->loadObject();

        $eid =  $result->extension_id;

        //find update for pkg_falang

        $updater = JUpdater::getInstance();
        $update = $updater->findUpdates(array($eid), $cache_timeout);

        //seem $update has problem with cache
        //check manually
        $query = $dbo->getQuery(true);
        $query->select('version')->from('#__updates')->where('element = '.$dbo->Quote('pkg_falang'));
        $dbo->setQuery($query);
        $dbo->query();
        $result = $dbo->loadObject();

        $document =& JFactory::getDocument();
        $document->setMimeEncoding('application/json');

        $version = new FalangVersion();

        if (!$result) {
            echo json_encode(array('update' => "false",'version' => $version->getVersionShort()));
            return true;
        }

        $last_version = $result->version;

        if (version_compare($last_version, $version->getVersionShort(),'>')) {
            echo json_encode(array('update' => "true",'version' =>  $last_version));
        }   else {
            echo json_encode(array('update' => "false",'version' =>$version->getVersionShort() ));
        }

        return true;
    }
}

?>
