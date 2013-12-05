<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'kode',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'program',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'kegiatan',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'indikator',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'target',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'realisasi',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'keterangan',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'icon'=>'search white',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
