<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'kegiatan-kerja-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Kolom dengan <span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->labelEx($model,'tanggal'); ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'KegiatanKerja[tanggal]',
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
			'value'=>$model->tanggal
	)); ?>
	<?php print $form->error($model,'tanggal'); ?>
	
	<?php echo $form->textFieldRow($model,'kegiatan',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'tempat',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'waktu',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'yang_menghadiri',array('class'=>'span5','maxlength'=>255)); ?>

	

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'ok white',
			'label'=>'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
