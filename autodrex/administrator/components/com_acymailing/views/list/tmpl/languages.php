<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<fieldset class="adminform">
	<legend><?php echo JText::_( 'LANGUAGES' ); ?></legend>
	<?php echo $this->languages->display('languages',$this->list->languages); ?>
</fieldset>