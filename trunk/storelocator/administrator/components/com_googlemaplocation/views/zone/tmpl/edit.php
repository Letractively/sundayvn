<?php
$row = $this->zone;
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
            if (form.name.value == ""){
                alert( "<?php echo JText::_( 'FILL_IN_LOCATION_ZONE_NAME', true ); ?>" );
            }elseif (form.loc_x.value == ""){
                alert( "<?php echo JText::_( 'FILL_IN_LOCATION_ZONE_LOC_X', true ); ?>" );
            }elseif (form.loc_y.value == ""){
                alert( "<?php echo JText::_( 'FILL_IN_LOCATION_ZONE_LOC_Y', true ); ?>" );
            }elseif (form.zoom_rate.value == ""){
                alert( "<?php echo JText::_( 'FILL_IN_LOCATION_ZONE_ZOOM_RATE', true ); ?>" );
            }else{
                submitform( pressbutton );
                return;
            }
        }
        //-->
        </script>
<form action="index.php" method="post" name="adminForm" id="adminForm">
<fieldset class="adminform"><legend><?php echo JText::_('EDIT_LOCATION_ZONE');?></legend>
<table class="admintable">
	<tr>
		<td width="100" align="right" class="key"><?php echo JText::_('SHOW_ZONE_NAME');?></td>
		<td><input type="text" name="name" id="name" value="<?php echo htmlspecialchars(@$row->name, ENT_COMPAT, 'UTF-8'); ?>" size="40" /></td>
	</tr>
    <tr>
		<td width="100" align="right" class="key"><?php echo JText::_('SHOW_ZONE_LOC_X');?></td>
		<td><input type="text" name="loc_x" id="loc_x" value="<?php echo @$row->loc_x; ?>" size="40" /></td>
	</tr>
    <tr>
		<td width="100" align="right" class="key"><?php echo JText::_('SHOW_ZONE_LOC_Y');?></td>
		<td><input type="text" name="loc_y" id="loc_y" value="<?php echo @$row->loc_y; ?>" size="40" /></td>
	</tr>
	<tr>
		<td width="100" align="right" class="key"><?php echo JText::_('SHOW_ZONE_ZOOM_RATE');?></td>
		<td><input type="text" name="zoom_rate" id="zoom_rate" value="<?php echo @$row->zoom_rate; ?>" size="40" /></td>
	</tr>
</table>
</fieldset>

<input type="hidden" name="id" value="<?php echo @$row->id; ?>" />
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="controller" value="zone" />
<input type="hidden" name="task" value="" />
</form>
