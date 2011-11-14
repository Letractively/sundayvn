<?php
$this->breadcrumbs=array(
	'Khachhang Canhans'=>array('index'),
	$model->idKhachhang_canhan=>array('view','id'=>$model->idKhachhang_canhan),
	'Update',
);

$this->menu=array(
	array('label'=>'List KhachhangCanhan', 'url'=>array('index')),
	array('label'=>'Create KhachhangCanhan', 'url'=>array('create')),
	array('label'=>'View KhachhangCanhan', 'url'=>array('view', 'id'=>$model->idKhachhang_canhan)),
	array('label'=>'Manage KhachhangCanhan', 'url'=>array('admin')),
);
?>

<h1>Update KhachhangCanhan <?php echo $model->idKhachhang_canhan; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>