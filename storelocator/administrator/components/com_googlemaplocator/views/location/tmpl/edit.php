<?php
$row = $this->location;
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
            if (form.name.value == ""){
                alert( "<?php echo JText::_( 'FILL_IN_LOCATION_NAME', true ); ?>" );
            }else if(form.zone_id.value == "") {
                alert( "Please choice location zone" );
            }else if(form.type.value == "") {
                alert( "Please choice location type" );
            }else if (form.loc_x.value == ""){
                alert( "<?php echo JText::_( 'FILL_IN_LOCATION_LOCX', true ); ?>" );
            }else if (form.loc_y.value == ""){
                alert( "<?php echo JText::_( 'FILL_IN_LOCATION_LOCY', true ); ?>" );
            }else if (form.address.value == ""){
                alert( "<?php echo JText::_( 'FILL_IN_LOCATION_ADDRESS', true ); ?>" );
            }else{
                submitform( pressbutton );
                return;
            }
        }
        //-->
        </script>
        
<form action="index.php" method="post" name="adminForm" id="adminForm">
<fieldset class="adminform"><legend><?php echo JText::_('EDIT_LOCATION_ADD_POINT');?></legend>
<table class="admintable">
	<tr>
		<td width="100" align="right" class="key"><?php echo JText::_('EDIT_LOCATION_NAME');?></td>
		<td><input type="text" name="name" id="name" value="<?php echo htmlspecialchars(@$row->name, ENT_COMPAT, 'UTF-8'); ?>" size="40" /></td>
	</tr>
    <tr>
		<td width="100" align="right" class="key"><?php echo JText::_('EDIT_LOCATION_ZONE');?></td>
		<td>
        <?php echo JHTML::_('select.genericList',$this->select_zone, 'zone_id', null , 'value','text', @$row->zone_id); ?>
        </td>
	</tr>
    <tr>
		<td width="100" align="right" class="key"><?php echo JText::_('EDIT_LOCATION_TYPE');?></td>
		<td>
        <?php echo JHTML::_('select.genericList',$this->select_type, 'type', null , 'value','text', @$row->type); ?>
        </td>
	</tr>
        <tr>
		<td width="100" align="right" class="key"><?php echo JText::_('Service');?></td>
		
                <td>
                    <table style="margin-left: 10px;font-size: 0.9em;">
                        <?php foreach($this->list_service as $lc_service) { ?>
                        <tr>
                            <td><input type="checkbox" id="location_service" name="location_service[]" value="<?php echo $lc_service->id; ?>" <?php echo $lc_service->checked; ?> /></td>
                            <td><?php echo $lc_service->service; ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </td>
	</tr>
    <tr>
		<td width="100" align="right" class="key"><?php echo JText::_('EDIT_LOCATION_ADDRESS');?></td>
		<td><input type="text" name="address" id="address" value="<?php echo htmlspecialchars(@$row->address, ENT_COMPAT, 'UTF-8'); ?>" size="40" /></td>
	</tr>
    <tr>
		<td width="100" align="right" class="key"><?php echo JText::_('EDIT_LOCATION_POSTAL_CODE');?></td>
		<td><input type="text" name="postal_code" id="postal_code" value="<?php echo @$row->postal_code; ?>" size="40" /></td>
	</tr>
	<tr>
		<td width="100" align="right" class="key"><?php echo JText::_('EDIT_LOCATION_DESCRIPTION');?></td>
		<td>
        <?php 
    		$editor =& JFactory::getEditor();
    		echo $editor->display('description', @$row->description, '450', '200', '50', '3');
		?>
        </td>
	</tr>
    <tr>
		<td width="100" align="right" class="key"><?php echo JText::_('EDIT_LOCATION_LOCX');?></td>
		<td><input type="text" name="loc_x" id="loc_x" value="<?php echo @$row->loc_x; ?>" size="40" /></td>
	</tr>
    <tr>
		<td width="100" align="right" class="key"><?php echo JText::_('EDIT_LOCATION_LOCY');?></td>
		<td><input type="text" name="loc_y" id="loc_y" value="<?php echo @$row->loc_y; ?>" size="40" /></td>
	</tr>
</table>
</fieldset>

<input type="hidden" name="id" value="<?php echo @$row->id; ?>" />
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="controller" value="location" />
<input type="hidden" name="task" value="" />
</form>
