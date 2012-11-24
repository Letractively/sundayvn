<?php
/**
 * @version		$Id: default.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

//load language pack
$language = JFactory::getLanguage();
$base_dir = JPATH_SITE.DS.'components'.DS.'com_enmasse';
$version = new JVersion;
$joomla = $version->getShortVersion();
if(substr($joomla,0,3) >= 1.6){
    $extension = 'com_enmasse16';
}else{
    $extension = 'com_enmasse';
}
if($language->load($extension, $base_dir, $language->getTag(), true) == false)
{
     $language->load($extension, $base_dir, 'en-GB', true);
}
?>

<div class="deal" id="signup-form">
	<div class="main_deal">
		<h2><?php echo JText::_("SIGN_UP")?><span id="normal">&nbsp;<?php echo JText::_("OR")?></span> <a href="#signup-form"><?php echo JText::_("SIGN_IN")?></a></h2>
		<div class="buy_signup">
			<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate">
			<?php foreach ($this->form->getFieldsets() as $fieldset): // Iterate through the form fieldsets and display each one.?>
				<?php $fields = $this->form->getFieldset($fieldset->name);?>
				
				<?php foreach($fields as $field):// Iterate through the fields in the set and display them.?>
					<?php if ($field->hidden):// If the field is hidden, just display the input.?>
						<?php echo $field->input;?>
					<?php elseif(!($field->type == "Spacer")):?>
						<div class="field">
							<?php echo $field->label; ?>
							<input name="<?php echo $field->name?>" type="<?php echo $field->type != 'Email' ? $field->type : 'text' ?>" class="text" />
						</div>
					<?php endif;?>
				<?php endforeach;?>
			<?php endforeach;?>
				<input type="submit" class="button validate" value="<?php echo JText::_("SIGN_UP")?>" />
				<input type="hidden" name="option" value="com_users" />
				<input type="hidden" name="task" value="registration.register" />
				<?php echo JHtml::_('form.token');?>
			
			</form>
		</div>
	</div>
	<div class="deal_bottom"></div>
</div>
<div class="deal" id="signin-form">
	<div class="main_deal">
		<h2><?php echo JText::_("SIGN_IN")?><span id="normal">&nbsp;<?php echo JText::_("OR")?></span> <a href="#signup-form"><?php echo JText::_("SIGN_UP")?></a></h2>
		<div class="buy_signup">
			<form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post" >
				<div class="field">
					<label><?php echo JText::_("USERNAME")?></label>
					<input name="username" type="text" class="text" />
				</div>
				
				<div class="field">
					<label><?php echo JText::_("PASSWORD")?></label>
					<input name="password" type="password" class="text" />
				</div>
				<input type="submit" class="button" value="<?php echo JText::_("SIGN_IN")?>" />
				<input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('login_redirect_url',$this->form->getValue('return'))); ?>" />
				<?php echo JHtml::_('form.token'); ?>
			</form>
		</div>
	<div style="">
			<jdoc:include type="modules" name="position-login-menu" />
		</div>
	</div>
	<div class="deal_bottom"></div>
</div>
