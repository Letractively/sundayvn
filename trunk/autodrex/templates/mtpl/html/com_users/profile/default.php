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
JHtml::_('behavior.tooltip');
require_once(JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."EnmasseHelper.class.php");
JFactory::getDocument()->addScript("components/com_enmasse/theme/js/jquery/jquery-1.6.2.min.js");
JFactory::getDocument()->addScriptDeclaration('jQuery.noConflict()');
//$app = JFactory::getApplication();
//$app->setUserState('staticTitle', JText::_('USER_PROFILE'));
?>

<div class="row row_list">
	<div class="haft_left">
	<?php echo $this->loadTemplate('core'); ?>
	</div>
	
	<div class="haft_right">
	<?php echo $this->loadTemplate('params'); ?>
	</div>
	<div class="clear"></div>
</div>

<?php echo $this->loadTemplate('custom'); ?>

<div class="row">
	<?php if (JFactory::getUser()->id == $this->data->id) : ?>
	<a href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id='.(int) $this->data->id);?>">
		<?php echo JText::_('COM_USERS_Edit_Profile'); ?></a>
	<?php endif; ?>
</div>