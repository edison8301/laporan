<?php
$this->breadcrumbs=array(
	'User'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Sunting',
);

?>

<h1>Sunting User</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>