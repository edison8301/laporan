<?php
$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'User','url'=>array('admin'),'icon'=>'list'),
	array('label'=>'Tambah','url'=>array('create'),'icon'=>'plus'),
);
?>

<h1>Tambah User</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>