<?php
$this->breadcrumbs=array(
	'Realisasi'=>array('admin'),
	'Kelola',
);

$this->menu = array(
	array('label'=>'Realisasi','url'=>array('admin'),'icon'=>'list'),
	array('label'=>'Tambah','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Export Word','url'=>array('exportWord','tahun'=>Bantu::getTahun()),'icon'=>'download-alt'),
	array('label'=>'Export Excel','url'=>array('exportExcel','tahun'=>Bantu::getTahun()),'icon'=>'download-alt'),
);

?>

<h1>Realisasi</h1>

<?php print CHtml::beginForm(); ?>

<?php print CHtml::label('Tahun',''); ?>
<?php print CHtml::textField('tahun',Bantu::getTahun()); ?>
<br>
<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','label'=>'Filter','icon'=>'search white','type'=>'primary')); ?>


<?php print CHtml::endForm(); ?>

<div style="overflow:auto">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'realisasi-grid',
		'type'=>'striped bordered',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(	
			'kegiatan',
			array(
				'class'=>'CDataColumn',
				'type'=>'raw',
				'header'=>'Pagu Anggaran',
				'name'=>'pagu_anggaran',
				'value'=>'Bantu::rp($data->pagu_anggaran)'
			),
			array(
				'class'=>'CDataColumn',
				'type'=>'raw',
				'header'=>'Pagu Kontrak',
				'name'=>'pagu_kontrak',
				'value'=>'Bantu::rp($data->pagu_kontrak)'
			),
			'pelaksana_kontrak',
			'lokasi_kegiatan',
			array(
				'class'=>'CDataColumn',
				'type'=>'raw',
				'header'=>'Waktu Pelaksanaan',
				'name'=>'waktu_pelaksanaan',
				'value'=>'Bantu::tanggalSingkat($data->waktu_pelaksanaan)'
			),
			array(
				'class'=>'CDataColumn',
				'type'=>'raw',
				'header'=>'Realisasi Anggaran',
				'name'=>'realisasi_anggaran',
				'value'=>'Bantu::rp($data->realisasi_anggaran)'
			),
			'output_fisik',
			'output_nonfisik',
			array(
				'class'=>'CDataColumn',
				'type'=>'raw',
				'header'=>'Capaian (%)',
				'name'=>'capaian',
				'value'=>'$data->capaian'
			),
			'keterangan',
			'tahun',
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{update}{delete}'
			),
		),
)); ?>

</div>
