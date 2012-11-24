<?php

// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>

<div id="system">
	
	<?php if ($this->params->get('show_page_heading')) : ?>
	<h1 class="title"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
	<?php endif; ?>

	<form class="submission small style" id="user-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=remind.remind'); ?>" method="post">
	
		<?php foreach ($this->form->getFieldsets() as $fieldset): ?>
			<p><?php echo JText::_($fieldset->label); ?></p>
			<fieldset>
				<?php foreach ($this->form->getFieldset($fieldset->name) as $name => $field): ?>
					<div><?php echo $field->label.$field->input; ?></div>
				<?php endforeach; ?>
			</fieldset>
		<?php endforeach; ?>

		<div>
			<button type="submit"><?php echo JText::_('JSUBMIT'); ?></button>
		</div>

		<?php echo JHtml::_('form.token'); ?>
	</form>

</div>