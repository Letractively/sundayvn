<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
$my = JFactory::getUser();
if(empty($my->id)) die('You can not have access to this page');
include(ACYMAILING_BACK.'controllers'.DS.'template.php');
class FronttemplateController extends TemplateController{
}