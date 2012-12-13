<?php

// no direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

$locationType = modMapLegendHelper::getLegendService();

require JModuleHelper::getLayoutPath('mod_map_legend', $params->get('layout', 'default'));
