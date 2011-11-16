<?php
$this->breadcrumbs=array(
	'Khach Hangs'=>array('index'),
	$model->ID_khach_hang=>array('view','id'=>$model->ID_khach_hang),
	'Update',
);

$this->menu=array(
	array('label'=>'List KhachHang', 'url'=>array('index')),
	array('label'=>'Create KhachHang', 'url'=>array('create')),
	array('label'=>'View KhachHang', 'url'=>array('view', 'id'=>$model->ID_khach_hang)),
	array('label'=>'Manage KhachHang', 'url'=>array('admin')),
);
?>

<h1>Update KhachHang <?php echo $model->ID_khach_hang; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>