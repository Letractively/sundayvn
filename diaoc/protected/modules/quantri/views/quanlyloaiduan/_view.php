<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idLoai_du_an')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idLoai_du_an), array('view', 'id'=>$data->idLoai_du_an)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ten_du_an')); ?>:</b>
	<?php echo CHtml::encode($data->ten_du_an); ?>
	<br />


</div>