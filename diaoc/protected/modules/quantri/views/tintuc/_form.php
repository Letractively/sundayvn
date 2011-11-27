<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tin-tuc-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idDanhmuc'); ?>
        <?php echo CHtml::activeDropDownList($model,'idDanhmuc',$danhmuc); ?>
		<?php echo $form->error($model,'idDanhmuc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Hinh_anh'); ?>
        <?php echo CHtml::activeFileField($model, 'Hinh_anh'); ?>
		<?php echo $form->error($model,'Hinh_anh'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'Ngay_dang'); ?>
		<?php echo $form->textField($model,'Ngay_dang'); ?>
		<?php echo $form->error($model,'Ngay_dang'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->