<?php

 
require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."EnmasseHelper.class.php");
require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."DatetimeWrapper.class.php");

JFactory::getDocument()->addScript("components/com_enmasse/theme/js/jquery/jquery-1.6.2.min.js");
JFactory::getDocument()->addScriptDeclaration('jQuery.noConflict()');

//assign short name for variables
$dealList = $this->dealList;
$nItemId = JRequest::getVar('Itemid');
$app = JFactory::getApplication();
$app->setUserState('staticTitle', JText::_('Upcoming'));
?>
	<?php if(!count($dealList)):?>
		<div  class="row"><span class="deal_title"><?php echo JText::_('DEAL_LIST_NO_DEAL_MESSAGE') ?></span></div>
	<?php else:?>
	<!-- list -->
		<?php
		foreach ($dealList as $oDeal):?>
			<?php
			
			//echo count($dealList);
			//$i++;
			$link = 'index.php?option=com_enmasse&controller=deal&task=view&id=' . $oDeal->id ."&slug_name=" .$oDeal->slug_name ."&Itemid=$nItemId";
            if (!EnmasseHelper::is_urlEncoded($oDeal->pic_dir)) {
                $imageUrl = $oDeal->pic_dir;
            } else {
                $imageUrlArr = unserialize(urldecode($oDeal->pic_dir));
                $imageUrl = str_replace("\\", "/", $imageUrlArr[0]);
            }
            $sDealName = $oDeal->name;
            if(strlen($sDealName) > 30)
            {
            	$sDealName = substr($sDealName, 0, 30) ."...";
            }
            $sDealPosition = implode(", ", EnmasseHelper::getDealLocationNames($oDeal->id));
			?>
				<div  class="row row_list item_deal" onclick="window.location.href='<?php echo $link;?>'">
					<a class="img_list" href="<?php echo $link;?>"><img src="<?php echo $imageUrl; ?>" /></a>
					<span><a href="<?php echo $link;?>"><?php echo substr(strip_tags(html_entity_decode($oDeal->name)), 0, 200);?></a></span>
					<br /><span><?php echo  $sDealPosition;?></span>
					<div class="discount"><span><?php echo empty($oDeal->origin_price)? 100 : (100 - intval($oDeal->price/$oDeal->origin_price*100))?>%<?php echo JTEXT::_('OFF');?></span></div>
					<a class="bigger_sign" href="<?php echo $link;?>"></a>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
		<?php endforeach;?>
	<?php endif;?>
