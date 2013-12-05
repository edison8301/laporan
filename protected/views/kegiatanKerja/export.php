<?php
$this->breadcrumbs=array(
	'Kegiatan Kerjas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Tambah KegiatanKerja','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Sunting KegiatanKerja','url'=>array('update','id'=>$model->id),'icon'=>'pencil'),
	array('label'=>'Hapus KegiatanKerja','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola KegiatanKerja','url'=>array('admin'),'icon'=>'th-list'),
);
?>

<h1>Lihat KegiatanKerja</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
		'data'=>$model,
		'type'=>'striped bordered',
		'attributes'=>array(
		'id',
		'tanggal',
		'kegiatan',
		'tempat',
		'waktu',
		'yang_menghadiri',
		'user_id',
),
)); ?>
