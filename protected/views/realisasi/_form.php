<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'realisasi-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Kolom dengan <span class="required">*</span> harus diisi.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'kegiatan',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'pagu_anggaran',array('class'=>'span5','maxlength'=>20,'prepend'=>'Rp')); ?>

	<?php echo $form->textFieldRow($model,'pagu_kontrak',array('class'=>'span5','maxlength'=>20,'prepend'=>'Rp')); ?>

	<?php echo $form->textFieldRow($model,'pelaksana_kontrak',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'lokasi_kegiatan',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->labelEx($model,'waktu_pelaksanaan'); ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'Realisasi[waktu_pelaksanaan]',
			// additional javascript options for the date picker plugin
			'options'=>array(
				'showAnim'=>'fold',
				'dateFormat'=>'yy-mm-dd',
				'changeYear'=>true,
				'changeMonth'=>true
			),
			'htmlOptions'=>array(
				'style'=>'height:20px;'
			),
			'value'=>$model->waktu_pelaksanaan
	)); ?>
	<?php print $form->error($model,'waktu_pelaksanaan'); ?>
	
	<?php echo $form->textFieldRow($model,'realisasi_anggaran',array('class'=>'span5','maxlength'=>20,'prepend'=>'Rp')); ?>

	<?php echo $form->textFieldRow($model,'output_fisik',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'output_nonfisik',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'capaian',array('class'=>'span5','maxlength'=>5,'append'=>'%')); ?>

	<?php echo $form->textFieldRow($model,'keterangan',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'tahun',array('class'=>'span1','maxlength'=>4)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'ok white',
			'label'=>'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
