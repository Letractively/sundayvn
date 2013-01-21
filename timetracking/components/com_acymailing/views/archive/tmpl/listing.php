<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<div id="acyarchivelisting">
<?php if($this->values->show_page_title){ ?>
<h1 class="contentheading<?php echo $this->values->suffix; ?>"><?php echo $this->values->page_title; ?></h1>
<?php } ?>
<form action="<?php echo acymailing_completeLink('archive&listid='.$this->list->listid); ?>" method="post" name="adminForm" id="adminForm" >
	<table style="width:100%" cellpadding="0" cellspacing="0" border="0" align="center" class="contentpane<?php echo $this->values->suffix; ?>">
	<?php if($this->values->show_description){ ?>
		<tr>
			<td class="contentdescription<?php echo $this->values->suffix; ?>" >
				<?php echo $this->list->description; ?>
			</td>
		</tr>
	<?php } ?>
		<tr>
			<td>
				<?php echo $this->loadTemplate('newsletters'); ?>
				<?php if(!empty($this->values->itemid)){ ?>
					<input type="hidden" name="Itemid" value=<?php echo $this->values->itemid; ?> />
				<?php } ?>
				<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
				<input type="hidden" name="task" value="" />
				<input type="hidden" name="ctrl" value="archive" />
				<input type="hidden" name="filter_order" value="<?php echo $this->pageInfo->filter->order->value; ?>" />
				<input type="hidden" name="filter_order_Dir" value="<?php echo $this->pageInfo->filter->order->dir; ?>" />
				<input type="hidden" name="nbreceiveemail" value="0" />
			</td>
		</tr>
	</table>
	<?php if($this->values->show_receiveemail){ ?>
		<div id="receiveemailbox" class="receiveemailbox receiveemailbox_hidden">
			<fieldset class="acymailing_receiveemail">
			<legend><?php echo JText::_('SEND_SELECT_NEWS'); ?></legend>
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
					<tr>
						<td>
							<img title="<?php echo JText::_('ERROR_CAPTCHA'); ?>" width="<?php echo $this->config->get('captcha_width_component') ?>" height="<?php echo $this->config->get('captcha_height_component') ?>" class="captchaimagecomponent" src="<?php if(version_compare(JVERSION,'1.6.0','>=')){ echo JRoute::_('index.php?option=com_acymailing&ctrl=captcha&val='.rand(0,10000).'&no_html=1'); }else{ echo rtrim(JURI::root(),'/').'/index.php?option=com_acymailing&amp;ctrl=captcha&amp;val='.rand(0,10000).'&amp;no_html=1';} ?>" alt="captcha" />
						</td>
						<td>
							<input id="user_captcha" title="<?php echo JText::_('ERROR_CAPTCHA'); ?>" class="inputbox captchafield required" type="text" name="acycaptcha" size="10" />
						</td>
					</tr>
				</table>
				<button type="submit" value="sendarchive" name="task"/><?php echo JText::_('SEND'); ?></button>
				<?php echo JHTML::_( 'form.token' ); ?>
			</fieldset>
		</div>
	<?php } ?>
	<?php
		if($this->access->frontEndManament){
	?>
		<span class="acynewbutton"><a href="<?php echo acymailing_completeLink('newsletter&task=add&listid='.$this->list->listid); ?>" title="<?php echo JText::_('CREATE_NEWSLETTER',true); ?>" ><img class="icon16" src="<?php echo ACYMAILING_IMAGES; ?>icons/icon-16-add.png" alt="<?php echo JText::_('CREATE_NEWSLETTER',true); ?>"/></a></span>
	<?php } ?>
</form>
</div>