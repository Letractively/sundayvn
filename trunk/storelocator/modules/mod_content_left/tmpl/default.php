<?php
// no direct access
defined('_JEXEC') or die;
$filter_zone = JRequest::getVar("filter_zone");
$filter_type = JRequest::getVar("filter_type");
?>

<div class="blockSearch">
    <h3><?php echo JText::_('MOD_CONTENT_LEFT_LOCATE_US'); ?></h3>
    <div class="listItemSearch">
        <strong class="titSearchBy"><?php echo JText::_('MOD_CONTENT_LEFT_SEARCH_BY'); ?></strong>
        <form action="<?php echo JRoute::_('index.php?option=com_googlemaplocator&view=location&layout=show'); ?>" method="post" id="frmSearch" name="frmSearch" class="frmSearch">
            <ul>
                <li class="lineSpec">
                    <label for="txtAddress"><?php echo JText::_('MOD_CONTENT_LEFT_ADDRESS'); ?></label>
                    <input type="text" id="filter_address" name="filter_address" value="" />
                </li>
                <li>
                    <label for="txtZone"><?php echo JText::_('MOD_CONTENT_LEFT_ZONE'); ?></label>
                    <select name="filter_zone" id="filter_zone" class="inputbox">
                        <option value=""><?php echo JText::_('MOD_CONTENT_LEFT_SELECT_ZONE'); ?></option>
                        <?php echo JHtml::_('select.options', $list_filter_zone); ?>
                    </select>
                </li>
                <li>
                    <label for="txtType"><?php echo JText::_('MOD_CONTENT_LEFT_TYPE'); ?></label>
                    <select name="filter_type" id="filter_type" class="inputbox">
                        <option value=""><?php echo JText::_('MOD_CONTENT_LEFT_SELECT_TYPE'); ?></option>
                        <?php echo JHtml::_('select.options', $list_filter_type); ?>
                    </select>
                </li>
                <li>
                    <label for="txtServices"><?php echo JText::_('MOD_CONTENT_LEFT_SERVICES'); ?></label>
                    <select name="filter_service" id="filter_service" class="inputbox">
                        <option value=""><?php echo JText::_('MOD_CONTENT_LEFT_SELECT_SERVICES'); ?></option>
                        <?php echo JHtml::_('select.options', $list_filter_service); ?>
                    </select>
                </li>
                <li class="floatR">
                    <span class="btn btn-1">
                        <span>
                            <?php if (JRequest::getString('view') != "location" || JRequest::getString('option') != "com_googlemaplocator") { ?>
                                <input type="submit" id="btnSearch" name="submit_value" value="Search" title="<?php echo JText::_('MOD_CONTENT_LEFT_SEARCH'); ?>" />
                            <?php } else { ?>
                                <input type="button" id="btnSearch" name="submit_value" value="Search" title="<?php echo JText::_('MOD_CONTENT_LEFT_SEARCH'); ?>" />
                            <?php } ?>
                        </span>
                    </span><!--btn-->
                </li>
            </ul>
        </form><!--frmSearch-->
    </div><!--listItemSearch-->
    <span class="bgBot">&nbsp;</span>
</div><!--blockSearch-->