<?php
$row = $this->service;
$option = 'com_googlemaplocator';
	JHtml::_('behavior.modal');
	

?>

<script src="components/com_googlemaplocator/helpers/jquery.min.js"></script>
<script>
	function jInsertFieldValue(value, id) {
		var old_value = document.id(id).value;
		if (old_value != value) {
			var elem = document.id(id);
			elem.value = value;
			elem.fireEvent("change");
			if (typeof(elem.onchange) === "function") {
				elem.onchange();
			}
			jMediaRefreshPreview(id);
		}
		}
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
  	<tr>
		<td width="100" align="right" class="key"><?php echo JText::_('Image');?></td>
		<td><input type="text" name="img_url" id="service_img"  value="<?php echo $row->img_url;?>" size="30" /><a class="modal" title="Select" href="index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;author=&amp;fieldid=service_img&amp;folder=" rel="{handler: 'iframe', size: {x: 800, y: 500}}">
Select</a></td>
		
		
	</tr>
  
</table>
</fieldset>

<input type="hidden" name="MAX_FILE_SIZE" value="100000" />

<input type="hidden" name="id" value="<?php echo @$row->id; ?>" />
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="controller" value="service" />
<input type="hidden" name="task" value="" />
</form>
