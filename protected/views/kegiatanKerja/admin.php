<?php
$this->breadcrumbs=array(
	'Kegiatan Kerja'=>array('admin'),
	'Kelola',
);

$this->menu = array(
	array('label'=>'Kegiatan Kerja Rutin','url'=>array('admin'),'icon'=>'list'),
	array('label'=>'Tambah','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Export Word','url'=>array('kegiatanKerja/exportWord','tanggal_awal'=>Bantu::getTanggalAwal(),'tanggal_akhir'=>Bantu::getTanggalAkhir(),'user_id'=>Bantu::getUserId()),'icon'=>'download-alt'),
	array('label'=>'Export Excel','url'=>array('exportExcel','tanggal_awal'=>Bantu::getTanggalAwal(),'tanggal_akhir'=>Bantu::getTanggalAkhir(),'user_id'=>Bantu::getUserId()),'icon'=>'download-alt'),
);

?>

<h1>Kegiatan Kerja Rutin</h1>


<?php print CHtml::beginForm(); ?>


<?php print CHtml::label('Periode Tanggal',''); ?>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'tanggal_awal',
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
			'value'=>Bantu::getTanggalAwal()
)); ?>
 -
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'tanggal_akhir',
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
			'value'=>Bantu::getTanggalAkhir()
	)); ?>

<?php if(Yii::app()->user->isAdmin() OR Yii::app()->user->isBidang()) { ?>

<?php print CHtml::label('User',''); ?>
<?php print CHtml::dropDownList('user_id',Bantu::getUserId(),User::getList()); ?>

<?php } ?>

<br>

<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','icon'=>'search white','type'=>'primary','label'=>'Filter')); ?>

<?php print CHtml::endForm(); ?>



<div style="overflow:auto">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'kegiatan-kerja-grid',
		'type'=>'striped bordered',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			array(
				'class'=>'CDataColumn',
				'type'=>'raw',
				'name'=>'tanggal',
				'value'=>'Bantu::tanggalSingkat($data->tanggal)'
			),
			'kegiatan',
			'tempat',
			'waktu',
			'yang_menghadiri',
			array(
				'class'=>'CDataColumn',
				'type'=>'raw',
				'name'=>'user_id',
				'value'=>'$data->user->username',
				'filter'=>'',
			),
			
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{update}{delete}'
			),
		),
)); ?>

</div>
