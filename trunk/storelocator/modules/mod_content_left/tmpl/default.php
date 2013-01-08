<?php
// no direct access
defined('_JEXEC') or die;
$filter_zone = JRequest::getVar("filter_zone");
$filter_type = JRequest::getVar("filter_type");

//$geoData =  (unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'])));
$geoData =  JRequest::getVar('geoData');

?>

<div class="blockSearch">
    <h3><?php echo JText::_('MOD_CONTENT_LEFT_LOCATE_US'); ?></h3>
    <div class="listItemSearch">
        <strong class="titSearchBy"><?php echo JText::_('MOD_CONTENT_LEFT_SEARCH_BY'); ?></strong>
        <form action="<?php echo JRoute::_('index.php?option=com_googlemaplocator&view=location&layout=show'); ?>" method="get" id="frmSearch" name="frmSearch" class="frmSearch" onsubmit="">
            <ul>
                <li class="lineSpec">
                    <label for="txtAddress"><?php echo JText::_('MOD_CONTENT_LEFT_ADDRESS'); ?></label>
                    <input type="text" id="filter_address" name="filter_address" value="<?php if( empty($_GET['filter_address']))echo $geoData['geoplugin_city'] ;else echo $_GET['filter_address'];   ?>" />
                </li>
				<li class="lineSpec">
<h4 ><?php echo $geoData['geoplugin_city']; ?></h4>
                    
			</li>
               <li class="floatR">
                    <span class="btn btn-1">
                        <span>
                          
                                <input type="button" id="btnSearch" name="submit_value" value="Search" title="<?php echo JText::_('MOD_CONTENT_LEFT_SEARCH'); ?>" />
        
                        </span>
                    </span><!--btn-->
                </li>
            </ul>
			<input type="hidden" name="cur_lat_num"  id="cur_lat_num" value="<?php echo $_GET['cur_lat_num']; ?>" />
			<input type="hidden" name="cur_long_num" id="cur_long_num" value="<?php echo $_GET['cur_long_num']; ?>" />
	   </form><!--frmSearch-->
    </div><!--listItemSearch-->
    <span class="bgBot">&nbsp;</span>
</div><!--blockSearch-->