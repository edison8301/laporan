<?php
$this->breadcrumbs=array(
	'Realisasis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Tambah Realisasi','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Sunting Realisasi','url'=>array('update','id'=>$model->id),'icon'=>'pencil'),
	array('label'=>'Hapus Realisasi','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Realisasi','url'=>array('admin'),'icon'=>'th-list'),
);
?>

<h1>Lihat Realisasi</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
		'data'=>$model,
		'type'=>'striped bordered',
		'attributes'=>array(
		'id',
		'kegiatan',
		'pagu_anggaran',
		'pagu_kontrak',
		'pelaksana_kontrak',
		'lokasi_kegiatan',
		'waktu_pelaksanaan',
		'realisasi_anggaran',
		'output_fisik',
		'output_nonfisik',
		'capaian',
		'keterangan',
		'tahun',
),
)); ?>
