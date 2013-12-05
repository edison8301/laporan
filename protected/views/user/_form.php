<?php

Yii::app()->clientScript->registerScript('pilih_bidang',"
	
	$(document).ready(function() {
		
		var bantu = $('#User_role_id').val();
		
		if(bantu==3) {
			$('#parent_id').show();
		} else if(bantu==4) {
			$('#parent_id').show();
		} else if(bantu==5) {
			$('#parent_id').show();
		} else {
			$('#parent_id').hide();
		}
		
	});
	
	$('#User_role_id').change(function() {
		
		var bantu = $('#User_role_id').val();
		
		if(bantu==3) {
			$('#parent_id').show('slow');
		} else if(bantu==4) {
			$('#parent_id').show('slow');
		} else if(bantu==5) {
			$('#parent_id').show('slow');
		} else {
			$('#parent_id').hide('slow');
		}
	
	});

");

?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>255)); ?>
	
	<?php if(Yii::app()->controller->action->id == 'create') { ?>
	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>255)); ?>
	<?php } ?>
	
	<?php echo $form->dropDownListRow($model,'role_id',CHTml::listData(Role::model()->findAll(),'id','name')); ?>

	<div id="parent_id" class="hide">
	<?php echo $form->dropDownListRow($model,'parent_id',CHTml::listData(User::model()->findAllByAttributes(array('role_id'=>2)),'id','username'),array('label'=>'Atasan Bidang')); ?>
	</div>
	
	<?php echo $form->dropDownListRow($model,'status',array('1'=>'Aktif','2'=>'Tidak Aktif')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'ok white',
			'label'=>'Simpan',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
