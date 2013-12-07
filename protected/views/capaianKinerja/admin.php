<?php
$this->breadcrumbs=array(
	'Capaian Kinerja'=>array('admin'),
	'Kelola',
);

$this->menu = array(
	array('label'=>'Capaian Kinerja','url'=>array('admin'),'icon'=>'list'),
	array('label'=>'Tambah','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Export Word','url'=>array('exportWord','tahun'=>Bantu::getTahun(),'user_id'=>Bantu::getUserId()),'icon'=>'download-alt'),
	array('label'=>'Export Excel','url'=>array('exportExcel','tahun'=>Bantu::getTahun(),'user_id'=>Bantu::getUserId()),'icon'=>'download-alt'),
);

?>

<h1>Capaian Kinerja Tahun <?php print Bantu::getTahun(); ?></h1>

<?php print CHtml::beginForm(); ?>


<?php print CHtml::label('Tahun',''); ?>
<?php print CHTml::textField('tahun',Bantu::getTahun()); ?>

<?php if(Yii::app()->user->isAdmin()) { ?>

<?php print CHtml::label('User',''); ?>
<?php print CHtml::dropDownList('user_id',$_POST['user_id'],CHtml::listData(User::model()->findAll(),'id','username')); ?>

<?php } ?>

<br>

<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','icon'=>'search white','type'=>'primary','label'=>'Filter')); ?>

<?php print CHtml::endForm(); ?>


<div style="overflow:auto">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'capaian-kinerja-grid',
		'type'=>'striped bordered',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			'urutan',
			'kode',
			'program',
			'kegiatan',
			'jenis_indikator',
			'indikator',
			'target',
			'realisasi',
			'keterangan',
			'tahun',
			array(
				'class'=>'CDataColumn',
				'type'=>'raw',
				'name'=>'user_id',
				'value'=>'$data->user->username',
				'filter'=>'',
			),
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{update}{delete}'
			),
		),
)); ?>

</div>
