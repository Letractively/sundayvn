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
<div class="deal" id="signin-form">
	<div class="main_deal">
		<h2><?php echo JText::_("SIGN_IN")?></h2>
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
		<h2 style="margin:170px 0 0 0; border-bottom:none; font-size:17px"><?php echo JText::_("SOCIAL_LOGIN")?></h2>
		<div style="margin:0 0 0 200px; ">
			<div style="display: inline-block; vertical-align: middle;">
				<a href="javascript:void(0)" onclick='fb_login();'>
					<img width="85" height="24" src="<?php echo JURI::base() ?>components/com_enmasse/helpers/sociallogin/images/facebook_login_full.png" />
				</a>
			</div>
			<div style="display: inline-block; vertical-align: middle; margin:0 10px 0 10px;">
				<a href="javascript:void(0)" onclick='document.forms["socialLogin"].elements["isLoginWithGoogle"].value = 1; document.forms["socialLogin"].submit()'>
					<img width="85" height="24" src="<?php echo JURI::base() ?>components/com_enmasse/helpers/sociallogin/images/google_login_full.png" />
				</a>
			</div>
			<div style="display: inline-block; vertical-align: middle;">
				<a href="javascript:void(0)" onclick='document.forms["socialLogin"].elements["isLoginWithTwitter"].value = 1; document.forms["socialLogin"].submit()'>
					<img width="85" height="24" src="<?php echo JURI::base() ?>components/com_enmasse/helpers/sociallogin/images/tw_login_full.png" />
				</a>
			</div>
		</div>
	</div>
	<div class="deal_bottom"></div>
</div>
