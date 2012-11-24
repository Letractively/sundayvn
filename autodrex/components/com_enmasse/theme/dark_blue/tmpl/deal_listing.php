<?php


require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."EnmasseHelper.class.php");
require_once( JPATH_ADMINISTRATOR . DS ."components". DS ."com_enmasse". DS ."helpers". DS ."DatetimeWrapper.class.php");

$theme =  EnmasseHelper::getThemeFromSetting();
//--------- add stylesheet and javascript
JFactory::getDocument()->addStyleSheet('components/com_enmasse/theme/' . $theme . '/css/screen.css');
JFactory::getDocument()->addScript("components/com_enmasse/theme/js/jquery/jquery-1.6.2.min.js");

//set default timezone
DatetimeWrapper::setTimezone(DatetimeWrapper::getTimezone());

$oDefault = new JObject();
$oDefault->name = '';
$oDefault->id   = '';
//add an empty select option for location and category list
array_unshift($this->locationList, $oDefault);
array_unshift($this->categoryList, $oDefault);

$dealList = $this->dealList;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="all_deal_listing">
<div class="maincol_full_header">
	<?php if( !($locationId = JRequest::getVar('locationId')) ):?>
		<div id="rss"><a href="components/com_enmasse/views/rss/listdeal/"><img src="components/com_enmasse/theme/<?php echo $theme?>/images/rss.gif" alt="RSS Feed" title="RSS Feed"/></a></div>
	<?php else :?>
		<div id="rss"><a href="components/com_enmasse/views/rss/location/index.php?locationId=<?php echo $locationId?>"><img src="components/com_enmasse/theme/<?php echo $theme?>/images/rss.gif" alt="RSS Feed" title="RSS Feed"/></a></div>
	<?php endif;?>
	<h2><?php echo JText::_('DEAL_LIST_ALL_DEAL')?></h2>
</div>
<div class="maincol_full_content">
	<div class="filters">
		<div class="field clearfix">
	
			
				<table>
					<tr>
						<th><?php echo JText::_('DEAL_SEARCH_NAME');?>:</th>
						<th><?php echo JText::_('DEAL_SEARCH_LOCATION');?>:</th>
						<th><?php echo JText::_('DEAL_SEARCH_CATEGORY');?>:</th>
						<td></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><?php echo JHTML::_('select.genericList', $this->locationList, 'locationId', null , 'id', 'name', $this->locationId);?></td>
						<td><?php echo JHTML::_('select.genericList', $this->categoryList, 'categoryId', null , 'id', 'name', $this->categoryId);?></td>
						<td>
							<select name="sortBy">
							<option value=""><?php echo JText::_('DEAL_LIST_OPTION_SORT_BY');?></option>
							<option value="name" <?php if($this->sortBy=="name"){ echo " selected"; }?>><?php echo JText::_('DEAL_LIST_OPTION_NAME');?></option>
							<option value="end_at" <?php if($this->sortBy=="end_at"){ echo " selected"; }?>><?php echo JText::_('DEAL_LIST_OPTION_END_DATE');?></option>
							<option value="price" <?php if($this->sortBy=="price"){ echo " selected"; }?>><?php echo JText::_('DEAL_LIST_OPTION_PRICE');?></option>
							</select>
						</td>
						<td><input type="submit" class="button" value="<?php echo JText::_('DEAL_LIST_SEARCH'); ?>"></td>
					</tr>
				</table>
			
		</div>
	</div>
