<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idDanhmuc')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idDanhmuc), array('xem', 'id'=>$data->idDanhmuc)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ten_Danhmuc')); ?>:</b>
	<?php echo CHtml::encode($data->Ten_Danhmuc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Mieuta_Danhmuc')); ?>:</b>
	<?php echo CHtml::encode($data->Mieuta_Danhmuc); ?>
	<br />


</div>