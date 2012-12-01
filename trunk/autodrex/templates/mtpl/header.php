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
?> 
	<div class="clear"></div>
</div>
<?php
$db = JFactory::getDBO();
$db->setQuery('select * from #__enmasse_category ');
$categories = $db->loadAssocList();
/*echo "<pre>";
print_r($categories );
echo "</pre>";
*/
echo "<div id='listCate' style='text-align: center;background: #2C89C6;'>";
foreach ($categories as $cat)
{
?>
<p><a href='<?=JRoute::_('index.php?option=com_enmasse&view=deallisting&categoryId='.$cat['id']);?>'><?=$cat['name'];?></a></p>
<?php
}

  echo "</div>";
  ?>
  <style>
  #listCate p
  {
  border-bottom:1px solid #ccc;
  }
  #listCate p a
  {
  display:block;
  color: black;
font-weight: bold;
  padding:5px 0px;
  }
  .selectcate
  {
  float: right;
margin-right: 71px;
color: white;
border: 1px solid #CCC;
line-height: 23px;
padding: 0px 10px;
cursor: pointer;
  }
  </style>