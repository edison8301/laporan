<?php
$this->breadcrumbs=array(
	'Realisasi'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Sunting',
);


?>

<h1>Sunting Realisasi</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>