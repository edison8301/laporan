<?php
$this->breadcrumbs=array(
	'Kegiatan Kerja'=>array('admin'),
	'Tambah',
);


?>

<h1>Tambah Kegiatan Kerja</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>