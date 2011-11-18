<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idDanhmuc'); ?>
		<?php echo $form->textField($model,'idDanhmuc',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ten_Danhmuc'); ?>
		<?php echo $form->textField($model,'Ten_Danhmuc',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Mieuta_Danhmuc'); ?>
		<?php echo $form->textArea($model,'Mieuta_Danhmuc',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Tìm'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->