<?php
$this->breadcrumbs=array(
	'Pelanggaran Lalins'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Tambah PelanggaranLalin','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Sunting PelanggaranLalin','url'=>array('update','id'=>$model->id),'icon'=>'pencil'),
	array('label'=>'Hapus PelanggaranLalin','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola PelanggaranLalin','url'=>array('admin'),'icon'=>'th-list'),
);
?>

<h1>Lihat PelanggaranLalin</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
		'data'=>$model,
		'type'=>'striped bordered',
		'attributes'=>array(
		'id',
		'tanggal_penindakan',
		'tanggal_sidang',
		'nomor',
		'pelanggaran',
		'keterangan',
),
)); ?>
