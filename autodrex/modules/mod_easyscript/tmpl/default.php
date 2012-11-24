<?php 

/**
 * Easy Family System - Easy Source module
 * Module Version 1.0.1 - Joomla! Version 2.5
 * Author: Ciro Artigot
 * info@aixeena.org
 * http://aixeena.org
 * Copyright (c) 2011 Ciro Artigot. All Rights Reserved. 
 * License: GNU/GPL 2, http://www.gnu.org/licenses/gpl-2.0.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 
if($php_) {?>
<div class="easyscript"><?php eval($code); ?></div>
<?php } else { ?>
<div class="easyscript"><?php echo($code); ?></div>
<?php } ?>