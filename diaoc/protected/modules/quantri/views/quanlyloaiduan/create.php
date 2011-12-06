<?php
$this->breadcrumbs=array(
	'Quanlyloaiduans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Danh sách danh mục dự án', 'url'=>array('index')),
	array('label'=>'Quản lý danh mục dự án', 'url'=>array('quanly')),
);
?>

<h1>Tạo mới danh mục dự án</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>