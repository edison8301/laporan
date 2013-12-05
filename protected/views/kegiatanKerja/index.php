<?php
$this->breadcrumbs=array(
	'Kegiatan Kerjas',
);

$this->menu=array(
	array('label'=>'Tambah KegiatanKerja','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Kelola KegiatanKerja','url'=>array('admin'),'icon'=>'th-list'),
);
?>

<h1>Kegiatan Kerjas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
