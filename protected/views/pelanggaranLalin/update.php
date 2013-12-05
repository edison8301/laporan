<?php
$this->breadcrumbs=array(
	'Pelanggaran Lalin'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Sunting',
);


?>

<h1>Sunting Pelanggaran Lalu Lintas</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>