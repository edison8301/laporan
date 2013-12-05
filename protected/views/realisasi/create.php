<?php
$this->breadcrumbs=array(
	'Realisasi'=>array('admin'),
	'Tambah',
);


?>

<h1>Tambah Realisasi</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>