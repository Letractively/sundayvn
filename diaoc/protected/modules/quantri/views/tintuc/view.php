<?php
$this->breadcrumbs=array(
	'Tin Tucs'=>array('index'),
	$model->idTin_tuc,
);

$this->menu=array(
	array('label'=>'List TinTuc', 'url'=>array('index')),
	array('label'=>'Create TinTuc', 'url'=>array('create')),
	array('label'=>'Update TinTuc', 'url'=>array('update', 'id'=>$model->idTin_tuc)),
	array('label'=>'Delete TinTuc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idTin_tuc),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TinTuc', 'url'=>array('admin')),
);
?>

<h1>View TinTuc #<?php echo $model->idTin_tuc; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idTin_tuc',
		'idDanhmuc',
		'Hinh_anh',
		'Noi_dung_ngan',
		'Noi_dung',
		'Ngay_dang',
	),
)); ?>
