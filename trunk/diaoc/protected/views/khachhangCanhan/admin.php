<?php
$this->breadcrumbs=array(
	'Khachhang Canhans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List KhachhangCanhan', 'url'=>array('index')),
	array('label'=>'Create KhachhangCanhan', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('khachhang-canhan-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Khachhang Canhans</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'khachhang-canhan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idKhachhang_canhan',
		'Ten_dang_nhap',
		'Mat_khau',
		'Ho_va_ten',
		'Email',
		'Ngay_sinh',
		/*
		'Gioi_tinh',
		'Ten_cong_ty',
		'Dia_chi',
		'Dien_thoai_ban',
		'Dien_thoai_di_dong',
		'Url_anh_dai_dien',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
