<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTin_tuc')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idTin_tuc), array('view', 'id'=>$data->idTin_tuc)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idDanhmuc')); ?>:</b>
	<?php echo CHtml::encode($data->idDanhmuc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tieu_de')); ?>:</b>
	<?php echo CHtml::encode($data->Tieu_de); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Hinh_anh')); ?>:</b>
	<?php echo CHtml::encode($data->Hinh_anh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Noi_dung_ngan')); ?>:</b>
	<?php echo CHtml::encode($data->Noi_dung_ngan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Noi_dung')); ?>:</b>
	<?php echo CHtml::encode($data->Noi_dung); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ngay_dang')); ?>:</b>
	<?php echo CHtml::encode($data->Ngay_dang); ?>
	<br />


</div>