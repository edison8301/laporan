<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pagu_anggaran')); ?>:</b>
	<?php echo CHtml::encode($data->pagu_anggaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pagu_kontrak')); ?>:</b>
	<?php echo CHtml::encode($data->pagu_kontrak); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pelaksana_kontrak')); ?>:</b>
	<?php echo CHtml::encode($data->pelaksana_kontrak); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lokasi_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->lokasi_kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_pelaksanaan')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_pelaksanaan); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_anggaran')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_anggaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('output_fisik')); ?>:</b>
	<?php echo CHtml::encode($data->output_fisik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('output_nonfisik')); ?>:</b>
	<?php echo CHtml::encode($data->output_nonfisik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('capaian')); ?>:</b>
	<?php echo CHtml::encode($data->capaian); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun')); ?>:</b>
	<?php echo CHtml::encode($data->tahun); ?>
	<br />

	*/ ?>

</div>