<div id="header">
   <a class="btn_left" href="javascript:history.back(1)"><img alt="EnMasse" src="components/com_enmasse/theme/<?php echo $theme;?>/images/icon_back.png" /></a>
   <a class="btn_left" href="<?php echo $this->baseurl ?>"><img alt="EnMasse" src="components/com_enmasse/theme/<?php echo $theme;?>/images/icon_home.png" /></a>
   <div id="logo">
		<a class="btn_left" href="<?php echo $this->baseurl ?>"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo.png" /></a>
	</div>
   <?php include 'icons.php';?>
<?php
if(empty($catid))
{

 ?>
   <span class="header_title"><?php echo $page_header;?></span>
<?php

}
if ($view=="categories")
{
?>
   <span class="header_title">Categories</span>
<?php
}
?> 
	<div class="clear"></div>
</div>