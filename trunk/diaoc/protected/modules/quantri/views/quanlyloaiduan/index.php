<?php
$this->breadcrumbs=array(
	'Quanlyloaiduans',
);

$this->menu=array(
	array('label'=>'Create Quanlyloaiduan', 'url'=>array('tao')),
	array('label'=>'Manage Quanlyloaiduan', 'url'=>array('quanly')),
);
?>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
