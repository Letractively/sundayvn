<?php
$this->breadcrumbs=array(
	'Khachhang Canhans',
);

$this->menu=array(
	array('label'=>'Create KhachhangCanhan', 'url'=>array('create')),
	array('label'=>'Manage KhachhangCanhan', 'url'=>array('admin')),
);
?>

<h1>Khachhang Canhans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
