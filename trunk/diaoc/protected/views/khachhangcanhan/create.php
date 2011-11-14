<?php
$this->breadcrumbs=array(
	'Khachhang Canhans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KhachhangCanhan', 'url'=>array('index')),
	array('label'=>'Manage KhachhangCanhan', 'url'=>array('admin')),
);
?>

<h1>Create KhachhangCanhan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>