</div>
<div class="maincol_full_content">
	
	<?php if(!count($dealList)):?>
		<div><h3><?php echo JText::_('DEAL_LIST_NO_DEAL_MESSAGE') ?></h3></div>
	<?php else:?>
		<?php
			$oDeal = array_shift($dealList);
			$nItemId = JFactory::getApplication()->getMenu()->getItems('link','index.php?option=com_enmasse&view=dealtoday',true)->id;
			$link = 'index.php?option=com_enmasse&controller=deal&task=view&id=' . $oDeal->id ."&slug_name=" .$oDeal->slug_name ."&Itemid=$nItemId";
            if (!EnmasseHelper::is_urlEncoded($oDeal->pic_dir)) {
                $imageUrl = $oDeal->pic_dir;
            } else {
                $imageUrlArr = unserialize(urldecode($oDeal->pic_dir));
                $imageUrl = str_replace("\\", "/", $imageUrlArr[0]);
            }
            
        ?>
		<div class="deal">
			<div class="image">
				<div class="inner">
					<a title="" href="<?php echo JRoute::_($link);?>"><img src="<?php echo $imageUrl?>" width="426"/></a>
				</div>
			</div>
			<div class="info">
				<div class="title">
					<a href="<?php echo JRoute::_($link);?>"><?php echo $oDeal->name?></a>
				</div>
				<div class="subtitle"><?php echo implode(", ", EnmasseHelper::getDealLocationNames($oDeal->id));?></div>
				<div class="description">
					<?php echo $oDeal->short_desc?>
				</div>
				<div class="timer">
					<span><?php echo JText::_("DEAL_TIME_LEFT")?>: </span>
						<span id="cday">00 <?php echo JText::_("DAY")?></span>
						<span id="chour">00 <?php echo JTEXT::_(':');?></span>
						<span id="cmin">00 <?php echo JTEXT::_(':');?></span>
						<span id="csec">00</span>
				</div>
				<div class="line"></div>
				<input name="" type="button" class="button" value="<?php echo JText::_('DEAL_LIST_VIEW_THIS_DEAL')?>" onclick="window.location.href='<?php echo JRoute::_($link)?>'" />
			</div>
			<!-- Time count down script begin -->
			<script language="JavaScript">
				TargetDate = "<?php echo date('Y/m/d H:i:s', strtotime($oDeal->end_at));?>";
                CurrentDate = "<?php echo date('Y/m/d H:i:s', strtotime(DatetimeWrapper::getDatetimeOfNow())); ?>";
				CountActive = true;
				CountStepper = -1;
				LeadingZero = true;
				
				function calcage(secs, num1, num2) {
				  s = ((Math.floor(secs/num1))%num2).toString();
				  if (LeadingZero && s.length < 2)
				    s = "0" + s;
				  return  s ;
				}
				
				function CountBack(secs) {
				  if (secs < 0) {
				    return;
				  }
				  document.getElementById("cday").innerHTML = calcage(secs,86400,100000)+" <?php echo JTEXT::_('DAY');?>";
				  document.getElementById("chour").innerHTML = calcage(secs,3600,24)+" <?php echo JTEXT::_(':');?>";
				  document.getElementById("cmin").innerHTML = calcage(secs,60,60)+" <?php echo JTEXT::_(':');?>";
				  document.getElementById("csec").innerHTML = calcage(secs,1,60);
				
				  if (CountActive)
				    setTimeout("CountBack(" + (secs+CountStepper) + ")", SetTimeOutPeriod);
				}
				
				if (typeof(TargetDate)=="undefined")
				  TargetDate = "12/31/2020 5:00 AM";
				if (typeof(CountActive)=="undefined")
				  CountActive = true;
				if (typeof(FinishMessage)=="undefined")
				  FinishMessage = "";
				if (typeof(CountStepper)!="number")
				  CountStepper = -1;
				if (typeof(LeadingZero)=="undefined")
				  LeadingZero = true;
				
				
				CountStepper = Math.ceil(CountStepper);
				if (CountStepper == 0)
				  CountActive = false;
				var SetTimeOutPeriod = (Math.abs(CountStepper)-1)*1000 + 990;
				
				var dthen = new Date(TargetDate);
				var dnow = new Date(CurrentDate);
				
				if(CountStepper>0)
				  ddiff = new Date(dnow-dthen);
				else
				  ddiff = new Date(dthen-dnow);
				
				gsecs = Math.floor(ddiff.valueOf()/1000);
				
				CountBack(gsecs);
			</script>
			<!-- Time count down script end -->
		</div>
		<?php foreach ($dealList as $oDeal):?>
			<?php
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
			?>
			<div class="deal_small">
				<div class="image">
					<div class="inner">
						<a title="" href="<?php echo JRoute::_($link);?>"><img src="<?php echo $imageUrl?>" /></a>
					</div>
				</div>
				<div class="info">
					<div class="title">
						<div class="price-tag"></div>
						<a href="<?php echo JRoute::_($link);?>"><?php echo $sDealName?></a>
					</div>
					<div class="subtitle">
						<div class="apollo_info"><?php echo JText::_('DEAL_VALUE'); ?>: <b><?php echo EnmasseHelper::displayCurrency($oDeal->origin_price) ?> </b></div>
						<div class="apollo_info"><?php echo JText::_('DEAL_PRICE'); ?>: <b><?php echo EnmasseHelper::displayCurrency($oDeal->price) ?> </b></div>
	                </div>
	                <div class="apollpo_discount">
	                	<b><?php echo (100 - intval($oDeal->price / $oDeal->origin_price * 100)) ?>%</b>
	                </div>
					<input name="" type="button" class="button" value="<?php echo JText::_('DEAL_LIST_VIEW_THIS_DEAL')?>" onclick="window.location.href='<?php echo JRoute::_($link)?>'" />
	                <div class="line"></div>
	 			</div>
 			</div>
		<?php endforeach;?>
	<?php endif;?>
	
