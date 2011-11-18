<?php
$this->breadcrumbs=array(
	'Danh mục'=>array('index'),
	$model->idDanhmuc,
);

$this->menu=array(
//	array('label'=>'List DanhMuc', 'url'=>array('index')),
//	array('label'=>'Create DanhMuc', 'url'=>array('create')),
	array('label'=>'Cập nhật', 'url'=>array('capnhat', 'id'=>$model->idDanhmuc)),
	array('label'=>'Xóa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('xoa','id'=>$model->idDanhmuc),'confirm'=>'Bạn có chắc là muốn xóa Danh mục #'.$model->idDanhmuc.'?')),
//	array('label'=>'Manage DanhMuc', 'url'=>array('admin')),
);
?>

<h1>Danh mục #<?php echo $model->idDanhmuc; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idDanhmuc',
		'Ten_Danhmuc',
		'Mieuta_Danhmuc',
	),
)); ?>
