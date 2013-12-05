<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('admin'),
	'Kelola',
);\n";
?>



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1><?php echo $this->class2name($this->modelClass); ?></h1>

<div style="overflow:auto">
<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
		'type'=>'striped bordered',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
<?php
$count = 0;
foreach ($this->tableSchema->columns as $column) {
	
	echo "\t\t'" . $column->name . "',\n";
}

?>
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{update}{delete}'
			),
		),
)); ?>

</div>
