<?php
defined('_JEXEC') or die;
jimport('joomla.filesystem.file');
// remove mootools-core.js and caption.js from your Joomla Websites
$headerjs = $this->getHeadData();
reset($headerjs['scripts']);
foreach ($headerjs['scripts'] as $script=>$type) {
    if (($mootools_core_enabled == "false" and strpos($script,'mootools-core.js')) or ($mootools_more_enabled == "false" and strpos($script,'mootools-more.js')) or ($caption_enabled == "false" and strpos($script,'caption.js'))) {
        unset($headerjs['scripts'][$script]);
    }
}
$this->setHeadData($headerjs);
?>