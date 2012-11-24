<?php if(!JFactory::getUser()->get('guest')){
//if(0){
?>
<form style="display:none" id="form_logout" name="form_logout" action="<?php echo JRoute::_('index.php?option=com_users&task=user.logout'); ?>" method="post">
			
			<?php echo JHtml::_('form.token'); ?>
</form>
<?php } ?>