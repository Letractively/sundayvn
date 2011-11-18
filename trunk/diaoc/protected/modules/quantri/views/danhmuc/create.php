<?php
$this->breadcrumbs=array(
	'Danh mục'=>array('index'),
	'Thêm',
);

//$this->menu=array(
//	array('label'=>'List DanhMuc', 'url'=>array('index')),
//	array('label'=>'Manage DanhMuc', 'url'=>array('admin')),
//);
?>

<h1>Thêm danh mục</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>