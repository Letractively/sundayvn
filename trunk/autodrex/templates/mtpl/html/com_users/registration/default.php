<?php
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
require_once(JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."EnmasseHelper.class.php");
JFactory::getDocument()->addScript("components/com_enmasse/theme/js/jquery/jquery-1.6.2.min.js");
JFactory::getDocument()->addScriptDeclaration('jQuery.noConflict()');
$app = JFactory::getApplication();
$app->setUserState('staticTitle', JText::_('SIGN_UP'));
$theme =  EnmasseHelper::getThemeFromSetting();
?>
<div class="row row_list">
			<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate">
				<table class="margin_auto">
				<tr>
					<td><label title="" class="hasTip required" for="jform_name" id="jform_name-lbl"><?php echo JText::_("NAME")?>:<span class="star">&nbsp;*</span></label>	</td><td><input type="Text" class="text" name="jform[name]"></td>
				</tr>
				<tr>
					<td><label title="" class="hasTip required" for="jform_username" id="jform_username-lbl"><?php echo JText::_("USERNAME")?>:<span class="star">&nbsp;*</span></label>		</td><td><input type="Text" class="text" name="jform[username]"></td>
				</tr>
				<tr>
					<td><label title="" class="hasTip required" for="jform_username" id="jform_username-lbl"><?php echo JText::_("PASSWORD")?>:<span class="star">&nbsp;*</span></label>		</td><td><input type="Password" class="text" name="jform[password1]"></td>
				</tr>
				<tr>
					<td><label title="" class="hasTip required" for="jform_password2" id="jform_password2-lbl"><?php echo JText::_("CONFIRM_PASSWORD")?>:<span class="star">&nbsp;*</span></label>	</td><td><input type="Password" class="text" name="jform[password2]"></td>
				</tr>
				<tr>
					<td><label title="" class="hasTip required" for="jform_email1" id="jform_email1-lbl"><?php echo JText::_("EMAIL_ADDRESS")?>:<span class="star">&nbsp;*</span></label>	</td><td><input type="Email" class="text" name="jform[email1]"></td>
				</tr>
				<tr>
					<td><label title="" class="hasTip required" for="jform_email2" id="jform_email2-lbl"><?php echo JText::_("CONFIRM_EMAIL_ADDRESS")?>:<span class="star">&nbsp;*</span></label>	</td><td><input type="Email" class="text" name="jform[email2]"></td>
				</tr>
				<tr>
					<td  colspan="2" align="right">
						<a href="<?php echo JRoute::_('index.php?option=com_users&view=login'); ?>"><?php echo JTEXT::_('SIGN_IN');?><a>
						<input type="submit" class="button viewDeal validate" value="<?php echo JText::_("SIGN_UP")?>" />
						<input type="hidden" name="option" value="com_users" />
						<input type="hidden" name="task" value="registration.register" />
						<?php echo JHtml::_('form.token');?>	
					</td>
				</tr>
				</table>
			</form>
</div>