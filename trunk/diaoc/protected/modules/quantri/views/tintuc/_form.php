<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tin-tuc-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>
    

	<div class="row">
		<?php echo $form->labelEx($model,'idDanhmuc'); ?>
		<?php echo CHtml::activeDropDownList($model,'idDanhmuc',CHtml::listData(DanhMuc::model()->findAll(),'idDanhmuc','Ten_Danhmuc')); ?>
		<?php echo $form->error($model,'idDanhmuc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Tieu_de'); ?>
		<?php echo $form->textArea($model,'Tieu_de',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Tieu_de'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Hinh_anh'); ?>
		<?php echo CHtml::activeFileField($model,'hinhanh'); ?> 
		<?php echo $form->error($model,'hinhanh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Noi_dung_ngan'); ?>
		<?php echo $form->textArea($model,'Noi_dung_ngan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Noi_dung_ngan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Noi_dung'); ?>
		<?php echo $form->textArea($model,'Noi_dung',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Noi_dung'); ?>
	</div> 

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->