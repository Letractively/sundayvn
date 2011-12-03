<?php
$this->breadcrumbs=array(
	'Quanlyloaiduans'=>array('index'),
	$model->idLoai_du_an=>array('view','id'=>$model->idLoai_du_an),
	'Update',
);

$this->menu=array(
	array('label'=>'List Quanlyloaiduan', 'url'=>array('index')),
	array('label'=>'Create Quanlyloaiduan', 'url'=>array('create')),
	array('label'=>'View Quanlyloaiduan', 'url'=>array('view', 'id'=>$model->idLoai_du_an)),
	array('label'=>'Manage Quanlyloaiduan', 'url'=>array('admin')),
);
?>

<h1>Update Quanlyloaiduan <?php echo $model->idLoai_du_an; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>