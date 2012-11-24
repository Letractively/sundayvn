<a href="javascript:;" id="icon_more" class="btn_right">
		<img src="components/com_enmasse/theme/<?php echo $theme?>/images/icon_more.png" />
	<div id="cover_icon">
		<a class="btn_right" href="<?php echo JRoute::_('index.php?option=com_enmasse&view=expireddeallisting'); ?>"><img src="components/com_enmasse/theme/<?php echo $theme?>/images/icon_expired.png" height="27" /></a>
		<a class="btn_right" href="<?php echo JRoute::_('index.php?option=com_enmasse&view=orderlist'); ?>"><img src="components/com_enmasse/theme/<?php echo $theme?>/images/icon_ordered.png" height="27" /></a>
		<a class="btn_right" href="<?php echo JRoute::_('index.php?option=com_enmasse&controller=deliverer&task=show'); ?>"><img src="components/com_enmasse/theme/<?php echo $theme?>/images/icon_delivery.png" height="27" /></a>
	</div>
</a>
		
<?php if(JFactory::getUser()->get('guest')){?>
	<a class="btn_right pr_info" href="<?php echo JRoute::_('index.php?option=com_users&view=login'); ?>"><img src="components/com_enmasse/theme/<?php echo $theme?>/images/icon_person.png" /></a>
<?php }else{//logout?>
	<a class="btn_right pr_info" href="javascript:document.form_logout.submit()"><img src="components/com_enmasse/theme/<?php echo $theme?>/images/icon_logout.png" /></a> 		
<?php }?>

<script type="text/javascript">
	jQuery('#icon_more').click(function(){jQuery('#cover_icon').show();});
	jQuery('#cover_icon').mouseleave(function(){jQuery('#cover_icon').hide();});
	jQuery('.pr_info').mouseenter(function(){jQuery('#cover_icon').hide();});
</script>