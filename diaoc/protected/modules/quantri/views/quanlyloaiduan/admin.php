<?php
$this->breadcrumbs=array(
	'Quanlyloaiduans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Quanlyloaiduan', 'url'=>array('quanly')),
	array('label'=>'Create Quanlyloaiduan', 'url'=>array('tao')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('quanlyloaiduan-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<!-- search-form -->

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
	'id'=>'danh-muc-du-an-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idLoai_du_an',
		'ten_du_an',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Xem',
                    'url'=>'Yii::app()->createUrl("quantri/quanlyloaiduan/xem", array("id"=>$data->idLoai_du_an))',
                ),
                'update' => array
                (
                    'label'=>'Cập nhật',
                    'url'=>'Yii::app()->createUrl("quantri/quanlyloaiduan/capnhat", array("id"=>$data->idLoai_du_an))',
                ),
                'delete' => array
                (
                    'label'=>'Xóa',
                    'url'=>'Yii::app()->createUrl("quantri/quanlyloaiduan/xoa", array("id"=>$data->idLoai_du_an))',
                ),
            ),
		),
	),
    'emptyText' => 'Không có danh mục nào!',
    'summaryText' => 'Hiển thị {start}-{end} của {count} kết quả',
)); ?>

