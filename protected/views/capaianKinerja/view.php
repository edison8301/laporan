<?php
$this->breadcrumbs=array(
	'Capaian Kinerjas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Tambah CapaianKinerja','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Sunting CapaianKinerja','url'=>array('update','id'=>$model->id),'icon'=>'pencil'),
	array('label'=>'Hapus CapaianKinerja','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola CapaianKinerja','url'=>array('admin'),'icon'=>'th-list'),
);
?>

<h1>Lihat CapaianKinerja</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
		'data'=>$model,
		'type'=>'striped bordered',
		'attributes'=>array(
		'id',
		'kode',
		'program',
		'kegiatan',
		'indikator',
		'target',
		'realisasi',
		'keterangan',
		'user_id',
),
)); ?>
