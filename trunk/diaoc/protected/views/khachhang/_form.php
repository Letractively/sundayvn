<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'khach-hang-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Ten_dang_nhap'); ?>
		<?php echo $form->textField($model,'Ten_dang_nhap',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Ten_dang_nhap'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mat_khau'); ?>
		<?php echo $form->textField($model,'Mat_khau',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Mat_khau'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Ho_va_ten'); ?>
		<?php echo $form->textField($model,'Ho_va_ten',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'Ho_va_ten'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Ngay_sinh'); ?>
		<?php echo $form->textField($model,'Ngay_sinh'); ?>
		<?php echo $form->error($model,'Ngay_sinh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Gioi_tinh'); ?>
		<?php echo $form->textField($model,'Gioi_tinh',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Gioi_tinh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Dia_chi'); ?>
		<?php echo $form->textField($model,'Dia_chi',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Dia_chi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Dien_thoai_ban'); ?>
		<?php echo $form->textField($model,'Dien_thoai_ban',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'Dien_thoai_ban'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Dien_thoai_di_dong'); ?>
		<?php echo $form->textField($model,'Dien_thoai_di_dong',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'Dien_thoai_di_dong'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Url_anh_dai_dien'); ?>
		<?php echo $form->textField($model,'Url_anh_dai_dien',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Url_anh_dai_dien'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Ladoanhgnhiep'); ?>
		<?php echo $form->textField($model,'Ladoanhgnhiep',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Ladoanhgnhiep'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->