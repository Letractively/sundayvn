<div id="header">
   <a class="btn_left" href="javascript:history.back(1)"><img alt="EnMasse" src="components/com_enmasse/theme/<?php echo $theme;?>/images/icon_back.png" /></a>
   <a class="btn_left" href="<?php echo $this->baseurl ?>"><img alt="EnMasse" src="components/com_enmasse/theme/<?php echo $theme;?>/images/icon_home.png" /></a>
   <div id="logo">
		<a class="btn_left" href="<?php echo $this->baseurl ?>"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo.png" /></a>
	</div>
   <?php include 'icons.php';?>
   <a class="btn_right" href="<?php echo JRoute::_('index.php?option=com_enmasse&view=deallisting'); ?>"><img src="components/com_enmasse/theme/<?php echo $theme?>/images/home_gfolder.png" /></a>
   <a href="<?php echo JRoute::_('index.php?option=com_enmasse&view=dealupcoming'); ?>"><img class="btn_right" src="components/com_enmasse/theme/<?php echo $theme?>/images/home_icon_g.png" /></a>
   <span class="header_title"><?php echo $page_header;?></span>
	<div class="clear"></div>
</div>