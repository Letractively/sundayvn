<?php
$row = $this->service;
$option = 'com_googlemaplocator';
?>

<script src="components/com_googlemaplocator/helpers/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#type_id").val(<?php echo $row->type_id; ?>);
});
</script>

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
            if (form.service.value == ""){
                alert( "<?php echo JText::_( 'Please fill location service', true ); ?>" );
            }
            
            else{
                submitform( pressbutton );
                return;
            }
        }
        //-->
        </script>
<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
<fieldset class="adminform"><legend><?php echo JText::_('Service');?></legend>
<table class="admintable">
	<tr>
		<td width="100" align="right" class="key"><?php echo JText::_('Location Service');?></td>
		<td><input type="text" name="service" id="service" value="<?php echo htmlspecialchars(@$row->service, ENT_COMPAT, 'UTF-8'); ?>" size="30" /></td>
	</tr>
    <!--tr>
		<td width="100" align="right" class="key"><?php echo JText::_('Location Type');?></td>
		<td>
                    <select name="type_id" id="type_id" style="width:170px;">
                        <option value=""><?php echo JText::_('-- Select Type --'); ?></option>
                        <?php echo JHtml::_('select.options', $this->list_type); ?>
                    </select>
            </td>
	</tr-->
</table>
</fieldset>

<input type="hidden" name="MAX_FILE_SIZE" value="100000" />

<input type="hidden" name="id" value="<?php echo @$row->id; ?>" />
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="controller" value="service" />
<input type="hidden" name="task" value="" />
</form>
