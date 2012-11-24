<?php
/**
 * @version		$Id: default_login.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.5
 */

defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
require_once(JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."EnmasseHelper.class.php");
$app = JFactory::getApplication();
$app->setUserState('staticTitle', JText::_('SIGN_IN'));
$theme =  EnmasseHelper::getThemeFromSetting();

//$qMsg = '';
//foreach ($app->getMessageQueue() as $key=>$msg){
//	if(!empty($msg)) $qMsg .= '<div class="error">'.$msg["message"].'</div>';
//}
 //if(!empty($qMsg)) echo $qMsg;
?>
<div class="row row_list">
		<form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post" >		
				<table class="margin_auto">
				<tr>
					<td><label><?php echo JText::_("USERNAME")?>*</label></td><td><input name="username" type="text" class="text" /></td>
				</tr>
				<tr>
					<td><label><?php echo JText::_("PASSWORD")?>*</label></td><td><input name="password" type="password" class="text" /></td>
				</tr>
				<tr>
					<td colspan="2"  align="right">
					<?php echo JTEXT::_('NOT_A_MEMBER');?> ? <a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>"><?php echo JTEXT::_('SIGN_UP');?><a>
					<input type="submit" class="button" value="<?php echo JText::_("SIGN_IN")?>" /></div>
					<input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('login_redirect_url',$this->form->getValue('return'))); ?>" />
					<?php echo JHtml::_('form.token'); ?></td>
				</tr>
				</table>
		</form>
</div>