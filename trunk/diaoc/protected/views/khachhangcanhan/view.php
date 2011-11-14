<?php
$this->breadcrumbs=array(
	'Khachhang Canhans'=>array('index'),
	$model->idKhachhang_canhan,
);

$this->menu=array(
	array('label'=>'List KhachhangCanhan', 'url'=>array('index')),
	array('label'=>'Create KhachhangCanhan', 'url'=>array('create')),
	array('label'=>'Update KhachhangCanhan', 'url'=>array('update', 'id'=>$model->idKhachhang_canhan)),
	array('label'=>'Delete KhachhangCanhan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idKhachhang_canhan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KhachhangCanhan', 'url'=>array('admin')),
);
?>

<h1>View KhachhangCanhan #<?php echo $model->idKhachhang_canhan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idKhachhang_canhan',
		'Ten_dang_nhap',
		'Mat_khau',
		'Ho_va_ten',
		'Email',
		'Ngay_sinh',
		'Gioi_tinh',
		'Ten_cong_ty',
		'Dia_chi',
		'Dien_thoai_ban',
		'Dien_thoai_di_dong',
		'Url_anh_dai_dien',
	),
)); ?>
