<a href="javascript:;" id="icon_more" class="btn_right">
		<img src="components/com_enmasse/theme/<?php echo $theme?>/images/icon_more.png" />
	<div id="cover_icon">
		   <a class="blockbtn" href="<?php echo JRoute::_('index.php?option=com_enmasse&view=deallisting'); ?>"><img src="components/com_enmasse/theme/<?php echo $theme?>/images/home_gfolder.png" />All Deal</a>
   <a class='blockbtn' href="<?php echo JRoute::_('index.php?option=com_enmasse&view=dealupcoming'); ?>"><img class="" src="components/com_enmasse/theme/<?php echo $theme?>/images/home_icon_g.png" />Upcoming Deal</a>
		<a class="blockbtn" href="<?php echo JRoute::_('index.php?option=com_enmasse&view=expireddeallisting'); ?>"><img src="components/com_enmasse/theme/<?php echo $theme?>/images/icon_expired.png" height="27" />Expired Deal</a>
		<a class="blockbtn" href="<?php echo JRoute::_('index.php?option=com_enmasse&view=orderlist'); ?>"><img src="components/com_enmasse/theme/<?php echo $theme?>/images/icon_ordered.png" height="27" />My Orders</a>
	
	</div>
</a>
		
<?php if(JFactory::getUser()->get('guest')){?>
	<a class="btn_right pr_info" href="<?php echo JRoute::_('index.php?option=com_users&view=login'); ?>"><img src="components/com_enmasse/theme/<?php echo $theme?>/images/icon_person.png" /></a>
<?php }else{//logout?>
	<a class="btn_right pr_info" href="javascript:document.form_logout.submit()"><img src="components/com_enmasse/theme/<?php echo $theme?>/images/icon_logout.png" /></a> 		
<?php }?>
<?php  if ($view == 'deallisting' ) { 
$db = JFactory::getDBO();
$catid = JRequest::getVar('categoryId',0);
if (!empty($catid))
{
$db->setQuery('select * from #__enmasse_category where `id`="'.$catid.'" ');
$category = $db->loadAssoc();
$categoryname = $category['name'];
}
else
{

	$categoryname = "Choose category";
}

?>
<span class="selectcate" style="float:right;"><?=$categoryname?></span>
<?php 
} 

?>
<script type="text/javascript">
	jQuery('#icon_more').click(function(){jQuery('#cover_icon').show();});
	jQuery('#cover_icon').mouseleave(function(){jQuery('#cover_icon').hide();});
	jQuery('.pr_info').mouseenter(function(){jQuery('#cover_icon').hide();});
</script>

