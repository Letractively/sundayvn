
<?php
/**
 * @version		$Id: default.php 21397 2011-05-26 23:58:47Z dextercowley $
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.5
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JFactory::getDocument()->addScript("components/com_enmasse/theme/js/jquery/jquery-1.6.2.min.js");
JFactory::getDocument()->addScriptDeclaration('jQuery.noConflict()');
?>
<div class="reset<?php echo $this->pageclass_sfx?>">
	<?php if (!$this->params->get('show_page_heading')) { ?>
	<h1><?php echo JText::_('RESET_YOUR_PASSWORD');?></h1>
	<?php }else{?>
	<?php echo $this->escape($this->params->get('page_heading')); ?>
<?php } ?>
<?php echo JText::_('RESET_YOUR_PASSWORD_MSG');?>
<div class="cover_left_div_40">
	<form id="user-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=reset.request'); ?>" method="post" class="form-validate">

		<fieldset>
			
				<div class="cover_input">
					<label title="" class="hasTip required" for="jform_email" id="jform_email-lbl">Email Address:<span class="star">&nbsp;*</span></label>
					<input  type="text" size="30" class="text validate-username required" value="" id="jform_email" name="jform[email]" aria-required="true" required="required">
					<button type="submit" class="validate viewDeal"><?php echo JText::_('JSUBMIT'); ?></button>
					<?php echo JHtml::_('form.token'); ?>
				</div>
					
		</fieldset>
		
			
	</form>
	</div>
</div>
