<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

// get template data/path
$data   = JRequest::getVar('jform', array(), 'post', 'array');
$config = JPATH_ROOT."/templates/{$data['template']}/config.php";

if (file_exists($config)) {

	// load template config
	require_once($config);

	// trigger save config
	$warp = Warp::getInstance();
	$warp['system']->saveConfig();	

}