<?php
$this->breadcrumbs=array(
	'Tin Tucs'=>array('index'),
	$model->idTin_tuc,
);

$this->menu=array(
	//array('label'=>'List TinTuc', 'url'=>array('index')),
//	array('label'=>'Create TinTuc', 'url'=>array('create')),
	array('label'=>'Cập nhật', 'url'=>array('capnhat', 'id'=>$model->idTin_tuc)),
	array('label'=>'Xóa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('xoa','id'=>$model->idTin_tuc),'confirm'=>'Bạn có chắc là muốn xóa Tin tức #'.$model->idTin_tuc.'?')),
	//array('label'=>'Manage TinTuc', 'url'=>array('admin')),
);
?>

<h1>Tin tức #<?php echo $model->idTin_tuc; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idTin_tuc',
		array(
            'header'=>'Danh mục',
            'value'=>DanhMuc::model()->findByPk($model->idDanhmuc)->Ten_Danhmuc,
            'name'=>'idDanhmuc',                 
        ),
		'Tieu_de',
		'Hinh_anh',
		'Noi_dung_ngan',
		'Noi_dung',
		'Ngay_dang',
	),
)); ?>
