<div id="header">
    <div  class="btn_localtion">
	<a onclick="#">
		<?php 
			if(empty($_COOKIE['CS_SESSION_LOCATIONID'])){
				$localtion = JTEXT::_('ALL_CITY');	
			}else{
				$localtion = EnmasseHelper::getDealLocationNames((int)$_COOKIE['CS_SESSION_LOCATIONID']);
				$localtion	= $localtion[0];
			}
			if(empty($localtion)) $localtion = JTEXT::_('ALL_CITY');	
			echo $localtion;
		?>
	</a>
	</div>
	
	<?php include 'icons.php';?>
	<a class="btn_right" href="<?php echo JRoute::_('index.php?option=com_enmasse&view=deallisting'); ?>"><img src="components/com_enmasse/theme/<?php echo $theme?>/images/home_gfolder.png" /></a>
	<a class="btn_right" href="<?php echo JRoute::_('index.php?option=com_enmasse&view=dealupcoming'); ?>"><img src="components/com_enmasse/theme/<?php echo $theme?>/images/home_icon_g.png" /></a>
	<a class="btn_right" href="<?php echo JRoute::_('index.php?option=com_enmasse&view=dealupcoming'); ?>"><img src="components/com_enmasse/theme/<?php echo $theme?>/images/home_icon_new.png" /></a>
	<span class="arrow_corner" href="#"></span>
	
	<div class="clear"></div>
</div>