<?php
$this->breadcrumbs=array(
	'Danh mục',
);

//$this->menu=array(
//	array('label'=>'Create DanhMuc', 'url'=>array('create')),
//	array('label'=>'Manage DanhMuc', 'url'=>array('admin')),
//);
?>

<h1>Danh mục</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'emptyText' => 'Không có danh mục nào!',
    'summaryText' => 'Hiển thị {start}-{end} của {count} kết quả',
)); ?>
