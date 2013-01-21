<?php 
defined('_JEXEC') or die('Restricted access'); ?>

<form action="index.php" method="post" name="adminForm">
    <div class="width-35 fltlft">

            <div id="cpanel">
            <?php
            $link = 'index.php?option=com_falang&amp;task=translate.overview';
            $this->_quickiconButton( $link, 'icon-48-translation.png', JText::_('COM_FALANG_CPANEL_QBT_TRANSLATION') );

            $link = 'index.php?option=com_falang&amp;task=translate.orphans';
            $this->_quickiconButton( $link, 'icon-48-orphan.png', JText::_('COM_FALANG_CPANEL_QBT_ORPHANS') );

           ?>
            <div style="clear: both;"></div>
           <?php
            $link = 'index.php?option=com_falang&amp;task=elements.show';
            $this->_quickiconButton( $link, 'icon-48-extension.png', JText::_('COM_FALANG_CPANEL_QBT_CONTENT_ELEMENTS') );

            $link = 'index.php?option=com_falang&amp;task=help.show';
            $this->_quickiconButton( $link, 'icon-48-help.png', JText::_('COM_FALANG_CPANEL_QBT_HELP_AND_HOWTO') );
            ?>
        </div>
    </div>
    <div class="width-65 fltrt">
        <?php
             echo JHtml::_('sliders.start', 'falang-slider');
                //version
                echo JHtml::_('sliders.panel', JText::_('COM_FALANG_CPANEL_VERSION'), 'version-panel');
                echo $this->loadTemplate('version');

                //information
                echo JHtml::_('sliders.panel', JText::_('COM_FALANG_CPANEL_INFORMATION'), 'information-panel');
                echo $this->loadTemplate('information');
            echo JHtml::_('sliders.end');
        ?>
    </div>
    <div style="clear: both;"></div>


<input type="hidden" name="option" value="com_falang" />
<input type="hidden" name="task" value="cpanel.show" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="<?php echo JUtility::getToken(); ?>" value="1" />
</form>
