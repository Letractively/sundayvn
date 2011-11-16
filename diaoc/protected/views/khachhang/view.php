<?php
$this->breadcrumbs=array(
	'Khach Hangs'=>array('index'),
	$model->ID_khach_hang,
);

$this->menu=array(
	array('label'=>'List KhachHang', 'url'=>array('index')),
	array('label'=>'Create KhachHang', 'url'=>array('create')),
	array('label'=>'Update KhachHang', 'url'=>array('update', 'id'=>$model->ID_khach_hang)),
	array('label'=>'Delete KhachHang', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_khach_hang),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KhachHang', 'url'=>array('admin')),
);
?>

<h1>View KhachHang #<?php echo $model->ID_khach_hang; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_khach_hang',
		'Ten_dang_nhap',
		'Mat_khau',
		'Ho_va_ten',
		'Email',
		'Ngay_sinh',
		'Gioi_tinh',
		'Dia_chi',
		'Dien_thoai_ban',
		'Dien_thoai_di_dong',
		'Url_anh_dai_dien',
		'Ladoanhgnhiep',
	),
)); ?>
