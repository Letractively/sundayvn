<?php
$this->breadcrumbs=array(
	'Tin Tucs',
);

$this->menu=array(
	array('label'=>'Create TinTuc', 'url'=>array('create')),
	array('label'=>'Manage TinTuc', 'url'=>array('admin')),
);
?>

<h1>Tin Tucs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
