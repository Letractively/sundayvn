<?php
$row = $this->setting;
$option = 'com_googlemaplocation';
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
            if (form.default_locx.value == ""){
                alert( "<?php echo JText::_( 'FILL_IN_LOCATION_DEFAULT_X', true ); ?>" );
            }else if (form.default_locy.value == ""){
                alert( "<?php echo JText::_( 'FILL_IN_LOCATION_DEFAULT_Y', true ); ?>" );
            }
            else if (form.default_zoom.value == ""){
                alert( "<?php echo JText::_( 'FILL_IN_LOCATION_DEFAULT_Y', true ); ?>" );
            }else{
                submitform( pressbutton );
                return;
            }
        }
        //-->
        </script>
<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
<fieldset class="adminform"><legend><?php echo JText::_('EDIT_LOCATION_SETTING');?></legend>
<table class="admintable">
	<tr>
		<td width="120" align="left" class="key"><?php echo JText::_('SHOW_SETTING_DEFAULTLOCX');?></td>
		<td>
            <input type="text" name="default_locx" id="default_locx" value="<?php echo $row->default_locx; ?>" size="40" />
        </td>
	</tr>
    <tr>
		<td width="100" align="left" class="key"><?php echo JText::_('SHOW_SETTING_DEFAULTLOCY');?></td>
		<td>
            <input type="text" name="default_locy" id="default_locy" value="<?php echo $row->default_locy; ?>" size="40" />
        </td>
	</tr>
        <tr>
		<td width="100" align="left" class="key"><?php echo JText::_('Default Zoom Rate');?></td>
		<td>
            <input type="text" name="default_zoom" id="default_zoom" value="<?php echo $row->default_zoom; ?>" size="40" />
        </td>
	</tr>
</table>
</fieldset>

<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="controller" value="setting" />
<input type="hidden" name="task" value="" />
</form>
