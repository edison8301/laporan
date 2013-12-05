<?php
$this->breadcrumbs=array(
	'Capaian Kinerjas',
);

$this->menu=array(
	array('label'=>'Tambah CapaianKinerja','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Kelola CapaianKinerja','url'=>array('admin'),'icon'=>'th-list'),
);
?>

<h1>Capaian Kinerjas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
