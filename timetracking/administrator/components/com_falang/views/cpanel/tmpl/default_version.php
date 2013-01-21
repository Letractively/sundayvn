<?php 
/*
*/
defined('_JEXEC') or die('Restricted access');
?>
<div style="padding: 5px;">
    <table class="adminlist">
        <tr>
            <th width="120"><?php echo JText::_('COM_FALANG_CPANEL_CURRENT_VERSION'); ?>:</th>
            <td><?php echo $this->currentVersion; ?></td>
        </tr>
        <tr>
            <th><?php echo JText::_('COM_FALANG_CPANEL_LATEST_VERSION'); ?>:</th>
                <td><div id="falang-last-version"><?php

                    if (version_compare($this->latestVersion,$this->currentVersion,'>' )) {
                        ?><span class="red"><?php
                            echo $this->latestVersion;
                            ?></span><?php
                    } else {
                        echo $this->currentVersion;
                    }
                    ?>
                 <input type="button" value="<?php echo JText::_('COM_FALANG_CPANEL_CHECK_UPDATES'); ?>" onclick="checkUpdates();">
                 <span id="falang-update-progress"></span>
                <div>
                </td>
        </tr>
    </table>

    <div id="updatescontent" class="updates"></div>

</div>