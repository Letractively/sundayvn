<?php

// No direct access.
defined('_JEXEC') or die;
$is_mobile_nano = JRequest::getVar('is_mobile_nano');
if ($is_mobile_nano)
{
	

?>

<form action="index.php" method="GET" class="searchbox">
	<input type="hidden" name="option" value="com_enmasse"/>
	<input type="hidden" name="view" value="deallisting"/>
	<input type="text" name="keyword" />
	<input type="submit" onclick="this.form.keyword.focus();" style="display:none;"/> 
</form>

<?php
}
else
{
	
}
?>