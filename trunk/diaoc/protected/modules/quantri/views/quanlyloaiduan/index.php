<?php
$this->breadcrumbs=array(
	'Quanlyloaiduans',
);

$this->menu=array(
	array('label'=>'Create Quanlyloaiduan', 'url'=>array('create')),
	array('label'=>'Manage Quanlyloaiduan', 'url'=>array('admin')),
);
?>

<h1>Quanlyloaiduans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
