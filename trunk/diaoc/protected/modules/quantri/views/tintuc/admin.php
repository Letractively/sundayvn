<?php
$this->breadcrumbs=array(
	'Tin Tucs'=>array('index'),
	'Manage',
);

//$this->menu=array(
//	array('label'=>'List TinTuc', 'url'=>array('index')),
//	array('label'=>'Create TinTuc', 'url'=>array('create')),
//);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tin-tuc-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Quản lý tin tức</h1>

<p>
Bạn có thể tùy chọn nhập vào biểu thức so sánh (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
hoặc <b>=</b>) vào đầu giá trị tìm kiếm của bạn để xác định cách thức so sánh.
</p>

<?php echo CHtml::link('Tìm kiếm nâng cao','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tin-tuc-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idTin_tuc',
        array(
            'header'=>'Danh mục',
            'value'=>'$data->idDanhmuc0->Ten_Danhmuc',
            'name'=>'idDanhmuc',
            'filter' => CHtml::listData(DanhMuc::model()->findAll(),'idDanhmuc','Ten_Danhmuc'),  
        ),
		'Tieu_de',
		'Hinh_anh',
		'Noi_dung_ngan',
		array(
            'name'=>'Ngay_dang',
            'header'=>'Ngày đăng',
            'value'=>'date("d/m/Y",$data->Ngay_dang)',
        ),
		/*
		'Ngay_dang',
		*/
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Xem',
                    'url'=>'Yii::app()->createUrl("quantri/tintuc/xem", array("id"=>$data->idTin_tuc))',
                ),
                'update' => array
                (
                    'label'=>'Cập nhật',
                    'url'=>'Yii::app()->createUrl("quantri/tintuc/capnhat", array("id"=>$data->idTin_tuc))',
                ),
                'delete' => array
                (
                    'label'=>'Xóa',
                    'url'=>'Yii::app()->createUrl("quantri/tintuc/xoa", array("id"=>$data->idTin_tuc))',
                ),
            ),
		),
	),
    'emptyText' => 'Không có danh mục nào!',
    'summaryText' => 'Hiển thị {start}-{end} của {count} kết quả',
)); ?>
