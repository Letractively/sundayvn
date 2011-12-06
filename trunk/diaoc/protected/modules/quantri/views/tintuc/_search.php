<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idTin_tuc'); ?>
		<?php echo $form->textField($model,'idTin_tuc',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idDanhmuc'); ?>
		<?php echo $form->textField($model,'idDanhmuc',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tieu_de'); ?>
		<?php echo $form->textArea($model,'Tieu_de',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Hinh_anh'); ?>
		<?php echo $form->textField($model,'Hinh_anh',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Noi_dung_ngan'); ?>
		<?php echo $form->textArea($model,'Noi_dung_ngan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Noi_dung'); ?>
		<?php echo $form->textArea($model,'Noi_dung',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ngay_dang'); ?>
		<?php echo $form->textField($model,'Ngay_dang'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->