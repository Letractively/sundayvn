<?php
$this->breadcrumbs=array(
	'Tin Tucs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TinTuc', 'url'=>array('index')),
	array('label'=>'Manage TinTuc', 'url'=>array('admin')),
);
?>

<h1>Create TinTuc</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'danhmuc'=>$danhmuc)); ?>