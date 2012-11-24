<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class JButtonPopsched extends JButton
{
	var $_name = 'Popsched';
	function fetchButton( $type='Popsched', $url = '', $width=640, $height=480 )
	{
		$text = JText::_('SCHEDULE',true);
		$html	= "<a id=\"a_schedule\" class=\"modal\" href=\"$url\" rel=\"{handler: 'iframe', size: {x: $width, y: $height}}\">\n";
		$html .= "<span class=\"icon-32-schedule\" title=\"$text\">\n";
		$html .= "</span>\n";
		$html	.= "$text\n";
		$html	.= "</a>\n";
		return $html;
	}
	function fetchId( $type='Popsched', $html = '', $id = 'popshed' )
	{
		return 'toolbar-'.$id;
	}
}