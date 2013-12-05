<?php
$this->breadcrumbs=array(
	'User'=>array('admin'),
	'Kelola',
);

?>

<h1>Kelola User</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-grid',
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
		'username',
		//'password',
		
		array(
			'class'=>'CDataColumn',
			'name'=>'role_id',
			'header'=>'Role',
			'type'=>'raw',
			'value'=>'$data->role->name',
			'filter'=>CHtml::listData(Role::model()->findAll(),'id','name')
		),
		array(
			'class'=>'CDataColumn',
			'name'=>'parent_id',
			'header'=>'Atasan',
			'type'=>'raw',
			'value'=>'$data->parent->username',
			'filter'=>CHtml::listData(User::model()->findAllByAttributes(array('role_id'=>2)),'id','username')
		),
		array(
			'class'=>'CDataColumn',
			'name'=>'status',
			'header'=>'Status',
			'type'=>'raw',
			'value'=>'$data->status == 1 ? "Aktif" : "Tidak Aktif"',
			'filter'=>array('0'=>'Tidak Aktif','1'=>'Aktif')
		),
		array(
			'class'=>'CDataColumn',
			'name'=>'id',
			'header'=>'Ganti Password',
			'type'=>'raw',
			'value'=>'CHtml::link("<i class=\"icon-lock\"></i>",array("user/updatePassword","id"=>$data->id))'
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}{delete}'
		),
	),
)); ?>
