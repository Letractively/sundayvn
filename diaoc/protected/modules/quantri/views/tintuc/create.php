<?php
$this->breadcrumbs=array(
	'Tin tức'=>array('index'),
	'Thêm',
);

//$this->menu=array(
//	array('label'=>'List TinTuc', 'url'=>array('index')),
//	array('label'=>'Manage TinTuc', 'url'=>array('quanly')),
//);
?>

<h1>Thêm tin tức</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'danhmuc'=>$danhmuc)); ?>