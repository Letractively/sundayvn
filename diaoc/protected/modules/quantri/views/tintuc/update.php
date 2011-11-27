<?php
$this->breadcrumbs=array(
	'Tin Tucs'=>array('index'),
	$model->idTin_tuc=>array('view','id'=>$model->idTin_tuc),
	'Update',
);

$this->menu=array(
	array('label'=>'List TinTuc', 'url'=>array('index')),
	array('label'=>'Create TinTuc', 'url'=>array('create')),
	array('label'=>'View TinTuc', 'url'=>array('view', 'id'=>$model->idTin_tuc)),
	array('label'=>'Manage TinTuc', 'url'=>array('admin')),
);
?>

<h1>Update TinTuc <?php echo $model->idTin_tuc; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>