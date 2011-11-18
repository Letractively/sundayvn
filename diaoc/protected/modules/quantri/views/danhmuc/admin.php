<?php
$this->breadcrumbs=array(
	'Danh mục'=>array('index'),
	'Quản lý',
);

//$this->menu=array(
//	array('label'=>'List DanhMuc', 'url'=>array('index')),
//	array('label'=>'Create DanhMuc', 'url'=>array('create')),
//);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('danh-muc-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Quản lý danh mục</h1>

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
	'id'=>'danh-muc-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idDanhmuc',
		'Ten_Danhmuc',
		'Mieuta_Danhmuc',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Xem',
                    'url'=>'Yii::app()->createUrl("quantri/danhmuc/xem", array("id"=>$data->idDanhmuc))',
                ),
                'update' => array
                (
                    'label'=>'Cập nhật',
                    'url'=>'Yii::app()->createUrl("quantri/danhmuc/capnhat", array("id"=>$data->idDanhmuc))',
                ),
                'delete' => array
                (
                    'label'=>'Xóa',
                    'url'=>'Yii::app()->createUrl("quantri/danhmuc/xoa", array("id"=>$data->idDanhmuc))',
                ),
            ),
		),
	),
    'emptyText' => 'Không có danh mục nào!',
    'summaryText' => 'Hiển thị {start}-{end} của {count} kết quả',
)); ?>
