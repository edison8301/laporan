<?php
$this->breadcrumbs=array(
	'Role'=>array('admin'),
	'Kelola',
);

$this->menu=array(
	//array('label'=>'List Role','url'=>array('index')),
	//array('label'=>'Create Role', 'icon'=>'plus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('role-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Role</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'role-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
			'header'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize+$row+1',
			'htmlOptions'=>array(
				'style'=>'text-align:center',
				'width'=>'30px',
		      ),
		),
		'name',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
