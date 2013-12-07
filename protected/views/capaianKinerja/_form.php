<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'capaian-kinerja-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Kolom dengan <span class="required">*</span> harus diisi.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'urutan',array('class'=>'span1','maxlength'=>255)); ?>
	
	<?php echo $form->textFieldRow($model,'kode',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'program',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'kegiatan',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'jenis_indikator',array('class'=>'span2','maxlength'=>255)); ?>
	
	<?php echo $form->textFieldRow($model,'indikator',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'target',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'realisasi',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'keterangan',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'tahun',array('class'=>'span1')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'ok white',
			'label'=>'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
