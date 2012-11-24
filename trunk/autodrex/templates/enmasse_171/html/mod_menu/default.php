<?php
/**
 * @version		$Id: default.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Joomla.Site
 * @subpackage	mod_menu
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
?>

<ul class="menu<?php echo $class_sfx;?>"<?php
	$tag = '';
	if ($params->get('tag_id')!=NULL) {
		$tag = $params->get('tag_id').'';
		echo ' id="'.$tag.'"';
	}
?>>
<?php
foreach ($list as $i => &$item) :
	$class = '';
	if ($item->id == $active_id) {
		$class .= 'current ';
	}

	if (in_array($item->id, $path)) {
		$class .= 'active ';
	}

	if ($item->deeper) {
		$class .= 'parent ';
	}

	if (!empty($class)) {
		$class = ' class="'.trim($class) .'"';
	}

	echo '<li id="item-'.$item->id.'"'.$class.'>';

	// Render the menu item.
	switch ($item->type) :
		case 'separator':
		case 'url':
		case 'component':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
			break;
	endswitch;

	// The next item is deeper.
	if ($item->deeper) {
		echo '<ul>';
	}
	// The next item is shallower.
	else if ($item->shallower) {
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else {
		echo '</li>';
	}
endforeach;
?></ul>
<script type="text/javascript">
	function initMainMenu(){        
	    var menu = jQuery('.menu');
	    if(menu.length > 0){
	    	menu.css('position', 'relative');
	        var childs = menu.children();
	        jQuery.each(childs, function(ind, child){
	            var ch = jQuery(child);
	            if(ch.find('ul').length > 0){
	                ch.sub = ch.find('ul');
	                ch.sub.subHeight = ch.find('ul').height();
	                //console.log(ch.sub.subHeight);
	                ch.sub.addClass('subClone').css({
	                    'position': 'absolute',
	                    'top': -15000
	                });	                
	                ch.bind({
	                    'mouseenter': function(e){
	                       ch.sub.css({
	                            'height': ch.sub.subHeight,
	                            'position': 'absolute',	                            
	                            'left': ch.position().left ,
                                'top' : ch.position().top + ch.height() + 5,
	                            'z-index':'9999'	                            
	                        });
	                    },
	                    'mouseleave': function(e){
	                        ch.sub.css({	                            
	                            'top': -15000
	                        });
	                    }                            
	                });
	            }                    
	        });
	    }
	};
	jQuery(document).ready( function(){
		initMainMenu();
	})
</script>