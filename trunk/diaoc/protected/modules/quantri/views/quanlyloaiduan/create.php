<?php
$this->breadcrumbs=array(
	'Quanlyloaiduans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Quanlyloaiduan', 'url'=>array('index')),
	array('label'=>'Manage Quanlyloaiduan', 'url'=>array('admin')),
);
?>

<h1>Create Quanlyloaiduan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>