<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<fieldset>
	<legend><?php echo JText::_('EXTRA_INFORMATION'); ?></legend>
	<table class="admintable">
	<?php foreach($this->extraFields as $fieldName => $oneExtraField) {
		echo '<tr id="tr'.$fieldName.'"><td class="key">'.$this->fieldsClass->getFieldName($oneExtraField).'</td><td>'.$this->fieldsClass->display($oneExtraField,@$this->subscriber->$fieldName,'data[subscriber]['.$fieldName.']').'</td></tr>';
	}
	 ?>
	</table>
</fieldset>