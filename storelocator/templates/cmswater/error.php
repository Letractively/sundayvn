<?php
/**
 * @version		$Id: error.php 21322 2011-05-11 01:10:29Z dextercowley $
 * @package		Joomla.Site
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
if (($this->error->getCode()) == '404') {
header('Location: /404-page-not-found');
exit;
}
?>

