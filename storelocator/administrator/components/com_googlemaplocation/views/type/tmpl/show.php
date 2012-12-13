<?php
$rows = $this->typeList;
$option = 'com_googlemaplocation';
$filter_search = JRequest::getVar("filter_search");
$filter_type = JRequest::getVar("filter_type");
?>
<script src="components/com_googlemaplocation/helpers/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#filter_type").val(<?php echo $filter_type; ?>);
});
</script>
<script language="javascript" type="text/javascript">
function tableOrdering( order, dir, task )
{
	var form = document.adminForm;
 
	form.filter_order.value = order;
	form.filter_order_Dir.value = dir;
	document.adminForm.submit( task );
}
</script>

<div>
<form action="index.php" method="post" name="adminForm">
    <fieldset id="filter-bar">
        <div class="filter-search fltlft">
			<label class="filter-search-lbl" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
			<input type="text" name="filter_search" id="filter_search" value="<?php echo $filter_search; ?>" onclick="document.id('filter_search').value='';" />

			<button type="submit" class="btn"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
			<button type="button" onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
		</div>
		<div class="filter-select fltrt">
			<select name="filter_type" id="filter_type" class="inputbox" onchange="this.form.submit()">
				<option value=""><?php echo JText::_('JOPTION_SELECT_TYPE');?></option>
				<?php echo JHtml::_('select.options', $this->filter_type); ?>
			</select>
		</div>
	</fieldset>
	<div class="clr"> </div>

<table class="adminlist">
	<thead>
		<tr>
			<th width="5"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" /></th>
			<th><?php echo JHtml::_('grid.sort', 'SHOW_TYPE_TYPE', 'type', $this->lists['order_Dir'], $this->lists['order']); ?></th>
            <th><?php echo JText::_("TYPE_IMAGES"); ?></th>			
            <th><?php echo JHtml::_('grid.sort', 'SHOW_ID', 'id', $this->lists['order_Dir'], $this->lists['order']); ?></th>
		</tr>
	</thead>
	<?php
	for ($i=0; $i < count( $rows ); $i++)
	{
		$k = $i % 2;
		
		$row = &$rows[$i];
		$checked = JHTML::_('grid.id', $i, $row->id );
		$link =  JRoute::_('index.php?option=' . $option .'&controller=type'.'&task=edit&cid[]='. $row->id) ;
	?>
	<tr class="<?php echo "row$k"; ?>">
		<td><?php echo $checked; ?></td>
		<td align="center"><a href="<?php echo $link?>"><?php echo $row->type; ?></a></td>
        <td align="center"><img src="../components/com_googlemaplocation/uploads/<?php echo $row->images; ?>" height="30px" /></td>
        <td align="center"><?php echo $row->id; ?></td>
	</tr>
	<?php
	} 
	?>
</table>
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />

<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="controller" value="type" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
</form>
</div>
