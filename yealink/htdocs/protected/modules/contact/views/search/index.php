<?php
$this->breadcrumbs=array(
$this->module->id,
);
?>
<?php
if(!empty($error_array))
{
	echo "<p><B>Error</B></p>";
	foreach($error_array as $err)
	{
		echo $err . "<br />";
	}
	
	
}
echo "<textarea style='width:100%;height:300px'>".$xmlC."</textarea>";
?>