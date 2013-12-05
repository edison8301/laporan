<?php
$this->breadcrumbs=array(
	'Pelanggaran Lalin'=>array('admin'),
	'Kelola',
);

$this->menu = array(
	array('label'=>'Pelanggaran Lalu Lintas','url'=>array('admin'),'icon'=>'list'),
	array('label'=>'Tambah','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Export Word','url'=>array('exportWord','tanggal_awal'=>Bantu::getTanggalAwal(),'tanggal_akhir'=>Bantu::getTanggalAkhir()),'icon'=>'download-alt'),
	array('label'=>'Export Excel','url'=>array('exportExcel','tanggal_awal'=>Bantu::getTanggalAwal(),'tanggal_akhir'=>Bantu::getTanggalAkhir()),'icon'=>'download-alt'),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('pelanggaran-lalin-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Pelanggaran Lalu Lintas</h1>

<?php print CHtml::beginForm(); ?>

<?php print CHtml::label('Periode Tanggal Penindakan',''); ?>
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

<br>

<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','icon'=>'search white','type'=>'primary','label'=>'Filter')); ?>

<?php print CHtml::endForm(); ?>


<div style="overflow:auto">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'pelanggaran-lalin-grid',
		'type'=>'striped bordered',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			array(
				'class'=>'CDataColumn',
				'type'=>'raw',
				'name'=>'tanggal_penindakan',
				'value'=>'Bantu::tanggalSingkat($data->tanggal_penindakan)'
			),
			array(
				'class'=>'CDataColumn',
				'type'=>'raw',
				'name'=>'tanggal_sidang',
				'value'=>'Bantu::tanggalSingkat($data->tanggal_sidang)'
			),
			'nomor',
			'pelanggaran',
			'keterangan',
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{update}{delete}'
			),
		),
)); ?>

</div>