</div>
</div><!--All Deal Listing-->

<div id="recent_deals_home">
	<div class="cnt">
        	<div class="left_main">
            	<h2>AUTO DEAL OFFERS</h2>
                
                <?php $newDealList = array_reverse($dealList); ?>
                <?php $countDeals = 0; ?>
                <?php foreach ($newDealList as $oDeal):?>
                	<?php $countDeals++; ?>
                    <?php if($countDeals <= 5 ): ?>
			<?php
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
			
			
			?>
			
				
				
            
            <div class="cnt-left">
            		<h2><a href="<?php echo JRoute::_($link);?>"><?php echo $sDealName; ?></a></h2>
               	  <div class="left">
                   	<span class="frame"><img src="<?php echo $imageUrl?>" alt="" width="226"></span>
                       <span class="button"><a href="<?php echo JRoute::_($link)?>">Get the Deal</a></span>
                    </div><!--close left-->
                    
                    <div class="right">
                    	<h2>Value : <?php echo EnmasseHelper::displayCurrency($oDeal->origin_price) ?><span>Price : <?php echo EnmasseHelper::displayCurrency($oDeal->price) ?></span></h2>
                        <h3><?php echo (100 - intval($oDeal->price / $oDeal->origin_price * 100)) ?>% off </h3>
                        <p><?php echo substr($oDeal->short_desc,0, 250);?></p>
                        
                        <span class="share"><a href="#">Share this Deal</a> <span class="social1">
                        <?php
						//contruct data for social network sharing
							$oMenu = JFactory::getApplication()->getMenu();
							$oItem = $oMenu->getItems('link','index.php?option=com_enmasse&view=dealtoday',true);
							$user = JFactory::getUser();
							$userID = $user->get('id');
							$shareName = $deal->name;
							$shareUrl = JURI::base() . 'index.php?option=com_enmasse&controller=deal&task=view&id='. $deal->id . '&slug_name=' . $deal->slug_name . '&Itemid=' . $oItem->id;
							if($userID!='0')
							{
								$shareUrl .= '&referralid='.$userID;
							}
							$shareShortDesc = str_replace("\"", "'", $deal->short_desc);
							$shareImages = JURI::base(). str_replace("\\","/",$imageUrlArr[0]);
							?>
                        	<ul>
                            	<li><a href="http://www.facebook.com/share.php?u=<?php echo urlencode($shareUrl); ?>" target="blank"><img src="components/com_enmasse/images/social_media/facebook.png"></a></li>
                                
				<li><a href="http://twitter.com/share?url=<?php echo urlencode($shareUrl); ?>" class="" data-url="" data-text="<?php echo $shareShortDesc; ?>" data-count="none" data-via="<?php echo $shareName; ?>" target="_blank"><img src="components/com_enmasse/images/social_media/twitter.png"></a></li>
				<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>					
				<script language="JavaScript" type="text/javascript">
					function mailToFriend() {
						window.open ("index.php?option=com_enmasse&controller=mail&task=mailForm&tmpl=component&dealid=<?php echo $deal->id; ?>&userid=<?php echo $userID; ?>&itemid=<?php echo $oItem->id; ?>", "mywindow","location=0,status=0,scrollbars=0, width=500,height=400");
					}
				</script>  
               <li> <a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode($shareUrl); ?>&media=<?php echo urlencode($shareImages); ?>" class="pin-it-button" count-layout="horizontal" target="_blank"><img border="0" src="components/com_enmasse/images/social_media/pinterest.png" width="24" title="Pin It" /></a></li>
				<li><a href="javascript:void mailToFriend()"><img src="components/com_enmasse/images/social_media/email.png"></a></li>
                            </ul>
                        </span></span>
                   </div><!--close right-->
                </div><!--close cnt-left-->
                <?php endif; ?>
		<?php endforeach;?>
                    
                
            </div><!--close left_main-->
            <div class="sidebar">
           
            <div class="side">
            
            <?php $document = &JFactory::getDocument();
$renderer = $document->loadRenderer('modules');
$options = array('style'=>'xhtml');
echo $renderer->render('home_sidebar',$options,null);
			?>
            	
            </div>

            </div><!--close sidebar-->
        </div><!--Recent Deals-->