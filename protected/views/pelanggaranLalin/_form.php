<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pelanggaran-lalin-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Kolom dengan <span class="required">*</span> harus diisi.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->labelEx($model,'tanggal_penindakan'); ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'PelanggaranLalin[tanggal_penindakan]',
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
			'value'=>$model->tanggal_penindakan
	)); ?>
	<?php print $form->error($model,'tanggal_penindakan'); ?>
	
	<?php echo $form->labelEx($model,'tanggal_sidang'); ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'PelanggaranLalin[tanggal_sidang]',
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
			'value'=>$model->tanggal_sidang
	)); ?>
	<?php print $form->error($model,'tanggal_sidang'); ?>

	<?php echo $form->textFieldRow($model,'nomor',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'pelanggaran',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'keterangan',array('class'=>'span5','maxlength'=>255)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'ok white',
			'label'=>'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
