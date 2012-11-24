<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<h1 class="componentheading"><?php echo JText::_('FORWARD_FRIEND'); ?></h1>
<form action="<?php echo JRoute::_( 'index.php' );?>" method="post" name="adminForm" id="adminForm" >
	<div class="acymailing_forward">
		<table>
			<tr>
				<td>
					<label for="forwardname"><?php echo JText::_('JOOMEXT_NAME'); ?></label>
				</td>
				<td>
					<input id="forwardname" type="text" class="inputbox required" name="name" value="" size="20"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="forwardemail"><?php echo JText::_('JOOMEXT_EMAIL'); ?></label>
				</td>
				<td>
					<input id="forwardemail" type="text" class="inputbox required" name="email" value="" size="20"/>
				</td>
			</tr>
		</table>
		<input type="submit" value="<?php echo JText::_('SEND'); ?>"/>
	</div>
	<input type="hidden" name="key" value="<?php echo $this->mail->key;?>" />
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="doforward" />
	<input type="hidden" name="ctrl" value="archive" />
	<input type="hidden" name="mailid" value="<?php echo $this->mail->mailid; ?>" />
	<?php if(!empty($this->receiver->subid)){ ?>
		<input type="hidden" name="subid" value="<?php echo $this->receiver->subid.'-'.$this->receiver->key ?>" />
	<?php }
	echo JHTML::_( 'form.token' );
	if(JRequest::getCmd('tmpl') == 'component'){ ?><input type="hidden" name="tmpl" value="component" /><?php } ?>
</form>
<?php include(dirname(__FILE__).DS.'view.php'); ?>