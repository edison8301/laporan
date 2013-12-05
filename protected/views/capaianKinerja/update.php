<?php
$this->breadcrumbs=array(
	'Capaian Kinerja'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Sunting',
);


?>

<h1>Sunting Capaian Kinerja</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>