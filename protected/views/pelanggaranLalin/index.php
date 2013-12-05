<?php
$this->breadcrumbs=array(
	'Pelanggaran Lalins',
);

$this->menu=array(
	array('label'=>'Tambah PelanggaranLalin','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Kelola PelanggaranLalin','url'=>array('admin'),'icon'=>'th-list'),
);
?>

<h1>Pelanggaran Lalins</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
