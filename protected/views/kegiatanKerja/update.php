<?php
$this->breadcrumbs=array(
	'Kegiatan Kerja'=>array('admin'),
	'Sunting',
);


?>

<h1>Sunting Kegiatan Kerja</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>