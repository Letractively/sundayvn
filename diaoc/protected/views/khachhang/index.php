<?php
$this->breadcrumbs=array(
	'Khach Hangs',
);

$this->menu=array(
	array('label'=>'Create KhachHang', 'url'=>array('create')),
	array('label'=>'Manage KhachHang', 'url'=>array('admin')),
);
?>

<h1>Khach Hangs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
