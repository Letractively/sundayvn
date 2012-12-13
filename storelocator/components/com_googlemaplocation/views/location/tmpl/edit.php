<?php
$row = $this->location;
$option = 'com_advarticle';
?>
<script language="javascript" type="text/javascript">
    
    Joomla.submitbutton = function(pressbutton)
    {
        var form = document.adminForm;
        if (pressbutton == 'cancel')
        {
            submitform( pressbutton );
            return;
        }
        if (form.name.value == ""){
            alert( "<?php echo JText::_('FILL_IN_LOCATION_NAME', true); ?>" );
        }elseif (form.loc_x.value == ""){
            alert( "<?php echo JText::_('FILL_IN_LOCATION_LOCX', true); ?>" );
        }elseif (form.loc_y.value == ""){
            alert( "<?php echo JText::_('FILL_IN_LOCATION_LOCY', true); ?>" );
        }else{
            submitform( pressbutton );
            return;
        }
    }
    
</script>
<form action="index.php" method="post" name="adminForm" id="adminForm">
    <fieldset class="adminform"><legend><?php echo JText::_('EDIT_LOCATION_ADD_POINT'); ?></legend>
        <table class="admintable">
            <tr>
                <td width="100" align="right" class="key"><?php echo JText::_('EDIT_LOCATION_NAME'); ?></td>
                <td><input type="text" name="name" id="name" value="<?php echo $row->name; ?>" size="40" /></td>
            </tr>
            <tr>
                <td width="100" align="right" class="key"><?php echo JText::_('EDIT_LOCATION_TYPE'); ?></td>
                <td>
                    <?php
                    $value = array('1' => JText::_('POST_OFFICE'), '2' => JText::_('SAM'), '3' => JText::_('POSTBOX'));
                    echo JHTML::_('select.genericList', $value, 'type', null, 'value', 'text', $row->type);
                    ?>
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key"><?php echo JText::_('EDIT_LOCATION_DESCRIPTION'); ?></td>
                <td>
                    <?php
                    $editor = & JFactory::getEditor();
                    echo $editor->display('description', $row->description, '450', '200', '50', '3');
                    ?>
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key"><?php echo JText::_('EDIT_LOCATION_LOCX'); ?></td>
                <td><input type="text" name="loc_x" id="loc_x" value="<?php echo $row->loc_x; ?>" size="40" /></td>
            </tr>
            <tr>
                <td width="100" align="right" class="key"><?php echo JText::_('EDIT_LOCATION_LOCY'); ?></td>
                <td><input type="text" name="loc_y" id="loc_y" value="<?php echo $row->loc_y; ?>" size="40" /></td>
            </tr>
        </table>
    </fieldset>
    <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
    <input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="controller" value="location" />
    <input type="hidden" name="task" value="" />
</form>
