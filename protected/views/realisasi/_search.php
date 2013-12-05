<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'kegiatan',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'pagu_anggaran',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'pagu_kontrak',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'pelaksana_kontrak',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'lokasi_kegiatan',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'waktu_pelaksanaan',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'realisasi_anggaran',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'output_fisik',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'output_nonfisik',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'capaian',array('class'=>'span5','maxlength'=>3)); ?>

		<?php echo $form->textFieldRow($model,'keterangan',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'tahun',array('class'=>'span5','maxlength'=>4)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'icon'=>'search white',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
