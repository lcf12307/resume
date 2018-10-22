<?php
/* @var $this CategoryController */
/* @var $model Category */


$types = array(
    0 => 'question',
    1 => 'repository',
);
$this->breadcrumbs=array(
    'Categories'=>array('index'),
    $types[$model->type] => array($types[$model->type]),
);

$this->menu=array(
	array('label'=>'List '.$types[$model->type].'  Category', 'url'=>array($types[$model->type])),
	array('label'=>'Create  '.$types[$model->type].' Category', 'url'=>array('create')),
	array('label'=>'Update '.$types[$model->type].'  Category', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete  '.$types[$model->type].' Category', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage  '.$types[$model->type].' Category', 'url'=>array('admin')),
);
?>

<h1>View Category #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'type',
	),
)); ?>
