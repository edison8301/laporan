<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'tanggal_penindakan',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'tanggal_sidang',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'nomor',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'pelanggaran',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'keterangan',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'icon'=>'search white',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
