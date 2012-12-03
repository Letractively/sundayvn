<?php
JFactory::getDocument()->addScript("components/com_enmasse/theme/js/jquery/jquery-1.6.2.min.js");
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