<?php
$this->breadcrumbs=array(
	'Quanlyloaiduans',
);

$this->menu=array(
	array('label'=>'Danh sách danh mục dự án', 'url'=>array('tao')),
	array('label'=>'Quản lý danh mục dự án', 'url'=>array('quanly')),
);
?>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
