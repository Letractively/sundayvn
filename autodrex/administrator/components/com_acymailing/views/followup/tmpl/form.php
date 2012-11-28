<?php
/**
 * @copyright	Copyright (C) 2009-2012 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<div id="acy_content">
<div id="iframedoc"></div>
<form action="index.php?option=<?php echo ACYMAILING_COMPONENT ?>&amp;ctrl=followup" method="post" name="adminForm"  id="adminForm" autocomplete="off" enctype="multipart/form-data">
	<table width="100%">
		<tr>
			<td valign="top">
				<?php include(dirname(__FILE__).DS.'info.'.basename(__FILE__)); ?>
				<fieldset class="adminform" width="100%" id="htmlfieldset">
					<legend><?php echo JText::_( 'HTML_VERSION' ); ?></legend>
					<?php echo $this->editor->display(); ?>
				</fieldset>
				<fieldset class="adminform" >
					<legend><?php echo JText::_( 'TEXT_VERSION' ); ?></legend>
					<textarea style="width:100%" rows="20" name="data[mail][altbody]" id="altbody" ><?php echo @$this->mail->altbody; ?></textarea>
				</fieldset>
			</td>
			<td width="400" valign="top">
				<?php include(dirname(__FILE__).DS.'param.'.basename(__FILE__)); ?>
			</td>
		</tr>
  	</table>
	<div class="clr"></div>
	<input type="hidden" name="cid[]" value="<?php echo @$this->mail->mailid; ?>" />
	<input type="hidden" id="tempid" name="data[mail][tempid]" value="<?php echo @$this->mail->tempid; ?>" />
	<input type="hidden" name="data[mail][type]" value="followup" />
	<?php if(!empty($this->campaignid)) { ?><input type="hidden" name="data[listmail][<?php echo $this->campaignid ?>]" value="1" /> <?php } ?>
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="ctrl" value="followup" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
</div>