<?php
/**
 * @package     Falang Driver
 * @subpackage  Add Falang Driver
 * @license     GNU General Public License Version 2, or later http://www.gnu.org/licenses/gpl.html
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.plugin.plugin');

/**
 * Falang Driver Plugin
 */
class plgSystemFalangdriver extends JPlugin
{

    public function __construct(& $subject, $config = array())
    {
        parent::__construct($subject, $config);
	    $this->loadLanguage();

        // This plugin is only relevant for use within the frontend!
        if (JFactory::getApplication()->isAdmin())
        {
            return;
        }
    }

    /**
     * System Event: onAfterInitialise
     *
     * @return	string
     */
    function onAfterInitialise()
    {
        // This plugin is only relevant for use within the frontend!
        if (JFactory::getApplication()->isAdmin())
        {
            return;
        }
        $this->setupDatabaseDriverOverride();
    }

    public function isFalangDriverActive() {
        $db = JFactory::getDBO();
        if (!is_a($db,"JFalangDatabase")){
           return false;
        }
           return true;
    }

    function onAfterDispatch()
    {
        if (JFactory::getApplication()->isSite() && $this->isFalangDriverActive()) {
            include_once( JPATH_ADMINISTRATOR . '/components/com_falang/version.php');
            $version = new FalangVersion();
            if ($version->_versiontype != 'basic' && $version->_versiontype !='standard' ) {
                $doc =& JFactory::getDocument();
                $cacheBuf =& $doc->getBuffer('component');

                $cacheBuf2 =
                    '';

                if ($doc->_type == 'html')
                    $doc->setBuffer($cacheBuf . $cacheBuf2,'component');
            }
            return true;
        }
    }

    function setupDatabaseDriverOverride()
    {
        //override only the override file exist
        if (file_exists(dirname(__FILE__) . '/falang_database.php'))
        {

            require_once( dirname(__FILE__) . '/falang_database.php');

            $conf = JFactory::getConfig();

            $host = $conf->getValue('config.host');
            $user = $conf->getValue('config.user');
            $password = $conf->getValue('config.password');
            $db = $conf->getValue('config.db');
            $dbprefix = $conf->getValue('config.dbprefix');
            $debug = $conf->getValue('config.debug');


            $options = array("host" => $host, "user" => $user, "password" => $password, "database" => $db, "prefix" => $dbprefix, "select" => true);
            $db = new JFalangDatabase($options);
            $db->debug($debug);

            if ($db->getErrorNum() > 2)
            {
                JError::raiseError('joomla.library:' . $db->getErrorNum(), 'JDatabase::getInstance: Could not connect to database <br/>' . $db->getErrorMsg());
            }

            // replace the database handle in the factory
            JFactory::$database = null;
            JFactory::$database = $db;

            $test = JFactory::getDBO();

        }

    
    }


}