<?php
$this->breadcrumbs=array(
	'Realisasis',
);

$this->menu=array(
	array('label'=>'Tambah Realisasi','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Kelola Realisasi','url'=>array('admin'),'icon'=>'th-list'),
);
?>

<h1>Realisasis</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
