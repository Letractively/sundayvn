<?php
$this->breadcrumbs=array(
	'Quanlyloaiduans'=>array('index'),
	$model->idLoai_du_an,
);

$this->menu=array(
	array('label'=>'List Quanlyloaiduan', 'url'=>array('index')),
	array('label'=>'Create Quanlyloaiduan', 'url'=>array('create')),
	array('label'=>'Update Quanlyloaiduan', 'url'=>array('update', 'id'=>$model->idLoai_du_an)),
	array('label'=>'Delete Quanlyloaiduan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idLoai_du_an),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Quanlyloaiduan', 'url'=>array('admin')),
);
?>

<h1>View Quanlyloaiduan #<?php echo $model->idLoai_du_an; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idLoai_du_an',
		'ten_du_an',
	),
)); ?>
