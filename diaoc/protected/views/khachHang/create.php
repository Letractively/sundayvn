<?php
$this->breadcrumbs=array(
	'Khach Hangs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KhachHang', 'url'=>array('index')),
	array('label'=>'Manage KhachHang', 'url'=>array('admin')),
);
?>

<h1>Create KhachHang</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>