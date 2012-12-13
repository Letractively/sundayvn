<?php
$row = $this->type;
$option = 'com_googlemaplocator';
?>
<script language="javascript" type="text/javascript">
    <!--
    Joomla.submitbutton = function(pressbutton)
    {
        var form = document.adminForm;
        if (pressbutton == 'cancel')
        {
            submitform( pressbutton );
            return;
        }
        if (form.type.value == ""){
            alert( "<?php echo JText::_('FILL_IN_LOCATION_TYPE', true); ?>" );
        }else{
            submitform( pressbutton );
            return;
        }
    }
    //-->
</script>
<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
    <fieldset class="adminform"><legend><?php echo JText::_('EDIT_LOCATION_TYPE'); ?></legend>
        <table class="admintable" style="width: 600px;">
            <tr>
                <td width="100" align="right" class="key"><?php echo JText::_('SHOW_TYPE_TYPE'); ?></td>
                <td><input type="text" name="type" id="type" value="<?php echo htmlspecialchars(@$row->type, ENT_COMPAT, 'UTF-8'); ?>" size="40" /></td>
            </tr>
            <tr>
                <td width="100" align="right" class="key"><?php echo JText::_('TYPE_IMAGES'); ?></td>
                <td>
                    <input type="file" name="images" id="images" value="<?php echo @$row->images; ?>" />
                    
                    <input type="hidden" name="images_tmp" value="<?php echo @$row->images; ?>" />
                    
                    <?php if (trim(@$row->images) != '') { ?>
                        <img src="<?php echo JURI::root(); ?>components/com_googlemaplocator/uploads/<?php echo @$row->images; ?>" height="30px" />
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">&nbsp;</td>
                <td>Please just use the icon with 32x32 size.</td>
            </tr>
        </table>
    </fieldset>

    <input type="hidden" name="MAX_FILE_SIZE" value="100000" />

    <input type="hidden" name="id" value="<?php echo @$row->id; ?>" />
    <input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="controller" value="type" />
    <input type="hidden" name="task" value="" />
</form>
