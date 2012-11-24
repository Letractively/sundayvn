<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<fieldset id="acy_preview_menu">
	<div class="toolbar" id="acytoolbar" style="float: right;">
		<table><tr>
		<?php if(acymailing_isAllowed($this->config->get('acl_newsletters_schedule','all'))){
			if($this->mail->published == 2){ ?>
		<td id="acybuttonunschedule"><a onclick="javascript:submitbutton('unschedule'); return false;" href="#" class="toolbar" ><span class="icon-32-unschedule" title="<?php echo JText::_('UNSCHEDULE',true); ?>"></span><?php echo JText::_('UNSCHEDULE'); ?></a></td>
		<?php }else{ ?>
		<td id="acybuttonschedule"><a class="modal" rel="{handler: 'iframe', size: {x: 500, y: 400}}" href="<?php echo acymailing_completeLink("newsletter&task=scheduleconfirm&listid=".JRequest::getInt('listid')."&mailid=".$this->mail->mailid,true ); ?>"><span class="icon-32-schedule" title="<?php echo JText::_('SCHEDULE',true); ?>"></span><?php echo JText::_('SCHEDULE'); ?></a></td>
		<?php }
		} if(acymailing_isAllowed($this->config->get('acl_newsletters_send','all'))){ ?>
		<td id="acybuttonsend"><a class="modal" rel="{handler: 'iframe', size: {x: 500, y: 400}}" href="<?php echo acymailing_completeLink("newsletter&task=sendconfirm&listid=".JRequest::getInt('listid')."&mailid=".$this->mail->mailid,true ); ?>"><span class="icon-32-acysend" title="<?php echo JText::_('SEND',true); ?>"></span><?php echo JText::_('SEND'); ?></a></td>
		<td id="acybuttondivider"><span class="divider"></span></td>
		<?php } ?>
		<td id="acybuttonedit"><a onclick="javascript:submitbutton('edit'); return false;" href="#" class="toolbar" ><span class="icon-32-edit" title="<?php echo JText::_('ACY_EDIT'); ?>"></span><?php echo JText::_('ACY_EDIT'); ?></a></td>
		<td id="acybuttoncancel"><a onclick="javascript:submitbutton('cancel'); return false;" href="#" class="toolbar" ><span class="icon-32-cancel" title="<?php echo JText::_('ACY_CLOSE'); ?>"></span><?php echo JText::_('ACY_CLOSE'); ?></a></td>
		</tr></table>
	</div>
	<div class="header" style="float: left;"><h1><?php echo JText::_('ACY_PREVIEW').' : '.@$this->mail->subject; ?></h1></div>
</fieldset>