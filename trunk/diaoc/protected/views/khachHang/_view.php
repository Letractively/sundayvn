<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_khach_hang')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_khach_hang), array('view', 'id'=>$data->ID_khach_hang)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ten_dang_nhap')); ?>:</b>
	<?php echo CHtml::encode($data->Ten_dang_nhap); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Mat_khau')); ?>:</b>
	<?php echo CHtml::encode($data->Mat_khau); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ho_va_ten')); ?>:</b>
	<?php echo CHtml::encode($data->Ho_va_ten); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ngay_sinh')); ?>:</b>
	<?php echo CHtml::encode($data->Ngay_sinh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Gioi_tinh')); ?>:</b>
	<?php echo CHtml::encode($data->Gioi_tinh); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Dia_chi')); ?>:</b>
	<?php echo CHtml::encode($data->Dia_chi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Dien_thoai_ban')); ?>:</b>
	<?php echo CHtml::encode($data->Dien_thoai_ban); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Dien_thoai_di_dong')); ?>:</b>
	<?php echo CHtml::encode($data->Dien_thoai_di_dong); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Url_anh_dai_dien')); ?>:</b>
	<?php echo CHtml::encode($data->Url_anh_dai_dien); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ladoanhgnhiep')); ?>:</b>
	<?php echo CHtml::encode($data->Ladoanhgnhiep); ?>
	<br />

	*/ ?>

</div>