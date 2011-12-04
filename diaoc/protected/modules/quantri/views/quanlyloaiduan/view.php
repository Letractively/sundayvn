<?php
$this->breadcrumbs=array(
	'Quanlyloaiduans'=>array('index'),
	$model->idLoai_du_an,
);

$this->menu=array(
	array('label'=>'Danh mục dự án', 'url'=>array('index')),
	array('label'=>'Tạo mới dự án', 'url'=>array('create')),
	array('label'=>'Cập nhật', 'url'=>array('update', 'id'=>$model->idLoai_du_an)),
	array('label'=>'Xóa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idLoai_du_an),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Quản lý danh mục dự án', 'url'=>array('admin')),
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
