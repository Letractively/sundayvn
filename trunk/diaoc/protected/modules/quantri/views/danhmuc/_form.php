<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'danh-muc-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Ten_Danhmuc'); ?>
		<?php echo $form->textField($model,'Ten_Danhmuc',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Ten_Danhmuc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mieuta_Danhmuc'); ?>
		<?php echo $form->textArea($model,'Mieuta_Danhmuc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Mieuta_Danhmuc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm' : 'Cập nhật'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->