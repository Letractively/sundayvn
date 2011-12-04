<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'quanlyloaiduan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ten_du_an'); ?>
		<?php echo $form->textField($model,'ten_du_an',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'ten_du_an'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->