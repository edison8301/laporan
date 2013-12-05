<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_penindakan')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_penindakan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_sidang')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_sidang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor')); ?>:</b>
	<?php echo CHtml::encode($data->nomor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pelanggaran')); ?>:</b>
	<?php echo CHtml::encode($data->pelanggaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />


</div>