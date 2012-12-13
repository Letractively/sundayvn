<?php
// no direct access
defined('_JEXEC') or die;
?>

<ul class="listLocate">
    <li class="titNote"><?php echo JText::_('MOD_MAP_LEGEND_TITLE'); ?></li>
    <?php foreach ($locationType as $type) { ?>
        <li>
            <img width="32" height="32" src="<?php echo JURI::root() . 'components/com_googlemaplocator/uploads/' . $type->images; ?>" alt="" />
            <span><?php echo $type->type; ?></span>
        </li>
    <?php } ?>
</ul>
