<?php

// no direct access

defined('_JEXEC') or die;



JHtml::_('behavior.mootools');

JHtml::_('behavior.keepalive');

JHtml::_('behavior.tooltip');

JHtml::_('behavior.formvalidation');
		$session =& JFactory::getSession();
		$ennewuser = $session->get( 'enmasse_new_user' );
		$form = $this->form;
		if (!empty($ennewuser['name']))
		{
				$form->setValue('name',null,$ennewuser['name']);
				
		}	
		if (!empty($ennewuser['email']))
		{
				$form->setValue('email1',null,$ennewuser['email']);
				$form->setValue('email2',null,$ennewuser['email']);
				
		}
		$session->clear( 'enmasse_new_user' );
		$this->form  =$form;
?>



<div id="system">

	

	<?php if ($this->params->get('show_page_heading')) : ?>

	<h1 class="title"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>

	<?php endif; ?>



	<form class="submission small style" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post">

		<?php foreach ($this->form->getFieldsets() as $fieldset): ?>

			<?php $fields = $this->form->getFieldset($fieldset->name); ?>

			<?php if (count($fields)): ?>

				<fieldset>

					<?php foreach ($fields as $field): ?>

						<?php
						if ($field->fieldname=='name')
						{
							
						}
						
						 if ($field->hidden): ?>

							<?php echo $field->input; ?>

						<?php else: ?>

							<div><?php echo $field->label; ?>

								<?php echo ($field->type!='Spacer') ? $field->input : "&#160;"; ?>

								<?php if (!$field->required && $field->type != 'Spacer'): ?>

									<span class="optional"><?php echo JText::_('COM_USERS_OPTIONAL'); ?></span>

								<?php endif; ?>

							</div>

					<?php endif; ?>

					<?php endforeach; ?>

				</fieldset>

			<?php endif; ?>

		<?php endforeach; ?>



		<div>

			<button class="validate" type="submit"><?php echo JText::_('JREGISTER'); ?></button>

		</div>

		

		<input type="hidden" name="option" value="com_users" />

		<input type="hidden" name="task" value="registration.register" />

		<?php echo JHtml::_('form.token');?>

		

	</form>



</div>