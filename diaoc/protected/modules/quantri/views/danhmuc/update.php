<?php
$this->breadcrumbs=array(
	'Danh mục'=>array('index'),
	$model->idDanhmuc=>array('view','id'=>$model->idDanhmuc),
	'Cập nhật',
);

//$this->menu=array(
//	array('label'=>'List DanhMuc', 'url'=>array('index')),
//	array('label'=>'Create DanhMuc', 'url'=>array('create')),
//	array('label'=>'View DanhMuc', 'url'=>array('view', 'id'=>$model->idDanhmuc)),
//	array('label'=>'Manage DanhMuc', 'url'=>array('admin')),
//);
?>

<h1>Cập nhật Danh mục #<?php echo $model->idDanhmuc; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>