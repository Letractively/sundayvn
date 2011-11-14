<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idKhachhang_canhan'); ?>
		<?php echo $form->textField($model,'idKhachhang_canhan',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ten_dang_nhap'); ?>
		<?php echo $form->textField($model,'Ten_dang_nhap',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Mat_khau'); ?>
		<?php echo $form->textField($model,'Mat_khau',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ho_va_ten'); ?>
		<?php echo $form->textField($model,'Ho_va_ten',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ngay_sinh'); ?>
		<?php echo $form->textField($model,'Ngay_sinh'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Gioi_tinh'); ?>
		<?php echo $form->textField($model,'Gioi_tinh',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ten_cong_ty'); ?>
		<?php echo $form->textField($model,'Ten_cong_ty',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Dia_chi'); ?>
		<?php echo $form->textField($model,'Dia_chi',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Dien_thoai_ban'); ?>
		<?php echo $form->textField($model,'Dien_thoai_ban',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Dien_thoai_di_dong'); ?>
		<?php echo $form->textField($model,'Dien_thoai_di_dong',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Url_anh_dai_dien'); ?>
		<?php echo $form->textField($model,'Url_anh_dai_dien',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->